<?php

use Illuminate\Database\Seeder;
// Importare i due model:
use App\article; 
use App\author;
use App\tag;
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
        // Per la tabella many to many:
        $tagsList = [
            'Sport',
            'Cinema',
            'Giochi',
            'News',
            'Esteri',
            'Politica',
            'Vip',
            'Social'
        ];

        $tagsIdList = []; // 1, 2, 3, 4, 5, 6, 7, 8
        foreach($tagsList as $tag) {
            // Oggetto tag
            $tagObject = new tag();
            $tagObject->name = $tag; 
            $tagObject->save();
            $tagsIdList[] = $authorObject->id;
        }



        for($i = 0; $i < 15; $i++) {
            // Creazione dell'oggetto:
            // Oggetto article:
            $articleObject = new article();
            $articleObject->title = $faker->words(5, true);

            $randIdKey = array_rand($arrayIdAuthor, 1);
            $randId = $arrayIdAuthor[$randIdKey];
            $articleObject->author_id = $randId; 
        
            $articleObject->descrizione = $faker->paragraph(2);
            $articleObject->testo = $faker->text(600);
            $articleObject->cover = $faker->imageUrl(1000, 400, 'article', true);
            
            $articleObject->created_at = null;
            $articleObject->updated_at = null;

            // Qui ora va l'id del many to many: 
            $tagKey = array_rand($tagsIdList, 1);
            $tagIdRand = $tagsIdList[$tagKey];
            $articleObject->save();

            $articleObject->tag()->attach($tagIdRand);
        }

        


    }
}
