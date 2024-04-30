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

    public function testgetuser()
    {
        $data = []; // Arreglo para almacenar los resultados de listUsersFromdbWinthParams

        for ($testgetuser = 0; $testgetuser <= 50; $testgetuser++) {
            $result = $this->get_users(new Request(), new Response());
            $data[] = $result; // Agrega el resultado al arreglo de datos
        }

        return $data;
    }

    public function testlistofUsers()
    {
        $data = []; // Arreglo para almacenar los resultados de listUsersFromdbWinthParams

        // Ciclo for que se ejecuta 50 veces (desde 1 hasta 50)
        for ($testlistofUsers = 1; $testlistofUsers <= 50; $testlistofUsers++) {
            $result = $this->listofUsers(new Request(), new Response()); // Llama a listUsersFromdbWinthParams y pasa una nueva instancia de Request y Response
            $data[] = $result; // Agrega el resultado al arreglo de datos
        }

        return $data; // Devuelve el arreglo con todos los resultados
    }

    public function testlistUsersFromdb()
    {
        $data = []; // Arreglo para almacenar los resultados de listUsersFromdbWinthParams

        for ($testlistUsersFromdb = 0; $testlistUsersFromdb <= 2; $testlistUsersFromdb++) {
            $result = $this->listUsersFromdb(new Request(), new Response());
            $data[] = $result; // Agrega el resultado al arreglo de datos
        }

        return $data;






}
