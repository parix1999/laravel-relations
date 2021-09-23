<?php

use Illuminate\Database\Seeder;
// Importare i due model:
use App\article; 
use App\author;
// Per il faker:
use Faker\Generator as Faker;

class articleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Author:
        $authorNameList = [
            'Gino',
            'Pino',
            'Gianni',
            'Pietro',
            'Gianpaolo',
            'Vercingitore'
        ];
        $authorSurnameList = [
            'Paoli',
            'Banfi',
            'Ciano',
            'Verdi',
            'Arcolo',
            'Patrizio'
        ];

        // $listAuthorId = [];
       
        for($i = 0; $i < 10; $i++) {
            // Creazione dell'oggetto:
            $authorObject = new author();

            $randNameKey = array_rand($authorNameList, 1);
            $randName = $authorNameList[$randNameKey];
            $authorObject->name = $randName;

            $randSurnameKey = array_rand($authorSurnameList, 1);
            $randSurname = $authorSurnameList[$randSurnameKey];
            $authorObject->surname = $randSurname;

            $authorObject->email = $faker->email();
            $authorObject->birth_year = $faker->year();
            $authorObject->save();

            // Creazione dell'oggetto:
            $articleObject = new article();
            $articleObject->title = $faker->words(5);
            $articleObject->author_id = $articleObject->id;
            $articleObject->descrizione = $faker->paragraph(3);
            $articleObject->cover =  $faker->imageUrl(400, 400, 'article', true);
            $articleObject->created_at = null;
            $articleObject->updated_at = null;
            $articleObject->save();
        }

        

        


    }
}
