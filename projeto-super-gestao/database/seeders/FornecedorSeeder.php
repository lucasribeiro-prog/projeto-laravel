<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'fornecedor1.site.com.br';
        $fornecedor->uf = 'PA';
        $fornecedor->email = 'fornecedor1@email.com';
        $fornecedor->save();

        $fornecedor2 = new Fornecedor();
        $fornecedor2->nome = 'Fornecedor 2';
        $fornecedor2->site = 'fornecedor2.site.com.br';
        $fornecedor2->uf = 'GO';
        $fornecedor2->email = 'fornecedor2@email.com';
        $fornecedor2->save();

        $fornecedor3 = new Fornecedor();
        $fornecedor3->nome = 'Fornecedor 3';
        $fornecedor3->site = 'fornecedor3.site.com.br';
        $fornecedor3->uf = 'SP';
        $fornecedor3->email = 'fornecedor3@email.com';
        $fornecedor3->save();
    }
}
