<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = \League\Csv\Reader::createFromPath(
            base_path() . '/resources/csv/users.csv'
        );

        foreach($csv->getRecords() as $record) {
            \DB::table('users')->insert(
                array(
                    'name'      => $record[0],
                    'email'     => $record[1],
                    'password'  => Hash::make($record[2]),
                )
            );
        }
    }
}
