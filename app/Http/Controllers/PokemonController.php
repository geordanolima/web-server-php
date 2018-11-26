<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pokemon;

class PokemonController extends Controller
{
    //tuto os bixo json
    public function allAsJSON(){
        $bixos = Pokemon::all();
        if ($bixos != null){
            $dados = ['bicharada' => [] ];
            foreach ($bixos as $pokemon) {
                $dados['bicharada'][] = array(
                    'id' => $pokemon->id,
                    'nome' => $pokemon->nome,
                    'descricao' => $pokemon->descricao,
                    'vida' => $pokemon->vida,
                    'ataque' => $pokemon->ataque,
                    'defesa' => $pokemon->defesa,
                    'foto' => $pokemon->img,
                    'latitude' => $pokemon->lati,
                    'longitude' => $pokemon->long
                );
            }
            $json = json_encode($dados);
            return response($json, 200)
                            ->header('Content-type', 'application/json');
        }
        return response('Não tem pokemão cadastrado', 404)
                        ->header('Content-type', 'text/plain');
    }

    // tuto os bixo xml
    public function allAsXml(){
        $bixos = Pokemon::all();
        if($bixos != null){
            $xml = view('xml.all_bixo_exibir', ['dados' => $bixos]);   
            return response($xml, 200)
                            ->header('Content-type', 'application/xml');
        }

        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

    //um bixo json
    public function showAsJson($id){
        $bixo = Pokemon::where('id', $id)->first();
        if($bixo != null){
            $dados['bixo'][] = array(
                'id' => $bixo->id,
                'nome' => $bixo->nome,
                'descricao' => $bixo->descricao,
                'vida' => $bixo->vida,
                'ataque' => $bixo->ataque,
                'defesa' => $bixo->defesa,
                'foto' => $bixo->img,
                'latitude' => $bixo->lati,
                'longitude' => $bixo->long
            );
            $json = json_encode($dados);
            return response($json, 200)
                        ->header('Content-type', 'application/json');
        }

        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

    //um bixo xml
    public function showAsXml($id){
        $bixo = Pokemon::where('id', $id)->first();
        if($bixo != null){
            $xml = view('xml.bixo_exibir', ['dados' => $bixo]);
            return response($xml, 200)
                            ->header('Content-type', 'application/xml');
        }

        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

    //index
    public function index()
    {
        return view('index', ['teste' => 'testando']); //caminho/nome sem extensao
    }
}
