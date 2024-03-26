<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class PruebasController extends Controller
{
    //método para usuario
    public function getUsers(){

            return 'El nombre de los usuarios';


    }

    //método lista de usuarios
    public function listUsers(){

            $listofusers='juan,miguel,oscar';
            return $listofusers;


    }

    //método lista de usuarios desde la base de datos tomando el modelo User::
    public function listUsersFromdb(){

        $listUsers= User::all();
        return $listUsers;

    }

    // método con estructuras de control
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

    public function listUsersFromdbWinthParams(Request $request, Response $response, ){

        //Ejecuta la consulta para obtener la lista de usuarios  y filtra por coincidencias parciales
        $paginate =$request -> paginate ? $request -> paginate: 5;
        $name = $request-> name ? $request-> name:"";


                //
                 try{
                $listOfUsers= User::where('name','LIKE','%'. $name.'%')->paginate($paginate);
               }catch (Exception $e){
                  return 'este es un error'. $e -> getMessage();
               }


               // devuelve arreglo solo en caso de haber resultados
               if (!$listOfUsers->count()>0){
                $data ='No hay registros con esos criterios: '. $name;

               }

               // se genera arreglo de respuesta para el usuario con datos utiles
               $data = [

                'data'=>$listOfUsers,
                'reponse_status'=> $response ->status(),
                'response_text'=>$response->statusText(),
                'name_to_search'=>$request ->$name,
                'paginate_by'=>$paginate,
                'headers'=>$request -> header(),

               ];

               //devuelve el arreglo en la lista de usuarios
               return $data;


    }

}
