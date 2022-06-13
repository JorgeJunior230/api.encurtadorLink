<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

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
        return Link::all();
    }

    public function store(Request $request)
    {    
        //dd($request);

        //Validas os campos
        $request->validate([
            'url' =>['required'],
            'slug' =>['max:8']
        ]);        

        $urlDesc = $request->input('url');
        $slugDesc = $request->input('slug');

        //Verifica se o campo slug esta em branco, se estiver gera a url reduzida
        if($slugDesc == '' or is_null($slugDesc))
        {
            $hashids = new Hashids($urlDesc, 8);
            $slugDesc = $hashids->encode(1);
        }                         

        $link = new Link();
        $link->url = $urlDesc;
        $link->slug = $slugDesc; 

        $retorno = $link->save();

        return response()->json($retorno, 201);
        
        //return response()->json(Link::create($link), 201);        
    }

    public function destroy(Request $request)
    {
        //Link::destroy($request->id);

        return response()->json(Link::destroy($request->id), 204);

    }

    public function show($id)
    {
        $links = Link::findOrFail($id);  

        return $links;
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
   
        $USER_AGENT = $request->header('user-agent');
        $IP = $request->ip();

        $access->link_id = $links->id;
        $access->ip = $IP;
        $access->user_agent = $USER_AGENT;

        $access->save();

        return to_route('link.index');   

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
        $retorno = $links->update([
            'url' => $urlDesc,
            'slug' => $slugDesc,
        ]);   

        return response()->json($retorno, 201);
    }

    public function exportCsv()
    {   
        return Excel::download(new LinkExport, 'links.csv');
    }

    public function importSave(Request $request)
    { 
        //Valida os campos
        $request->validate([
            'csv_file' =>['required']
        ]);

        Excel::import(new LinkImport, $request->file('csv_file'), null, \Maatwebsite\Excel\Excel::CSV);

        $links = Link::query()->orderBy('url')->get();
        return to_route('link.index')->with('links', $links)->with('mensagemSucesso', "Arquivo Importado com sucesso!");              

    }


}
