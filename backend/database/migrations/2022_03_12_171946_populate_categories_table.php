<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('categories')->insert([
            [
                'description' => 'Il prof in squadra vi fa un complimento',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra veste monocromo',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra indossa una fantasia floreale',
                'points' => 15,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra cita un meme o fa una gaffe',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra ha la mascherina abbinata al fit',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra parla dialetto',
                'points' => 20,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra fa cadere qualcosa o va addosso a qualcosa (prof squadra)',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra manca',
                'points' => 60,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra fa guardare un film',
                'points' => 30,
                'is_bonus' => true
            ],
            [
                'description' => 'Presa in giro amichevole da parte del prof in squadra',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Scarbonasse con capo eccentrico (si rinnova ogni mese, valido 1 x capo)',
                'points' => 5,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra dice una parolaccia',
                'points' => 40,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra chiama Mario',
                'points' => 60,
                'is_bonus' => true
            ],
            [
                'description' => 'Esercitazione nell\'ora del prof in squadra',
                'points' => 150,
                'is_bonus' => true
            ],
            [
                'description' => 'Entra il bidello durante l\'ora del prof in squadra',
                'points' => 5,
                'is_bonus' => true
            ],
            [
                'description' => 'Camilla viene chiamata dal prof in squadra',
                'points' => 25,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra dice scarbonasso',
                'points' => 20,
                'is_bonus' => true
            ],
            [
                'description' => 'Scarbonasse dicono ocio birbo durante una lezione (contestualizzato)',
                'points' => 20,
                'is_bonus' => true
            ],
            [
                'description' => 'Citare una perla di scarbonasso',
                'points' => 10,
                'is_bonus' => true
            ],
            [
                'description' => 'Ora del prof in squadra salta per un progetto/incontro',
                'points' => 20,
                'is_bonus' => true
            ],
            [
                'description' => 'BONUS TRASHATA',
                'points' => 50,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra manda frecciatine',
                'points' => 50,
                'is_bonus' => true
            ],
            [
                'description' => 'Il prof in squadra parla di esperienze personali',
                'points' => 30,
                'is_bonus' => true
            ],
            [
                'description' => 'Uscire ultima dalla classe',
                'points' => 1,
                'is_bonus' => false
            ],
            [
                'description' => 'Essere richiamata',
                'points' => 5,
                'is_bonus' => false
            ],
            [
                'description' => 'Paccare un\'interrogazione',
                'points' => 30,
                'is_bonus' => false
            ],
            [
                'description' => 'Paccare una verifica',
                'points' => 30,
                'is_bonus' => false
            ],
            [
                'description' => 'Dimenticare qualcosa del materiale',
                'points' => 1,
                'is_bonus' => false
            ],
            [
                'description' => 'Litigare con una di noi',
                'points' => 5,
                'is_bonus' => false
            ],
            [
                'description' => 'Prendersi parole dalla China',
                'points' => 20,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra sbaglia o dimentica i nomi di un* compagn*',
                'points' => 5,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra nomina l\'esame',
                'points' => 5,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra fa una battuta da boomer',
                'points' => 10,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra veste a pois',
                'points' => 20,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra è positivo al COVID',
                'points' => 50,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra litiga con un alunno',
                'points' => 30,
                'is_bonus' => false
            ],
            [
                'description' => 'Marie manca ad una verifica/interrogazione di un prof in squadra',
                'points' => 5,
                'is_bonus' => false
            ],
            [
                'description' => 'Eleonora va a parlare alla fine dell\'ora con un prof in squadra',
                'points' => 2,
                'is_bonus' => false
            ],
            [
                'description' => 'Il prof in squadra indossa più di 4 colori',
                'points' => 10,
                'is_bonus' => false
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->delete();
    }
};
