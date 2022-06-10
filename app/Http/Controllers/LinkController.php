<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = Link::query()->orderBy('url')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        //return view('link.index')->with('links', $links);
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

        //Valida o campo
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

        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido para a URL '{$link->url}' foi adicionada com sucesso");
    }

    public function destroy(Request $request)
    {
        Link::destroy($request->id);
        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido foi removido com sucesso");

    }

    public function edit(Link $link)
    {
        //dd($link);
        return view('link.edit')->with('link', $link);
    }

    public function update(Request $request, $id, $click)
    { 
        $links = Link::findOrFail($id);        
        $clicks = $click;

        $link = new Link();

        $clicks = $clicks + 1;
        
        $link->clicks = $clicks;
        $links->update(['clicks' => $link->clicks]);       

        $URL = 'http://'.$links->url;    
        
        //$USER_AGENT = $request->server('HTTP_USER_AGENT');
        $USER_AGENT = $request->header('user-agent');
        $IP = $request->ip();


        dd($USER_AGENT);
        
        return redirect($URL);
    }

    public function updateData(Request $request)
    { 
        //Valida o campo
        $request->validate([
            'url' =>['required'],
            'slug' =>['max:8']
        ]);

        return to_route('link.index');
    }


}
