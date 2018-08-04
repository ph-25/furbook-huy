<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDatetime = date('Y-m-d H:i:s');
      \Illuminate\Support\Facades\DB::table('breeds')->insert([
          ['id' =>1, 'name'=>"Domestic", 'created_at'=>$currentDatetime, 'updated_at'=>$currentDatetime],
          ['id' =>2, 'name'=>"Persian", 'created_at'=>$currentDatetime, 'updated_at'=>$currentDatetime],
          ['id' =>3, 'name'=>"Siamese", 'created_at'=>$currentDatetime, 'updated_at'=>$currentDatetime],
          ['id' =>4, 'name'=>"Abyssinian",'created_at'=>$currentDatetime, 'updated_at'=>$currentDatetime],
      ]);
    }
}
