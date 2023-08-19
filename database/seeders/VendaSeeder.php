<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{

    public function run(): void
    {
        Venda::create(
            [
                'numero_da_venda' => '4',
                'produto_id' => 4,
                'cliente_id' => 4,
            ]
            );
        Venda::create(
            [
                'numero_da_venda' => '4',
                'produto_id' => 4,
                'cliente_id' => 4,
            ]
            );
    }
}
