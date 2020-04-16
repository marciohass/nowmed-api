<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Contacts;
use App\Models\UserLocations;
use App\Models\Locations;
use App\Models\Patients;
use App\Models\Specialists;
use App\Models\UserSpecialists;
use App\Models\SpecializationSpecialists;
use App\Models\SpecialistTherapies;
use App\Models\Institutions;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with(['Contacts', 'Locations'])->get();

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['Contacts', 'Locations'])->where('id', $id)->get();

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
     * Tabelas: users, contacts, user_locations, locations
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
            if($request['locations'] !== NULL) {

                foreach($request['locations'] as $value_location) {

                    // Insere na tabela locations
                    $location = Locations::create($value_location);

                    // ID da tabela users inserido
                    $value_user_location['user_id'] = $insertedId;

                    // ID da tabela locations inserido
                    $value_user_location['location_id'] = $location->id;

                    // Insere na tabela user_locations
                    $user_location = UserLocations::create($value_user_location);

                }

            // Se for informado um local já existente para o novo usuário
            } elseif(sizeof($request['user_locations']) > 0) {

                foreach($request['user_locations'] as $v) {

                    // ID da tabela users inserido
                    $v['user_id'] = $insertedId;

                    // Insere na tabela user_locations
                    $user_location = UserLocations::create($v);
                }

            }
        }

    }

    /**
     *
     * Primeiro cadastro de um usuário PACIENTE
     * Esse cadastro vem do formulário de fora do ADMIN antes dele ter um login
     *
     * Tabelas na ordem de insert:
     * 1 - users
     * 2 - contacts
     * 3 - locations
     * 4 - user_locations
     * 5 - patients
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

                try {

                    // Insere na tabela users
                    $user = User::create($v['users']);

                } catch (Exception $ex) {
                    return $ex->getMessage();
                }


                // Obtem ID do usuário inserido
                $insertedId = $user->id;

                try {

                    // Insere dados de contato na tabela contacts
                    $contact = Contacts::create($value_contact + ['user_id' => $insertedId]);

                } catch (Exception $ex) {
                    return $ex->getMessage();
                }
            }

            foreach($request['locations'] as $value_location) {

                // Insere dados de endereço na tabela locations
                $location = Locations::create($value_location);

                try {
                    // Insere na tabela user_locations
                    $user_location = UserLocations::create($value_user_location + ['user_id' => $insertedId, 'location_id' => $location->id]);

                } catch (Exception $ex) {
                    return $ex->getMessage();
                }

            }

            foreach($request['patients'] as $value_patient) {

                try {

                    // Insere dados pessoais na tabela patients
                    $patients = Patients::create($value_patient + ['user_id' => $insertedId]);

                } catch (Exception $ex) {
                    return $ex->getMessage();
                }

            }

            return response()->json($patients, 200);


    }

    /**
     *
     * Primeiro cadastro de um usuário CLIENTE (Médicos)
     * Esse cadastro vem do formulário de fora do ADMIN antes dele ter um login
     *
     * Tabelas na ordem de insert:
     * 1 - users
     * 2 - contacts
     * 3 - locations
     * 4 - user_locations
     * 5 - specialists
     * 6 - user_specialists
     * 7 - specialization_specialists (se for Terapeuta => specialist_therapies)
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function storeCustomer(Request $request)
    {

        foreach($request['contacts'] as $value_contact) {

            // Recupera o nome do paciente do formulario dos dados pessoais para inserir também na tabela users
            $v['users']['name'] = $request['specialists'][0]['name'];

            // Recupera o email do formulario de contato  para inserir também na tabela users
            $v['users']['email'] = $value_contact['email'];

            // Recupera a senha do formulário de contatos para inserir na tabela users
            $v['users']['password'] = $value_contact['password'];

            // Recupera user_level do formulário de contatos para inserir na tabela users
            $v['users']['user_level'] = $value_contact['user_level'];

            try {

                // Insere na tabela users
                $user = User::create($v['users']);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

            // Obtem ID do usuário inserido
            $insertedId = $user->id;

            try {
                // Insere dados de contato na tabela contacts
                $contact = Contacts::create($value_contact + ['user_id' => $insertedId]);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }

        foreach($request['locations'] as $value_location) {

            try {
                // Insere dados de endereço na tabela locations
                $location = Locations::create($value_location);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

            try {
                // Insere na tabela user_locations
                $user_location = UserLocations::create($value_user_location + ['user_id' => $insertedId, 'location_id' => $location->id]);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

        }

        foreach($request['specialists'] as $value_specialist) {

            try {
                // Insere dados na tabela specialists
                $specialists = Specialists::create($value_specialist);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

            $value_user_specialists = Array();

            try {
                // Insere na tabela user_locations
                $user_specialist = UserSpecialists::create($value_user_specialists + ['user_id' => $insertedId, 'specialist_id' => $specialists->id]);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

            if ($request['specialization'] != null && $request['specialization'].length > 0) {

                foreach($request['specialization'] as $value_specialization) {

                    try {
                        // Insere os IDs na tabela specialization_specialists
                        $specialization_specialist = SpecializationSpecialists::create($value_specialization + ['specialist_id' => $specialists->id]);

                    } catch(Exception $ex) {
                        return $ex->getMessage();
                    }
                }
            }

            if ($request['therapies'] != null && $request['therapies'].length > 0) {

                foreach($request['therapies'] as $value_therapy) {

                    try {
                        // Insere os IDs na tabela specialist_therapies
                        $specialist_therapies = SpecialistTherapies::create($value_specialization + ['specialist_id' => $specialists->id]);

                    } catch(Exception $ex) {
                        return $ex->getMessage();
                    }
                }
            }

        }

        return response()->json($specialization_specialist, 200);

    }

    /**
     *
     * Primeiro cadastro de um usuário Institutição (Hospitais, Clínicas, Laboratórios)
     * Esse cadastro vem do formulário de fora do ADMIN antes dele ter um login
     *
     * Tabelas em ordem de insert:
     * 1 - users
     * 2 - contacts
     * 3 - locations
     * 4 - user_locations
     * 5 - institutions
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function storeInstitution(Request $request)
    {

        foreach($request['contacts'] as $value_contact) {

            // Recupera o nome do paciente do formulario dos dados pessoais para inserir também na tabela users
            $v['users']['name'] = $value_contact['name'];

            // Recupera o email do formulario de contato  para inserir também na tabela users
            $v['users']['email'] = $value_contact['email'];

            // Recupera a senha do formulário de contatos para inserir na tabela users
            $v['users']['password'] = $value_contact['password'];

            // Recupera user_level do formulário de contatos para inserir na tabela users
            $v['users']['user_level'] = $value_contact['user_level'];

            try {

                // Insere na tabela users
                $user = User::create($v['users']);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

            // Obtem ID do usuário inserido
            $insertedId = $user->id;

            try {
                // Insere dados de contato na tabela contacts
                $contact = Contacts::create($value_contact + ['user_id' => $insertedId]);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }

        foreach($request['locations'] as $value_location) {

            try {
                // Insere dados de endereço na tabela locations
                $location = Locations::create($value_location);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

            $value_user_location = Array();

            try {
                // Insere na tabela user_locations
                $user_location = UserLocations::create($value_user_location + ['user_id' => $insertedId, 'location_id' => $location->id]);

            } catch (Exception $ex) {
                return $ex->getMessage();
            }

        }

        foreach($request['institutions'] as $value_institution) {

            try {
                // Insere os dados na tabela Institutions
                $institution = Institutions::create($value_institution + ['user_id' => $insertedId]);

            } catch(Exception $ex) {
                return $ex->getMessage();
            }
        }

    }
}
