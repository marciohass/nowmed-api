<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Contacts;
use App\Models\UserServiceLocations;
use App\Models\ServiceLocations;
use App\Models\Patients;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with(['Contacts', 'ServiceLocations'])->get();

        return response()->json($users, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Vai para a função de acordo com que tipo de usuário (ADMIN, ORGANIZACAO, CLIENTE, PACIENTE)
        switch ($request['contacts'][0]['user_level']) {

            case 'ADMIN':
                $this->storeAdmin($request);
                break;
            case 'ORGANIZACAO':
                $this->storeInstitution($request);
                break;
            case 'CLIENTE':
                $this->storeCustomer($request);
                break;
            case 'PACIENTE':
                $this->storePatient($request);
                break;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['Contacts', 'ServiceLocations'])->where('id', $id)->get();

        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Insere dados de um usuário ADMIN
     *
     * Tabelas: users, contacts, user_service_locations, service_locations
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function storeAdmin(Request $request)
    {

        foreach($request['user'] as $value) {

            //Insere na tabela users
            $user = User::create($value);

            //obtem ID do usuário inserido
            $insertedId = $user->id;

            foreach($request['contacts'] as $value_contact) {

                // Obtém o user_id para inserir na tabela contacts
                $value_contact['user_id'] = $insertedId;

                // Insere na tabela contacts
                $contact = Contacts::create($value_contact);

            }

            // Se um novo local for informado para o novo usuário
            if($request['service_locations'] !== NULL) {

                foreach($request['service_locations'] as $value_location) {

                    // Insere na tabela service_locations
                    $location = ServiceLocations::create($value_location);

                    // ID da tabela users inserido
                    $value_user_location['user_id'] = $insertedId;

                    // ID da tabela service_locations inserido
                    $value_user_location['servicelocation_id'] = $location->id;

                    // Insere na tabela user_service_locations
                    $user_location = UserServiceLocations::create($value_user_location);

                }

            // Se for informado um local já existente para o novo usuário
            } elseif(sizeof($request['user_service_locations']) > 0) {

                foreach($request['user_service_locations'] as $v) {

                    // ID da tabela users inserido
                    $v['user_id'] = $insertedId;

                    // Insere na tabela user_service_locations
                    $user_location = UserServiceLocations::create($v);
                }

            }
        }

    }

    /**
     * Insere dados de um usuário PACIENTE
     *
     * Tabelas: users, contacts, user_service_locations, service_locations, patients
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function storePatient(Request $request)
    {

            foreach($request['contacts'] as $value_contact) {

                // Recupera o nome do paciente do formulario dos dados pessoais para inserir também na tabela users
                $v['users']['name'] = $request['patients'][0]['name'];

                // Recupera o email do formulario de contato  para inserir também na tabela users
                $v['users']['email'] = $value_contact['email'];

                // Recupera a senha do formulário de contatos para inserir na tabela users
                $v['users']['password'] = $value_contact['password'];

                // Recupera user_level do formulário de contatos para inserir na tabela users
                $v['users']['user_level'] = $value_contact['user_level'];

                // Insere na tabela users
                $user = User::create($v['users']);

                // Obtem ID do usuário inserido
                $insertedId = $user->id;

                // Obtém o user_id para inserir na tabela contacts
                $value_contact['user_id'] = $insertedId;

                // Insere dados de contato na tabela contacts
                $contact = Contacts::create($value_contact);

            }

            foreach($request['service_locations'] as $value_location) {

                // Insere dados de endereço na tabela service_locations
                $location = ServiceLocations::create($value_location);

                // ID da tabela users inserido
                $value_user_location['user_id'] = $insertedId;

                // ID da tabela service_locations inserido
                $value_user_location['servicelocation_id'] = $location->id;

                // Insere na tabela user_service_locations
                $user_location = UserServiceLocations::create($value_user_location);

            }

            foreach($request['patients'] as $value_patient) {

                // Obtem ID do usuário inserido e insere no Array patients
                $value_patient['user_id'] = $insertedId;

                // Insere dados pessoais na tabela patients
                $patients = Patients::create($value_patient);

            }

            return response()->json($patients, 200);


    }

    public function storeCustomer(Request $request)
    {
        print_r('function storeCustomer');
        print_r($request->all());
    }

    public function storeInstitution(Request $request)
    {
        print_r('function storeInstitution');
        print_r($request->all());
    }
}
