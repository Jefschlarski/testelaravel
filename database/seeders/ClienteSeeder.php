<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
   
    public function run(): void
    {
        Cliente::create(
            [
                'nome' => 'Teste Teste1',
                'email' => 'teste@gmail.com',
                'endereco' => 'Rua x',
                'logradouro' => 'logradouro x',
                'cep' => '22124404',
                'bairro' => 'bairro x',
            ]
            );
        Cliente::create(
            [
                'nome' => 'Teste Teste',
                'email' => 'teste@gmail.com',
                'endereco' => 'Rua x',
                'logradouro' => 'logradouro x',
                'cep' => '22124404',
                'bairro' => 'bairro x',
            ]
            );
    }
}
