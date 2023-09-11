<?php

namespace app\DataBase;

use \PDO;
use \PDOException;


class  dataBase
{

    /**
     * Host da conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'Escola';

    /**
     * Usuário do banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = 'root';


    /**
     * Nome da tabela do banco de dados
     * @var string 
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados
     * @var PDO
     */
    private PDO $connection;

    /**
     * Método que define a tabela e a instância da conexão
     * @param string $table
     */

    public function __construct($table = null)
    {
        $this->table = $table;

        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Houve um erro ao se conectar ao banco de dados!" . $e;
        }
    }


    /**
     * Método responsável por executar query dentro do banco de dados 
     * @param string $query
     * @param array $params
     * @param PDOStatement
     */

    public function execute($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Método responsável por excluir dados do banco
     * @param string 
     * @return boolean
     */
    public function delete($where)
    {
        // Monta a query
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
    
        // Tente executar a query
        try {
            $this->execute($query);
            var_dump($query);
            return true;
        } catch (PDOException $e) {
            // Captura a exceção e imprime a mensagem de erro
            echo 'Erro ao excluir registro: ' . $e->getMessage();
            return false;
        }
    }
    
    /**
     * Método responsável por executar atualizações no banco de dados
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update($where, $values) {

        $fields = array_keys($values);
  
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,' , $fields). '=? WHERE ' . $where;
        $this->execute($query, array_values($values));
  
        return true;
  
      }

    /**
     * Método responsável por inserir dados no banco de dados
     * @param array $values [field => value];
     * @return integer
     */

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $values_fields = array_values($values);

        $this->execute($query, $values_fields);

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        // Dados da query
        $where = !empty($where) ? 'WHERE ' . $where : '';
        $order = !empty($order) ? 'ORDER BY ' . $order : '';
        $limit = !empty($limit) ? 'LIMIT ' . $limit : '';


        // Monta a query
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        // Executa a query
        return $this->execute($query);
    }

    public function updateRankings()
    {
        $query = "SET @rank = 0; UPDATE " . $this->table . "
                      SET colocacao = (@rank := @rank + 1)
                      ORDER BY pontuacao DESC";

        $this->execute($query);
    }
}
