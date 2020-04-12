<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'name' => 'Sapiens: Uma breve História da humanidade',
                'synopsis' => 'O que possibilitou ao Homo sapiens subjugar as demais espécies? O que nos torna capazes das mais belas obras de arte, dos avanços científicos mais impensáveis e das mais horripilantes guerras? Yuval Noah Harari aborda de forma brilhante estas e muitas outras questões da nossa evolução. Ele repassa a história da humanidade, relacionando com questões do presente. E consegue isso de maneira surpreendente. Em "Sapiens", Harari nos oferece não apenas conhecimento evolutivo, mas também sociológico, antropológico e até mesmo econômico. Ele se baseia nas mais recentes descobertas de diferentes campos como paleontologia, biologia e antropologia. Esta edição traz dezenas de imagens, mapas e tabelas que deixam este best-seller mundial ainda mais dinâmico.',
                'year_published_at' => 2011,
                'author_id' => 1,
                'total_pages' => 443,
                'readed_page_at' => 0,
                'status' => 0
            ],
            [
                'name' => 'Homo Deus: Uma breve história do amanhã',
                'synopsis' => 'Neste Homo Deus: uma breve história do amanhã, Yuval Noah Harari, autor do estrondoso best-seller Sapiens: uma breve história da humanidade, volta a combinar ciência, história e filosofia, desta vez para entender quem somos e descobrir para onde vamos. Sempre com um olhar no passado e nas nossas origens, Harari investiga o futuro da humanidade em busca de uma resposta tão difícil quanto essencial: depois de séculos de guerras, fome e pobreza, qual será nosso destino na Terra? A partir de uma visão absolutamente original de nossa história, ele combina pesquisas de ponta e os mais recentes avanços científicos à sua conhecida capacidade de observar o passado de uma maneira inteiramente nova. Assim, descobrir os próximos passos da evolução humana será também redescobrir quem fomos e quais caminhos tomamos para chegar até aqui.',
                'year_published_at' => 2015,
                'author_id' => 1,
                'total_pages' => 448,
                'readed_page_at' => 0,
                'status' => 0
            ],
            [
                'name' => '21 Lições para o Século 21',
                'synopsis' => 'O novo livro do autor de Sapiens e Homo Deus explora as grandes questões do presente e o que podemos fazer para melhorálo. Como podemos nos proteger de guerras nucleares, cataclismos ambientais e crises tecnológicas? O que fazer sobre a epidemia de fake news ou a ameaça do terrorismo? O que devemos ensinar aos nossos filhos? Em Sapiens, Yuval Noah Harari mostrou de onde viemos; em Homo Deus, para onde vamos. 21 lições para o século 21 explora o presente e nos conduz por uma fascinante jornada pelos assuntos prementes da atualidade. Seu novo livro trata sobre o desafio de manter o foco coletivo e individual em face a mudanças frequentes e desconcertantes. Seríamos ainda capazes de entender o mundo que criamos?',
                'year_published_at' => 2018,
                'author_id' => 1,
                'total_pages' => 372,
                'readed_page_at' => 0,
                'status' => 0
            ],
            [
                'name' => 'O Lobo da Estepe',
                'synopsis' => 'Obra clássica do Prêmio Nobel de Literatura Hermann Hesse “Romance célebre sobre o que pode afligir a alma humana e também uma crítica cruel à sociedade burguesa.” The New York Times “O Lobo da Estepe é tão genial quanto Ulisses, de Joyce.”Thomas Mann “A história de O Lobo da Estepe é, sem dúvida alguma, de sofrimentos e necessidades, mas mesmo assim não é um livro de um homem em desespero, mas o de um homem que crê. Embora trate de enfermidade e crise, não conduz à destruição e à morte, mas, ao contrário, à redenção.”Anders Österling, trecho do prefácio da edição sueca de 1932 Harry Haller acredita que sua integridade depende da vida solitária que leva em meio às palavras de Goethe e as partituras de Mozart: um intelectual de 50 anos tentando equilibrar-se à beira do abismo dos problemas sociais e individuais, ante os quais a sua personalidade se torna cada vez mais ambivalente e, por fim, estilhaçada. Este livro foi escrito quando Hesse tinha 50 anos, como seu personagem, e estava profundamente influenciado pela psicanálise. Um livro que provoca e subverte a imaginação do leitor, estilo altamente revolucionário para a época de Hesse, um clássico.',
                'year_published_at' => 1927,
                'author_id' => 2,
                'total_pages' => 237,
                'readed_page_at' => 237,
                'status' => 3
            ],
            [
                'name' => 'A Náusea',
                'synopsis' => 'A náusea é o primeiro romance de Jean-Paul Sartre, considerado pela crítica e pelo próprio autor o mais perfeito de sua sempre inquieta e inovadora carreira. O protagonista desta história é o intelectual pequeno-burguês Antoine Roquentin, símbolo de uma geração que descobre, horrorizada, a ausência de sentido da vida. Em um diário, o personagem passa, então, a catalogar impiedosamente todos os seus sentimentos, que culminam em uma sensação penetrante e avassaladora: a náusea. Publicado pela primeira vez em 1938, o livro foi um marco na ficção existencialista e é até hoje um dos textos mais famosos da literatura francesa do século XX. Esta edição conta com prefácio inédito de Caio Liudvik, pós-doutor em Filosofia e autor de Sartre e o pensamento mítico.',
                'year_published_at' => 1927,
                'author_id' => 3,
                'total_pages' => 253,
                'readed_page_at' => 100,
                'status' => 1
            ]
        ]);

    }
}

