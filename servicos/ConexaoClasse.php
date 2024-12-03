<?php

class ConexaoClasse {

    // Atributos privados para armazenar as informações de conexão
    private $_local;
    private $_senha;
    private $_usuario;
    private $_banco;

    // Construtor para inicializar os atributos com os parâmetros recebidos
    function __construct($_local, $_usuario, $_senha, $_banco) {
        $this->_local = $_local;
        $this->_usuario = $_usuario;
        $this->_senha = $_senha;
        $this->_banco = $_banco;
    }

    // Métodos getters para retornar os valores dos atributos privados
    function get_local() {
        return $this->_local;
    }

    function get_senha() {
        return $this->_senha;
    }

    function get_usuario() {
        return $this->_usuario;
    }

    function get_banco() {
        return $this->_banco;
    }

    // Métodos setters para modificar os valores dos atributos privados
    function set_local($_local) {
        $this->_local = $_local;
    }

    function set_senha($_senha) {
        $this->_senha = $_senha;
    }

    function set_usuario($_usuario) {
        $this->_usuario = $_usuario;
    }

    function set_banco($_banco) {
        $this->_banco = $_banco;
    }

    // Método para conectar ao banco de dados e retornar o link de conexão
    public function conectar() {
        $link = mysqli_connect($this->_local, $this->_usuario, $this->_senha, $this->_banco);
        return $link;
    }

    // Exemplo de uso:
    // $conexao = new ConexaoClasse('localhost', 'root', '', 'banco');
    // $link = $conexao->conectar();

    // Método para verificar se a conexão foi bem-sucedida
    public function verificaConexao() {
        if ($this->conectar()) {
            echo "OK"; // Conexão bem-sucedida
        } else {
            echo 'Sem conexão'; // Falha na conexão
        }
    }

    // Exemplo de uso:
    // $conexao = new ConexaoClasse('localhost', 'root', '', 'banco');
    // $conexao->verificaConexao();

    // Método para listar valores de uma única coluna a partir de uma consulta SQL
    public function listaOcorrencia($consulta, $indice) {
        $query = mysqli_query($this->conectar(), $consulta);
        $ocorrencias = array();
        while ($row = mysqli_fetch_array($query)) {
            array_push($ocorrencias, $row[$indice]); // Adiciona valores da coluna ao array
        }

        return $ocorrencias;
    }

    // Exemplo de uso:
    // $consulta = "SELECT nome FROM clientes";
    // $nomes = $conexao->listaOcorrencia($consulta, 'nome');

    // Método para listar múltiplos valores a partir de uma consulta SQL
    public function listaOcorrenciaCompleta($consulta, $indices) {
        $query = mysqli_query($this->conectar(), $consulta);
        $ocorrencias = array();
        $colunas = count($indices); // Conta quantos índices foram passados
        while ($row = mysqli_fetch_array($query)) {
            for ($i = 0; $i < $colunas; $i++) {
                array_push($ocorrencias, $row[$indices[$i]]); // Adiciona cada valor ao array
            }
        }

        return $ocorrencias;
    }

    // Exemplo de uso:
    // $consulta = "SELECT nome, email FROM clientes";
    // $resultados = $conexao->listaOcorrenciaCompleta($consulta, ['nome', 'email']);

    // Método para executar uma consulta SQL para salvar dados no banco
    public function salvaOcorrencia($consulta) {
        $retorno = mysqli_query($this->conectar(), $consulta);
        return $retorno; // Retorna o resultado da operação
    }

    // Exemplo de uso:
    // $consulta = "INSERT INTO clientes (nome, telefone, email) VALUES ('Carlos', '11999999999', 'carlos@gmail.com')";
    // $conexao->salvaOcorrencia($consulta);

    // Método para executar uma consulta SQL para excluir dados no banco
    public function excluiOcorrencia($consulta) {
        mysqli_query($this->conectar(), $consulta);
    }

    // Exemplo de uso:
    // $consulta = "DELETE FROM clientes WHERE id = 1";
    // $conexao->excluiOcorrencia($consulta);

    // Método para contar o número de ocorrências de uma consulta SQL
    public function contaOcorrencias($consulta) {
        $ocorrencia = mysqli_query($this->conectar(), $consulta);
        $contagem = mysqli_num_rows($ocorrencia); // Conta o número de linhas retornadas
        return $contagem;
    }

    // Exemplo de uso:
    // $consulta = "SELECT * FROM clientes";
    // $total = $conexao->contaOcorrencias($consulta);

    // Método para fechar a conexão com o banco de dados
    public function fechaConexao() {
        $fechar = mysqli_close($this->conectar());
        return $fechar; // Retorna o resultado da operação
    }

    // Exemplo de uso:
    // $conexao->fechaConexao();

    // Método para executar uma consulta SQL para editar dados no banco
    public function editarOcorrencia($consulta) {
        $retorno = mysqli_query($this->conectar(), $consulta);
        return $retorno; // Retorna o resultado da operação
    }

    // Exemplo de uso:
    // $consulta = "UPDATE clientes SET nome = 'Ana Costa' WHERE id = 2";
    // $conexao->editarOcorrencia($consulta);

    // Método para listar entidades completas com base nos atributos passados
    public function listarEntidade($consulta, $atributos) {
        $query = mysqli_query($this->conectar(), $consulta);
        $entidades = array();
        
        while ($row = mysqli_fetch_assoc($query)) {
            $entidade = array();
            
            foreach ($atributos as $atributo) {
                $entidade[$atributo] = $row[$atributo]; // Mapeia cada atributo ao valor correspondente
            }
            
            array_push($entidades, $entidade); // Adiciona a entidade ao array de entidades
        }
        
        return $entidades;
    }

    // Exemplo de uso:
    // $consulta = "SELECT * FROM clientes";
    // $entidades = $conexao->listarEntidade($consulta, ['id', 'nome', 'email']);
}

?>
