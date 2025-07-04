<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
     public function index(Request $request){
        $query = $request->input('query'); // Pega o termo de pesquisa

        // Defina as informações de todos os seus cards aqui
        // Cada item no array representa um card e suas "palavras-chave"
        $allCards = [
            [
                'title' => 'Receitas',
                'keywords' => ['receitas', 'dinheiro', 'público', 'verba', 'caixa'],
                'icon' => 'mdi:cash-multiple',
                'color_class' => 'btn-success-600',
                'route' => 'receitapublica',
            ],
            [
                'title' => 'Despesas',
                'keywords' => ['despesas', 'gastos', 'orçamento', 'pagamento'],
                'icon' => 'mdi:currency-usd-off',
                'color_class' => 'btn-warning-600',
                'route' => 'publico.despesas',
            ],
            [
                'title' => 'Execução Extraorçamentária',
                'keywords' => ['execução', 'extraorçamentária', 'orçamentária', 'extraco', 'contas', 'finanças'],
                'icon' => 'mdi:file-chart-outline',
                'color_class' => 'btn-info-600',
                'route' => 'publico.execucao.extraorcamentaria',
            ],
            [
                'title' => 'Relatório',
                'keywords' => ['relatório', 'relatórios', 'contas', 'balanço', 'documento'],
                'icon' => 'mdi:file-chart-outline',
                'color_class' => 'btn-info-600',
                'route' => 'publico.relatorio',
            ],
            [
                'title' => 'Servidores',
                'keywords' => ['servidores', 'funcionários', 'pessoal', 'RH', 'público'],
                'icon' => 'mdi:account-group-outline',
                'color_class' => 'btn-lilac-600',
                'route' => 'publico.servidores',
            ],
            [
                'title' => 'Processos Licitatórios',
                'keywords' => ['processos licitatórios', 'licitação', 'licitações', 'compras públicas', 'edital', 'concorrência'],
                'icon' => 'mdi:gavel',
                'color_class' => 'btn-primary-600',
                'route' => 'publico.processos',
            ],
            [
                'title' => 'Contratos',
                'keywords' => ['contratos', 'acordos', 'termos', 'convênio', 'jurídico'],
                'icon' => 'mdi:file-document-multiple-outline',
                'color_class' => 'btn-neutral-900',
                'route' => 'pulico.contrato', // Atenção: "pulico" ou "publico"? Verifique sua rota.
            ],
            [
                'title' => 'Compras Diretas',
                'keywords' => ['compras diretas', 'compra', 'dispensa', 'cotação', 'fornecedor'],
                'icon' => 'mdi:file-document-multiple-outline',
                'color_class' => 'btn-neutral-900',
                'route' => 'publico.compras.diretas',
            ],
        ];

        $filteredCards = collect(); // Cria uma coleção vazia para os resultados filtrados

        // Se houver um termo de pesquisa, filtra os cards
        if ($query) {
            $searchTerm = Str::lower($query); // Normaliza o termo de pesquisa para minúsculas

            foreach ($allCards as $card) {
                // Junta o título e as palavras-chave para a busca
                $searchableText = Str::lower($card['title'] . ' ' . implode(' ', $card['keywords']));

                // Verifica se o termo de pesquisa está contido no texto pesquisável
                if (Str::contains($searchableText, $searchTerm)) {
                    $filteredCards->push($card); // Adiciona o card se for um "match"
                }
            }
        } else {
            // Se não houver termo de pesquisa, exibe todos os cards
            $filteredCards = collect($allCards);
        }

        // Passa os cards filtrados (ou todos) e o termo de busca para a view
        return view("search", [
            'cards' => $filteredCards,
            'query' => $query // Para preencher o campo de busca com o que foi pesquisado
        ]);$query = $request->input('query'); // Pega o termo de pesquisa

        // Defina as informações de todos os seus cards aqui
        // Cada item no array representa um card e suas "palavras-chave"
        $allCards = [
            [
                'title' => 'Receitas',
                'keywords' => ['receitas', 'dinheiro', 'público', 'verba', 'caixa'],
                'icon' => 'mdi:cash-multiple',
                'color_class' => 'btn-success-600',
                'route' => 'receitapublica',
            ],
            [
                'title' => 'Despesas',
                'keywords' => ['despesas', 'gastos', 'orçamento', 'pagamento'],
                'icon' => 'mdi:currency-usd-off',
                'color_class' => 'btn-warning-600',
                'route' => 'publico.despesas',
            ],
            [
                'title' => 'Execução Extraorçamentária',
                'keywords' => ['execução', 'extraorçamentária', 'orçamentária', 'extraco', 'contas', 'finanças'],
                'icon' => 'mdi:file-chart-outline',
                'color_class' => 'btn-info-600',
                'route' => 'publico.execucao.extraorcamentaria',
            ],
            [
                'title' => 'Relatório',
                'keywords' => ['relatório', 'relatórios', 'contas', 'balanço', 'documento'],
                'icon' => 'mdi:file-chart-outline',
                'color_class' => 'btn-info-600',
                'route' => 'publico.relatorio',
            ],
            [
                'title' => 'Servidores',
                'keywords' => ['servidores', 'funcionários', 'pessoal', 'RH', 'público'],
                'icon' => 'mdi:account-group-outline',
                'color_class' => 'btn-lilac-600',
                'route' => 'publico.servidores',
            ],
            [
                'title' => 'Processos Licitatórios',
                'keywords' => ['processos licitatórios', 'licitação', 'licitações', 'compras públicas', 'edital', 'concorrência'],
                'icon' => 'mdi:gavel',
                'color_class' => 'btn-primary-600',
                'route' => 'publico.processos',
            ],
            [
                'title' => 'Contratos',
                'keywords' => ['contratos', 'acordos', 'termos', 'convênio', 'jurídico'],
                'icon' => 'mdi:file-document-multiple-outline',
                'color_class' => 'btn-neutral-900',
                'route' => 'pulico.contrato', // Atenção: "pulico" ou "publico"? Verifique sua rota.
            ],
            [
                'title' => 'Compras Diretas',
                'keywords' => ['compras diretas', 'compra', 'dispensa', 'cotação', 'fornecedor'],
                'icon' => 'mdi:file-document-multiple-outline',
                'color_class' => 'btn-neutral-900',
                'route' => 'publico.compras.diretas',
            ],
        ];

        $filteredCards = collect(); // Cria uma coleção vazia para os resultados filtrados

        // Se houver um termo de pesquisa, filtra os cards
        if ($query) {
            $searchTerm = Str::lower($query); // Normaliza o termo de pesquisa para minúsculas

            foreach ($allCards as $card) {
                // Junta o título e as palavras-chave para a busca
                $searchableText = Str::lower($card['title'] . ' ' . implode(' ', $card['keywords']));

                // Verifica se o termo de pesquisa está contido no texto pesquisável
                if (Str::contains($searchableText, $searchTerm)) {
                    $filteredCards->push($card); // Adiciona o card se for um "match"
                }
            }
        } else {
            // Se não houver termo de pesquisa, exibe todos os cards
            $filteredCards = collect($allCards);
        }

        // Passa os cards filtrados (ou todos) e o termo de busca para a view
        return view("search", [
            'cards' => $filteredCards,
            'query' => $query // Para preencher o campo de busca com o que foi pesquisado
        ]);
     }
}
