<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 1/7/18
 * Time: 3:47 PM
 */

namespace Rndwiga\Authentication\Infrastructure\Repository;


use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ClientProfileRepository
{
    public function create(array $data){
        DB::beginTransaction();
        try {
            $client = new Client();
            $client->client_uid = Uuid::uuid4();
            $client->system_agent = $data['ciremboAgent'];
            $client->username = $data['username'];
            $client->email = $data['email'];
            $client->phone_number = $data['phoneNumber'];
            $client->client_status = 200; //pending
            $client->password = bcrypt($data['password']);
            $client->save();
        }catch (\Exception $exception){
            DB::rollBack();
            //should log the exception
            throw $exception;
        }
        DB::commit();

        return $client;
    }
}