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
        $arrayIdAuthor = [];
        
        foreach ($authorNameList as $author) {
            // Creazione dell'oggetto:
            $authorObject = new author();
            // $randNameKey = array_rand($authorNameList, 1);
            // $randName = $authorNameList[$randNameKey];
            $authorObject->name = $author;
            // $randSurnameKey = array_rand($authorSurnameList, 1);
            // $randSurname = $authorSurnameList[$randSurnameKey];
            $authorObject->surname = $faker->word();
            $authorObject->email = $faker->email();
            $authorObject->birth_year = $faker->year();

            $authorObject->save();
            $arrayIdAuthor[] = $authorObject->id; 
            
        }

        for($i = 0; $i < 15; $i++) {
            // Creazione dell'oggetto:
            $articleObject = new article();
            $articleObject->title = $faker->words(5, true);

            $randIdKey = array_rand($arrayIdAuthor, 1);
            $randId = $arrayIdAuthor[$randIdKey];
            $articleObject->author_id = $randId; 
        
            $articleObject->descrizione = $faker->paragraph(3);
            $articleObject->cover = $faker->imageUrl(400, 400, 'article', true);
            
            $articleObject->created_at = null;
            $articleObject->updated_at = null;
            $articleObject->save();
        }

        


    }
}
