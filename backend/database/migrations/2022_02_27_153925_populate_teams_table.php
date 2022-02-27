<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class PopulateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('teams')->insert([
            [
                'name' => 'Marti'
            ],
            [
                'name' => 'Luna'
            ],
            [
                'name' => 'Giu'
            ],
            [
                'name' => 'Sofi'
            ],
            [
                'name' => 'Anna'
            ],
            [
                'name' => 'Cava'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('teams')->truncate();
    }
}
