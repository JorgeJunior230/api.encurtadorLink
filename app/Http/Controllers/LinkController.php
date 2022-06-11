<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Link;
use App\Models\Access;
use App\Exports\LinkExport;
use App\Imports\LinkImport;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = Link::query()->orderBy('url')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('link.index')->with('links', $links)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('link.create');
    }

    public function store(Request $request)
    {
        //**Testa para saber se esta recebendo os dados certos do form */
        //dd($request->all());

        //Validas os campos
        $request->validate([
            'url' =>['required'],
            'slug' =>['max:8']
        ]);


        $link  = DB::transaction(function() use ($request) {

            $urlDesc = $request->input('url');
            $slugDesc = $request->input('slug');

            //Verifica se o campo slug esta em branco, se estiver gera a url reduzida
            if($slugDesc == '')
            {
                $hashids = new Hashids($urlDesc, 8);
                $slugDesc = $hashids->encode(1);
            }                         

            $link = new Link();
            $link->url = $urlDesc;
            $link->slug = $slugDesc; 

            $link->save();

            return $link;
        });

        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido para a URL '{$link->url}' foi adicionado com sucesso");
    }

    public function destroy(Request $request)
    {
        Link::destroy($request->id);
        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido foi removido com sucesso");

    }

    public function edit($id)
    {
        //dd($link);
        $links = Link::findOrFail($id);  

        return view('link.edit')->with('link', $links);
    }

    public function update(Request $request, $id, $click)
    { 
        $links = Link::findOrFail($id);   
        $link = new Link();
        $access = new Access();

        $clicks = $click;
        $clicks = $clicks + 1;

        $link->clicks = $clicks;

        //Atualiza a coluna clicks na tabela Links
        $links->update(['clicks' => $link->clicks]);   

        //$URL = 'http://'.$links->url;  
        $URL = $links->url;     
        $USER_AGENT = $request->header('user-agent');
        $IP = $request->ip();

        $access->link_id = $links->id;
        $access->ip = $IP;
        $access->user_agent = $USER_AGENT;

        $access->save();                    
        
        return redirect($URL);
    }

    public function updateData(Request $request, $id)
    { 
        //Valida os campos
        $request->validate([
            'url' =>['required'],
            'slug' =>['max:8']
        ]);

        $links = Link::findOrFail($id);  

        $urlDesc = $request->input('url');
        $slugDesc = $request->input('slug');

        
        //Verifica se o campo slug esta em branco, se estiver gera a url reduzida
        if($slugDesc == '')
        {
            $hashids = new Hashids($urlDesc, 8);
            $slugDesc = $hashids->encode(1);
        }   

        //Atualiza a coluna clicks na tabela Links
        $links->update([
            'url' => $urlDesc,
            'slug' => $slugDesc,
        ]);   


        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido para a URL '{$links->url}' foi editado com sucesso!");
    }

    public function exportCsv()
    {   
        return Excel::download(new LinkExport, 'links.csv');
    }

    public function import()
    {   
        return view('link.import');
    }

    public function importSave(Request $request)
    { 
        //Valida os campos
        $request->validate([
            'csv_file' =>['required']
        ]);

        Excel::import(new LinkImport, $request->file('csv_file'), null, \Maatwebsite\Excel\Excel::CSV);

        $links = Link::query()->orderBy('url')->get();
        return view('link.index')->with('links', $links)->with('mensagemSucesso', "Arquivo Importado com sucesso!");              

    }


}
