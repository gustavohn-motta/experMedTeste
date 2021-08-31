<?php

class Relatorio  
{
    public $qtdCliente;
    
    public $qtdVendedores;
    
    public $idMaiorVenda;
   
    public $valorMaiorvenda;

    public $valorMenorVenda;
    
    public $piorVendedor;

    function gerarRelatório(){

        //Define nome do relatório
        $nomeRelatorio = 'relatório - ' . date('d-m-Y-H-i-s') .'.done.dat';
        //Cria arquivo  e inicia escrita dos dados
        $relatorio = fopen($nomeRelatorio, 'w+');
        fwrite($relatorio, "
        ______                      __  __          _ 
       |  ____|                    |  \/  |        | |
       | |__  __  ___ __   ___ _ __| \  / | ___  __| |
       |  __| \ \/ / '_ \ / _ \ '__| |\/| |/ _ \/ _` |
       | |____ >  <| |_) |  __/ |  | |  | |  __/ (_| |
       |______/_/\_\ .__/ \___|_|  |_|  |_|\___|\__,_|
                   | |                                
                   |_|                                
      " . PHP_EOL);
        fwrite($relatorio, '-----------------Relatório de vendas------------------' . PHP_EOL .
                '|Data: ' . date('d-m-Y') . PHP_EOL .
                '|Hora: ' . date('H:i:s') . PHP_EOL .
                '|__________________________________' . PHP_EOL);
        fwrite($relatorio, 
                '_______________DADOS_______________' . PHP_EOL .
                "Quantidade de clientes: $this->qtdCliente" . PHP_EOL .
                "Quantidade de Vendedores: $this->qtdVendedores" . PHP_EOL .
                "ID Venda mais Cara: $this->idMaiorVenda" . ' (R$ ' . number_format($this->valorMaiorvenda, 2, ',', '.') . ')' . PHP_EOL .
                "Pior Vendedor: $this->piorVendedor" . PHP_EOL);
        fwrite($relatorio, '___________________________________'. PHP_EOL . 
                "*Pior Vendedor baseado no menor valor de vendas dos dados importados!" . PHP_EOL . 
                '---------------------Fim do Relatório------------------' . PHP_EOL);

                //Fecha arquivo 
                fclose($relatorio);
        //define local para arquivo ser inserido
        $localArquivo = "%HOMEPATH%/data/out/" . $nomeRelatorio;
        rename($nomeRelatorio, $localArquivo);

    }
}

