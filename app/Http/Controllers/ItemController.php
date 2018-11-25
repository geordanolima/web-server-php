<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
        //tuto os viventes json - ok
        public function allAsJson(){
            $itens = Item::all();
            if ($itens != null){
                $item = ['coisas' => [] ];
                foreach ($itens as $dados) {
                    $item['coisas'][] = array(
                        'id' => $dados->id,
                        'nome' => $dados->nome,
                        'bonus' => $dados->bonus,
                        'valor' => $dados->valor,
                        'img' => $dados->img
                    );
                }
                $json = json_encode($item);
                return response($json, 200)
                                ->header('Content-type', 'application/json');
            }
            return response('Não tem vivente cadastrado', 404)
                            ->header('Content-type', 'text/plain');
        }
    
        // tuto os viventes xml - ok ***
        public function allAsXml(){
            $itens = Item::all();
            if($itens != null){
                foreach ($itens as $item) {
                    $xml = view('xml.all_item_exibir', ['dados' => $item]);
                }
                return response($xml, 200)
                                ->header('Content-type', 'application/xml');
            }
    
            return response('ID nao existe no sistema', 404)
                            ->header('Content-type', 'text/plain');
        }
    
        //um vivente json - ok
        public function showAsJson($id){
            $item = Item::where('id', $id)->first();
            if($item != null){
                $dados['coisa'][] = array(
                    'id' => $item->id,
                    'nome' => $item->nome,
                    'bonus' => $item->bonus,
                    'valor' => $item->valor,
                    'img' => $item->img
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
            $item = Item::where('id', $id)->first();
            if($item != null){
                $xml = view('xml.item_exibir', ['dados' => $item]);
                return response($xml, 200)
                                ->header('Content-type', 'application/xml');
            }
    
            return response('ID nao existe no sistema', 404)
                            ->header('Content-type', 'text/plain');
        }


    public function buscaitens()
    {
        $item = Item::all();
        dd($item);
    }
    public function buscaitem($id)
    {
        $item = Item::where('id', $id)->first();
        if($item != null){
            return response($item->nome, 200)
                        ->header('Content-type', 'text/plain');
        }
        return response('ID nao existe no sistema', 404)
                        ->header('Content-type', 'text/plain');
    }

}