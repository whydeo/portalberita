<?php

use Illuminate\Database\Seeder;
use App\KategoriModel;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriModel::create([
        	'nama' => 'ARTIS',
        	'keterangan' => 'Membahas semua artis',
        	'status' => 'active',
        	'tanggal' => date('Y-m-d')
        ]);
        KategoriModel::create([
        	'nama' => 'MUSIK',
        	'keterangan' => 'Membahas semua musik',
        	'status' => 'active',
        	'tanggal' => date('Y-m-d')
        ]);
        KategoriModel::create([
        	'nama' => 'FILM',
        	'keterangan' => 'Membahas semua film',
        	'status' => 'active',
        	'tanggal' => date('Y-m-d')
        ]);
        KategoriModel::create([
        	'nama' => 'TRENDING',
        	'keterangan' => 'Membahas semua yang trending',
        	'status' => 'active',
        	'tanggal' => date('Y-m-d')
        ]);
    }
}
