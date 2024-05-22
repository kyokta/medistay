<?php

namespace Database\Seeders;

use App\Models\RsRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RsRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RsRoom::factory()->count(20)->create();
    }
}
