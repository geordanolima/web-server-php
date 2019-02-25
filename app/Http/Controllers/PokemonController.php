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

    public function search(Request $request){
        $nome = $request->input('nome');
        $bixos = Pokemon::where('nome', 'like', $nome . '%')->get();
        if($bixos != null){
            $dados = ['bicharada' => [] ];
            foreach ($bixos as $pokemon) {
                $dados['bicharada'][] = array(
                    'nome' => $pokemon->nome,
                    'foto' => $pokemon->img
                );
            }
            $json = json_encode($dados); 
            return response($json, 200)
                    ->header('Content-type', 'text/plain')
                    ->header('Access-Control-Allow-Origin', '*');
        }
    }
    
    // cadastrar pokemão
    public function inserir(Request $bixo){
        $x = Pokemon::insertGetId([
            'nome'      => $bixo->input('nome'),
            'descricao' => $bixo->input('descricao'),
            'vida'      => $bixo->input('vida'),
            'ataque'    => $bixo->input('ataque'),
            'defesa'    => $bixo->input('defesa'),
            'img'       => $bixo->input('foto'), 
            'lati'      => $bixo->input('lati'),
            'long'      => $bixo->input('long')]);
        return $this->showAsJson($x);
    }

    // alterar pokemão
    public function atualizar($id, Request $bixo){
        $pokemao = Pokemon::where('id', $id)->first();
        $pokemao->nome =      $bixo->input('nome') ?        $bixo->input('nome') :          $pokemao->nome;
        $pokemao->descricao = $bixo->input('descricao') ?   $bixo->input('descricao') :     $pokemao->descricao;
        $pokemao->vida =      $bixo->input('vida') ?        $bixo->input('vida') :          $pokemao->vida;
        $pokemao->ataque =    $bixo->input('ataque') ?      $bixo->input('ataque') :        $pokemao->ataque;
        $pokemao->defesa =    $bixo->input('defesa') ?      $bixo->input('defesa') :        $pokemao->defesa;
        $pokemao->img =       $bixo->input('img') ?         $bixo->input('img') :           $pokemao->img;
        $pokemao->lati =      $bixo->input('lati') ?        $bixo->input('lati') :          $pokemao->lati;
        $pokemao->long =      $bixo->input('long') ?        $bixo->input('long') :          $pokemao->long;
        $pokemao = Pokemon::where('id', $id)->update([
            'nome'      => $pokemao->nome,
            'descricao' => $pokemao->descricao,
            'vida'      => $pokemao->vida,
            'ataque'    => $pokemao->ataque,
            'defesa'    => $pokemao->defesa,
            'img'       => $pokemao->foto,
            'lati'      => $pokemao->lati,
            'long'      => $pokemao->long]);
        return $this->showAsJson($id);
    }
}
