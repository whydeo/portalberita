<?php

use Illuminate\Database\Seeder;
use App\TentangModel;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TentangModel::create([
        	'tentang' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
			'kontak' => '091252466371',
			'alamat' => 'MALANG',
			'email' => 'meanwhy189@gmail.com',
			'status' => 'aktif'
        ]);
    }
}


