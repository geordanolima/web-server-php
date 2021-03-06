<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jogador;

class JogadorController extends Controller
{
    //tuto os viventes json - ok
    public function allAsJson(){
        $jogadores = Jogador::all();
        if ($jogadores != null){
            $jogador = ['viventes' => [] ];
            foreach ($jogadores as $dados) {
                $jogador['viventes'][] = array(
                    'id' => $dados->id,
                    'nome' => $dados->nome,
                    'apelido' => $dados->apelido,
                    'genero' => $dados->genero,
                    'email' => $dados->email,
                    'img' => $dados->img
                );
            }
            $json = json_encode($jogador);
            return response($json, 200)
                            ->header('Content-type', 'application/json');
        }
        return response('Não tem vivente cadastrado', 404)
                        ->header('Content-type', 'text/plain');
    }

    // tuto os viventes xml - ok ***
    public function allAsXml(){
        $jogadores = Jogador::all();
        if($jogadores != null){
            $xml = view('xml.all_jogador_exibir', ['dados' => $jogadores]);
            return response($xml, 200)
                            ->header('Content-type', 'application/xml');
        }

        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

    //um vivente json - ok
    public function showAsJson($id){
        $jogador = Jogador::where('id', $id)->first();
        if($jogador != null){
            $dados['vivente'][] = array(
                    'id' => $jogador->id,
                    'nome' => $jogador->nome,
                    'apelido' => $jogador->apelido,
                    'genero' => $jogador->genero,
                    'email' => $jogador->email,
                    'img' => $jogador->img
            );
            $json = json_encode($dados);
            return response($json, 200)
                        ->header('Content-type', 'application/json');
        }

        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

    //um vivente xml -ok
    public function showAsXml($id){
        $jogador = Jogador::where('id', $id)->first();
        if($jogador != null){
            $xml = view('xml.jogador_exibir', ['dados' => $jogador]);
            return response($xml, 200)
                            ->header('Content-type', 'application/xml');
        }

        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

    // cadastrar vivente
    public function inserir(Request $jogador){
        try{
            $x = Jogador::insertGetId([
                    'nome'      => $jogador->input('nome'),
                    'apelido'   => $jogador->input('apelido'),
                    'genero'    => $jogador->input('genero'),
                    'email'     => $jogador->input('email'),
                    'img'       => $jogador->input('img')]);
            return $this->showAsJson($x);
        } catch (Exception $e) {
            return response('Erro au atualizar o registro: ' . $e->getMessage(), 400)
                    ->header('Content-type', 'text/plain');
        }
    }

    // alterar vivente
    public function atualizar($id, Request $jogador){
        $vivente = Jogador::where('id', $id)->first();
        if ($vivente !== null){
            $vivente->nome =    $jogador->input('nome') ?       $jogador->input('nome') :       $vivente->nome;
            $vivente->apelido = $jogador->input('apelido') ?    $jogador->input('apelido') :    $vivente->apelido;
            $vivente->genero =    $jogador->input('genero') ?   $jogador->input('genero') :     $vivente->genero;
            $vivente->email =  $jogador->input('email') ?       $jogador->input('email') :      $vivente->email;
            $vivente->img =     $jogador->input('img') ?        $jogador->input('img') :        $vivente->img;
            try{
                $vivente = Jogador::where('id', $id)->update([
                    'nome'      => $vivente->nome,
                    'apelido'   => $vivente->apelido,
                    'genero'    => $vivente->genero,
                    'email'     => $vivente->email,
                    'img'       => $vivente->img]);
                return $this->showAsJson($id);
            } catch (Exception $e) {
                return response('Erro au atualizar o registro: ' . $e->getMessage(), 400)
                        ->header('Content-type', 'text/plain');
            }
        }
        return response('ID nao existe no sistema', 404)
            ->header('Content-type', 'text/plain');
    }

}