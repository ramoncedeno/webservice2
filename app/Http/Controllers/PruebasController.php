<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class PruebasController extends Controller
{
    //metodo para usuario
    public function getUsers(){

            return 'El nombre de los usuarios';


    }

    //metodo lista de usuarios
    public function listUsers(){

            $listofusers='juan,miguel,oscar';
            return $listofusers;


    }

    public function listUsersFromdb(){

        $listUsers= User::all();
        return $listUsers;

    }

    // estructuras de control

    public function listUsersFromdbigs(){

        try{
         $listUsers= User::where('name','LIKE','Ramón%')->get();
        }catch (Exception $e){
           return 'este es un error'. $e -> getMessage();
        }

        if ($listUsers->count()>0) {
            return $listUsers;
        }else {
            return "no hay registros con estos criterios";
        }

    }

}
