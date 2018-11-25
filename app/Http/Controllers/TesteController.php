<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //php artisan make:controller TesteController

    public function getDados()
    {
        echo 'ola mundo';
    }


    public function update($id)
    {
        echo $id;
    }
}
