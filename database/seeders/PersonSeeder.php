<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama' => 'Andjar Boedi Sarwono',
                'tipe' => 'INDIVIDU',
                'jabatan' => 'MANAGER HRD',
                'pembelian' => '0',
                'kabag' => '1',
                'npwp' => '',
                'alamat' => 'Cirebon',
                'kopos' => '',
                'kota' => 'Cirebon',
                'provinsi' => 'Jawa Barat',
                'telp' => '',
                'contact' => '',
                'uang' => 'Rp',
                'email' => '',
                'dibuat' => '',
                'status' => 'Aktif',
            ],
        ];

        foreach ($user as $key => $value) {
            DB::table('person')->insert($value);
        }
    }
}
