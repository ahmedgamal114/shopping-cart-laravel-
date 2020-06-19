<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \App\product([

          'imagepath'=>'/images-products/1.JPG',
          'price'=>'11',
          'title'=>'first product',
          'description'=>' this is agood product for woman ......',

        ]);
        $product->save();

        $product = new \App\product([

          'imagepath'=>'/images-products/2.JPG',
          'price'=>'161',
          'title'=>'first product',
          'description'=>' this is agood product for woman ......',

        ]);
        $product->save();

        $product = new \App\product([

          'imagepath'=>'/images-products/3.JPG',
          'price'=>'141',
          'title'=>'first product',
          'description'=>' this is agood product for woman ......',

        ]);
        $product->save();

        $product = new \App\product([

          'imagepath'=>'/images-products/4.JPG',
          'price'=>'40',
          'title'=>'first product',
          'description'=>' this is agood product for woman ......',

        ]);
        $product->save();

        $product = new \App\product([

          'imagepath'=>'/images-products/5.JPG',
          'price'=>'12',
          'title'=>'first product',
          'description'=>' this is agood product for woman ......',

        ]);
        $product->save();
        $product = new \App\product([

          'imagepath'=>'/images-products/6.JPG',
          'price'=>'12',
          'title'=>'first product',
          'description'=>' this is agood product for woman ......',

        ]);
        $product->save();




    }
}
