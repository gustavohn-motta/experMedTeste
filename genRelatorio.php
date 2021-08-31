<?php
require_once 'assets/pub_function.php';
require_once 'Class/Relatorio.php';
//Defini caminho para extrair os Nome dos arquivos
$path = "data/in/";
$diretorio = dir($path);
$cont = 0;

//lista Nome arquivos no diretório existente e armazena no array
while ($listaNomeArquivos[] = $diretorio ->read()) {
    $cont++;
}
//var_dump($listaNomeArquivos);

//remove boolean false do array
//var_dump($cont);
unset($listaNomeArquivos[$cont]);
//var_dump($listaNomeArquivos);

//remove, componentes iniciais do array
array_splice($listaNomeArquivos, 0, 2);
//var_dump($listaNomeArquivos);

//Verifica se o arquivo  é '.dat' | se não for retorna null no array
$arrayChecked = array_map("verificaArquivo", $listaNomeArquivos);
//var_dump($arrayChecked);
$arrayFiltred = array_filter($arrayChecked);

//var_dump($arrayFiltred);

//Cria objeto para instânciar relatórios
$novoRelatorio = new Relatorio();
$novoRelatorio->qtdCliente = 0;
$novoRelatorio->qtdVendedores = 0;

$stack = 0;


//abre arquivo e retorna conteudo dele
foreach ($arrayFiltred as $NomeArquivos) {
    $file = file($path . $NomeArquivos);
    foreach ($file as $contentArq) {
        
        //separa o id do dado e faz a verificação:
        list($idVerify) = explode('ç', $contentArq);
        
        //realiza contagem de vendedores
        if ($idVerify ==='001') {
            list($id, $cpf, $nome, $Salario ) = explode('ç', $contentArq);
            $novoRelatorio->qtdVendedores++;
        }
        //realiza a contagem de clientes
        elseif ($idVerify === '002') {
            list($id, $cnpj, $nome, $ramo ) = explode('ç', $contentArq);
            $novoRelatorio->qtdCliente++;
        }
        //formata e processa dados das vendas
        else {
            list($id, $idVendedor, $listaItens, $Vendedor) = explode('ç', $contentArq);
            
            $format = array('[',']', ' '); //parametros para o str_replaces
            $listaItensFormat = str_replace($format, '',$listaItens); //Remove colchetes e espaços da string
            $arrayItens = explode(',', $listaItensFormat); //separa cada item da string
            $ValorTotalItem = array_map("calcularValorItem", $arrayItens); //Calcula total do valor de cada Item
            $totalCompra = array_sum($ValorTotalItem); //soma os valores e gera o total da venda

            //define valores inicias
            if ($stack === 0) {
                $novoRelatorio->idMaiorVenda = $idVendedor;
                $novoRelatorio->valorMaiorvenda = $totalCompra;
                
                $novoRelatorio->valorMenorVenda =$totalCompra;
                $stack++;
            }
            //define Maior Venda
            elseif ($totalCompra > $novoRelatorio->valorMaiorvenda) {
               $novoRelatorio->valorMaiorvenda = $totalCompra;
               $novoRelatorio->idMaiorVenda = $idVendedor;
            }
            
            //define Pior Vendedor
            elseif ($totalCompra < $novoRelatorio->valorMenorVenda) {
                $novoRelatorio->valorMenorVenda = $totalCompra;
                $novoRelatorio->piorVendedor = $Vendedor;
            }
        }
    }
}

//chama método para gerar o relátorio
$novoRelatorio->gerarRelatório();





