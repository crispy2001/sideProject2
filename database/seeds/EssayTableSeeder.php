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
            'imgPath' => 'src/assets/img/portfolio/01-thumbnail.jpg',
            'content' => 'aqwekfl;qwekjfq;klwnvl;kjkl;jjkj;lkj;oiq'
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Explore',
            'imgPath' => 'src/assets/img/portfolio/02-thumbnail.jpg',
            'content' => 'aqwekfl;qwekjfq;klwnvl;kjkl;jjkj;lkj;oiq'
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Finish',
            'imgPath' => 'src/assets/img/portfolio/03-thumbnail.jpg',
            'content' => 'aqwekfl;qwekjfq;klwnvl;kjkl;jjkj;lkj;oiq'
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Lines',
            'imgPath' => 'src/assets/img/portfolio/04-thumbnail.jpg',
            'content' => 'aqwekfl;qwekjfq;klwnvl;kjkl;jjkj;lkj;oiq'
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Southwest',
            'imgPath' => 'src/assets/img/portfolio/05-thumbnail.jpg',
            'content' => 'aqwekfl;qwekjfq;klwnvl;kjkl;jjkj;lkj;oiq'
        ]);
        $essay->save();

        $essay = new \App\Essay([
            'title' => 'Window',
            'imgPath' => 'src/assets/img/portfolio/06-thumbnail.jpg',
            'content' => 'aqwekfl;qwekjfq;klwnvl;kjkl;jjkj;lkj;oiq'
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
