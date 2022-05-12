<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Company;
use App\Models\Address;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InsertAllUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($response->body(), true);
        $arrUsers = [];
        foreach($users AS $user) {
            $company = Company::create($user['company']);
            $user['address']['lat'] = $user['address']['geo']['lat'];
            $user['address']['lng'] = $user['address']['geo']['lng'];
            unset($user['address']['geo']);
            $address = Address::create($user['address']);
            unset($user['company']);
            unset($user['address']);
            $user['companyId'] = $company->id;
            $user['addressId'] = $address->id;
            $arrUsers[] = $user;
        }

        User::insert($arrUsers);


        $this->info('All users has inserted');
    }
}
