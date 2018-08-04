<?php

use Illuminate\Database\Seeder;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDatetime = date('Y-m-d H:i:s');
        \Illuminate\Support\Facades\DB::table('cats')->insert([
           'id' =>1,
           'name' =>'meo tam the',
            'date_of_birth' =>date('Y-m-d'),
            'breeds_id' =>1,
            'created_at'=>$currentDatetime,
            'updated_at'=>$currentDatetime,
        ]);
    }
}
