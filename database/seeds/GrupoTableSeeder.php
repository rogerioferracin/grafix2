<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class GrupoTableSeeder extends Seeder
{
    public function seed()
    {
        //delete old data
        DB::table('funcoes')->delete();

        DB::table('funcoes')->insert(array(
            array('funcao' => 'Administrador', 'detalhes' => 'Administrador do sistema'),
            array('funcao' => 'Financeiro', 'detalhes' => 'Responsável por faturamento, contas a pagar e receber'),
            array('funcao' => 'Produção', 'detalhes' => 'Usuário comum do sistema'),
            array('funcao' => 'Pré-impressão', 'detalhes' => 'Responsável por diagramação e área de pré impressão'),
            array('funcao' => 'Comercial', 'detalhes' => 'Responsável pelo atendimento ao cliente e vendas.'),
        ));
    }
}