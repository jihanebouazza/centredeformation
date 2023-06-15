<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi' , 'Samedi' , 'Dimanche'];
        $heures = ['17:00 - 18:30', '18:30 - 20:00', '20:00 - 21:30', '21:30 - 23:00'];

        foreach ($jours as $jour) {
            foreach ($heures as $heure) {
                DB::table('times')->insert([
                    'jour' => $jour,
                    'heure' => $heure,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
