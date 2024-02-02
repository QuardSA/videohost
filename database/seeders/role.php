<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date=Carbon::now();
        DB::table('roles')->insert([
        ['title_role'=>'Администратор', 'created_at'=>$date, 'updated_at'=>$date],
        ['title_role'=>'Клиент', 'created_at'=>$date, 'updated_at'=>$date],
    ]);
    }
}
