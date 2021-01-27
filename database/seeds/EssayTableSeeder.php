<?php

use Illuminate\Database\Seeder;

class EssayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $essay = new \App\Essay([
            'title' => 'Treads',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Explore',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Finish',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Lines',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Southwest',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Window',
        ]);
        $essay->save();
    }
     
    /*
    public function run()
    {
        $essay = new \App\Essay([
            'imgPath' => 'src/assets/img/portfolio/01-thumbnail.jpg',
            'title' => 'Treads',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'imgPath' => 'src/assets/img/portfolio/02-thumbnail.jpg',
            'title' => 'Explore',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'imgPath' => 'src/assets/img/portfolio/03-thumbnail.jpg',
            'title' => 'Finish',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'imgPath' => 'src/assets/img/portfolio/04-thumbnail.jpg',
            'title' => 'Lines',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'imgPath' => 'src/assets/img/portfolio/05-thumbnail.jpg',
            'title' => 'Southwest',
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'imgPath' => 'src/assets/img/portfolio/06-thumbnail.jpg',
            'title' => 'Window',
        ]);
        $essay->save();
    }
    */
}
