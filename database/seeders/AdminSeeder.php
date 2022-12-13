<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

use Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = \DB::table('users')->orderBy('id', 'desc')->limit(1)->first();
        $query2 = \DB::table('users')->orderBy('id', 'desc')->limit(1)->get();


        if(count($query2) == 1){
            $user_id = $query->id + 1;
            User::insert([
                'id' => $user_id,
                'name' => 'Valentim Loth Simão Prado',
                'email' => 'valentimprado0014d@gmail.com',
                'password' => Hash::make('Prado936_sapp_admin'),
                'permissao' => 'admin',
            ]);
            User::insert([
                'id' => $user_id,
                'name' => 'Otoniel Kavungu dos Santos Emanuel',
                'email' => 'otonielemanuel21@gmail.com',
                'password' => Hash::make('adminsappotiniel'),
                'permissao' => 'admin',
            ]);

            Admin::insert([
                'nome' => 'Valentim Loth Simão Prado',
                'email' => 'valentimprado0014d@gmail.com',
                'palavra_passe' => Hash::make('Prado936_sapp_admin'),
                'user_id' => $user_id,
            ]);
            Admin::insert([
                'nome' => 'Otoniel Kavungu dos Santos Emanuel',
                'email' => 'otonielemanuel21@gmail.com',
                'palavra_passe' => Hash::make('adminsappotiniel'),
                'user_id' => $user_id,
            ]);
        }else{
            User::insert([
                'id' => 1,
                'name' => 'Valentim Loth Simão Prado',
                'email' => 'valentimprado0014d@gmail.com',
                'password' => Hash::make('Prado936_sapp_admin'),
                'permissao' => 'admin',
            ]);
            User::insert([
                'id' => 2,
                'name' => 'Otoniel Kavungu dos Santos Emanuel',
                'email' => 'otonielemanuel21@gmail.com',
                'password' => Hash::make('adminsappotiniel'),
                'permissao' => 'admin',
            ]);

            Admin::insert([
                'nome' => 'Valentim Loth Simão Prado',
                'email' => 'valentimprado0014d@gmail.com',
                'palavra_passe' => Hash::make('Prado936_sapp_admin'),
                'user_id' => 1,
            ]);
            Admin::insert([
                'nome' => 'Otoniel Kavungu dos Santos Emanuel',
                'email' => 'otonielemanuel21@gmail.com',
                'palavra_passe' => Hash::make('adminsappotiniel'),
                'user_id' => 2,
            ]);
        }




    }
}
