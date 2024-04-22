<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        Story::truncate();

        $story = Story::create([
            'title' => 'Projeto Sexto Sentido: Desporto para todos e todos pelo desporto',
            'date' => '2023-08-01',
            'description' => 'O Sexto Sentido é um projeto de inclusão social no desporto, que permite que pessoas cegas ou com baixa visão possam realizar corrida e caminhada guiada.',
            'link' => 'https://www.prorunners.pt/artigo/43/2107/projeto-sexto-sentido-desporto-para-todos-e-todos-pelo-desporto',
            'image' => '/news/2024/04/desporto_para_todos.jpg'
        ]);

        $story = Story::create([
            'title' => 'Projeto Sexto Sentido na PRO RUNNERS 17',
            'date' => '2023-06-30',
            'description' => 'São muitos os artigos que vai poder ler na Pro Runners Magazine #17. Entre eles pode conhecer o Projeto Sexto Sentido, um projeto de inclusão social no desporto que permite que pessoas cegas ou com baixa visão possam realizar corrida e caminhada guiada.',
            'link' => 'https://www.prorunners.pt/noticia/16/1881/projeto-sexto-sentido-na-pro-runners-17',
            'image' => '/news/2024/04/pro_runners_17.jpg'
        ]);

        $story = Story::create([
            'title' => 'Projeto de corrida para cegos criado no Brasil já reúne 20 duplas no Porto',
            'date' => '2023-05-18',
            'description' => 'Guia e marido de Bárbara, Ricardo Ribeiro contou que, no Porto, entre atletas e guias já contabilizam “cerca de 20 duplas a correr”, um número que classificou de “muito bom”.',
            'link' => 'https://desporto.sapo.pt/modalidades/atletismo/artigos/video-projeto-de-corrida-para-cegos-criado-no-brasil-ja-reune-20-duplas-no-porto',
            'image' => '/news/2024/04/20_duplas.png'
        ]);                

        $story = Story::create([
            'title' => 'Sexto sentido: inspirador',
            'date' => '2024-02-05',
            'description' => 'Há um projeto a crescer em Portugal que tem como objetivo ajudar pessoas invisuais a correr e a caminhar. Tudo funciona através de voluntários que servem como guias. E há mesmo quem, apesar de invisual, participe em provas de corridas com vários quilómetros.',
            'link' => 'https://tvi.iol.pt/noticias/videos/sexto-sentido-inspirador/65c0eb7d0cf25f99539878d9',
            'image' => '/news/2024/04/inspirador.png'
        ]);                
        
    }
}
