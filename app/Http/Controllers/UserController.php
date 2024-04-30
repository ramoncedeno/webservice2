<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //método para usuario
    public function getUsers()
    {
        $user = User::first();
        return $user->email;
    }

    //método lista de usuarios
    public function listUsers(){

        $listofusers = 'juan,miguel,oscar';
        return $listofusers;
    }

    //método lista de usuarios desde la base de datos tomando el modelo User::
    public function listUsersFromdb()
    {
        //$listUsers = User::paginate(5); // pagina 

        $listUsers = DB::table('users')
                        ->select(DB::raw('count(*) as conteo_jodon,name'))
                        ->where('name', 'LIKE', 'Ramón%')
                        ->groupBy('name')
                        ->get();
        return $listUsers;
    }

    // método con estructuras de control
    public function listUsersFromdbigs()
    {

        try {
            $listUsers = User::where('name', 'LIKE', 'Ramón%')->get();
        } catch (Exception $e) {
            return 'este es un error' . $e->getMessage();
        }

        if ($listUsers->count() > 0) {
            return $listUsers;
        } else {
            return "no hay registros con estos criterios";
        }
    }

    public function listUsersFromdbWinthParams(Request $request, Response $response, ){

        //Ejecuta la consulta para obtener la lista de usuarios  y filtra por coincidencias parciales
        $paginate = $request->paginate ? $request->paginate : 5;
        $name = $request->name ? $request->name : "";


        //
        try {
            $listOfUsers = User::where('name', 'LIKE', '%' . $name . '%')->paginate($paginate);
        } catch (Exception $e) {
            return 'este es un error' . $e->getMessage();
        }


        // devuelve arreglo solo en caso de haber resultados
        if (!$listOfUsers->count() > 0) {
            $data = 'No hay registros con esos criterios: ' . $name;
        }

        // se genera arreglo de respuesta para el usuario con datos utiles
        $data = [

            'data' => $listOfUsers,
            'reponse_status' => $response->status(),
            'response_text' => $response->statusText(),
            'name_to_search' => $request->$name,
            'paginate_by' => $paginate,
            'headers' => $request->header(),

        ];

               //devuelve el arreglo en la lista de usuarios
               return $data;


    }

}
