# Teste Expermed ::computer:

​	A aplicação desse repositório tem como solução **ler um lote de arquivos .dat** de um diretório determinado pelo usuário **Processar seus dados**  e gerar um **arquivo.done.dat como relatório dos dados inseridos**

________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

###### Estrutura do projeto

- Diretório Class
  - Este diretório contem um arquivo relatório.php contendo a classe Relatorio com as seguintes propriedades e métodos:
    - public $qtdCliente; 
    - public $qtdVendedores; 
    - public $idMaiorVenda;  
    - public $valorMaiorvenda;
    - public $valorMenorVenda; 
    - public $piorVendedor;
    - gerarRelatório();

- Diretório assets
  - Contem um arquivo pub_function.php contendo funções utilizadas no processamento
- diretorio Root
  - Contem o arquivo principal genRelatorio.php responsável por abstrair os dados do diretório indicado formatar os dados e fazer o processamento e o encapsulamento dentro do objeto Relatorio

---------------------------------------

**Configurando diretório de entrada e saída**

- Entrada
  - Para configurar o diretório das entradas dos dados precisamos configurar o caminho alterando valor da variável **$path** que por padrão recebe uma String **'%HOMEPATH%/data/in/'**
- Saída
  - já para configurar o diretorio de saída, precisamos alterar a variável **$localArquivo** em  que por padrão recebe uma String **'%HOMEPATH%/data/out/'** 
    - CUIDADO! **$localArquivo** Carrega após o caminho o nome de saída do relatório. qualquer alteração indevida pode fazer com que o nome configurado nao seja gerado.

----------------------------------------

**Configurando nome do Arquivo de relatório**

- Nome arquivo
  -  Para configurar o nome do arquivo basta alterar a variável **$nomeRelatório** que por padrão vem com a String 'Relatorio - ' ,função Date('d-m-Y-H-i-s'), '.done.dat'
    - CUIDADO! A extensão do arquivo é definido através da ultima string passada a variável

--------------------------

**Observação**

- O diretório Data e um diretório montado para teste do funcionamento da aplicação.
- O sistema realiza a leitura apenas de arquivos .dat no diretório indicado, porem nao realiza a exclusão de arquivos com outras extensões.



