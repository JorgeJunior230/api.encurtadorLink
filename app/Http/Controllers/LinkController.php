<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LinkFormRequest;

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


        $link  = DB::transaction(function() use ($request) {

            $urlDesc = $request->input('url');
            $slugDesc = $request->input('slug');

            $link = new Link();
            $link->url = $urlDesc;
            $link->slug = $slugDesc;

            $link->save();

            return $link;
        });


        //return to_route('link.index');
        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido para a URL '{$link->url}' foi adicionada com sucesso");
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('link.index')->with('mensagem.sucesso', "O Link Reduzido para a UR '{$link->url}' foi removida com sucesso");
    }

    public function edit(Link $link)
    {
        
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {

    }


}
