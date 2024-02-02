<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class limitation extends Seeder
{

    public function run(): void
    {
        $date=Carbon::now();
        DB::table('videostatuses')->insert([
        ['title_limit'=>'Нет ограничений', 'created_at'=>$date, 'updated_at'=>$date],
        ['title_limit'=>'Нарушение', 'created_at'=>$date, 'updated_at'=>$date],
        ['title_limit'=>'Теневой бан', 'created_at'=>$date, 'updated_at'=>$date],
        ['title_limit'=>'Бан', 'created_at'=>$date, 'updated_at'=>$date],
    ]);
    }
}
