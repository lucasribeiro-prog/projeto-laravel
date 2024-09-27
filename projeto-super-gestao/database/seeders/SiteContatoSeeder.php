<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$siteContato = new SiteContato();
        $siteContato->nome = 'Sistema SG';
        $siteContato->telefone = '(62) 99999-5555';
        $siteContato->email = 'contato@email.com';
        $siteContato->motivo_contato = 1;
        $siteContato->mensagem = 'Seja bem vindo ao sistema super gestão';
        $siteContato->save();*/

        SiteContato::factory()->count(100)->create();
    }
}
