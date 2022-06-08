<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //$series = Serie::query()->orderBy('nome')->get();
        //$mensagemSucesso = session('mensagem.sucesso');

        //return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        //return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        //** Criando Array de validaçao dos campos */
        //$request->validate([
        //    'nome' =>['required', 'min:3']
        //]);

        //**Testa para saber se esta recebendo os dados certos do form */
        //dd($request->all());


        //** o metodo DB::transaction cuida para que toda transaçao que esteja dentro dela seja executada. Caso alguma falhe ela aborta tudo */
        
        //$serie  = DB::transaction(function() use ($request) {
        //            $serie = Serie::create($request->all());
        //            $seasons = [];
        //    
        //            //Inseri na tabela de Season
        //            for ($i = 1; $i <= $request->seasonsQty; $i++) {
        //                $seasons[] = [
        //                   'series_id' => $serie->id,
        //                    'number' => $i,
        //                ];
        //            }
        //            Season::insert($seasons);
        //    
        //            //Inseri na tabela de Episode
        //            $episodes = [];
        //            foreach ($serie->seasons as $season) {
        //                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
        //                    $episodes[] = [
        //                        'season_id' => $season->id,
        //                        'number' => $j
        //                    ];
        //                }
        //            }
        //            Episode::insert($episodes);    
        //            
        //            return $serie;
        //        });



        //return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        //$series->delete();

        //return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        //return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {

        //*** Passa o parametro nome do formulario */
        //$series->nome($request->nome);

        //*** Pega todos os parametros do formulario */

        //$series->fill($request->all());
        //$series->save();

        //return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
