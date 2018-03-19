<?php

use Illuminate\Database\Seeder;

class OAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_clients')->insert(
            array(
                'id'     => 10,
                'name'   => 'Sample password grant client',
                'secret' => 'F0NVue12qNwayx3pKJLHfJmQouOZg40YZafjjdHZ',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client'        => 1,
                'revoked'                => 0,
            )
        );
    }
}
