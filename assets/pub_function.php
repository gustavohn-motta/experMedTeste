<?php
//Verifica se o arquivo possui extensão '.dat'
//se falso retorna null  
function verificaArquivo($nomeArquivo){
    list($nome, $extensao) = explode('.', $nomeArquivo);
    if ($extensao !== 'dat') {
        return null;
    }
    else{
        return $nomeArquivo;
    }

}

//calcula valor dos itens da compra
//retorna valor total
function calcularValorItem($itens){
    list($IdItem, $quantItem, $valorItem) = explode('-', $itens);
    $valorTotal = $quantItem * floatval($valorItem);

    return $valorTotal;
}