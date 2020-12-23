<?php

namespace Database\Seeders;

use App\Models\Adminstration\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public $admin ;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->admin = Admin::factory()->create();
    }
}
