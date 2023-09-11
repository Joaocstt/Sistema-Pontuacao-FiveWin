<?php 

    namespace app\Entity;

    use app\DataBase\DataBase;

    use \PDO;
    use PDOException;

    class Aluno 
    {
        /**
         * Indentificador do aluno
         * @var integer
         */
        public $id; 

        /**
         * Nome do aluno
         * @var string
        */
        public $nome; 

        /**
         * Nome da escola
         * @var string
         */
        public $escola; 

        /**
         * Pontuação do aluno
         * @var integer
         */
        public $pontuacao;

        /**
         * Método responsável por cadastrar um novo aluno no banco.
         * @return boolean
        */

        public function register($table) {

            $obDatabase = new DataBase($table);

            $this->id = $obDatabase->insert([
                'Nome' => $this->nome,
                'Escola'=>$this->escola,
                'Pontuacao' => $this->pontuacao
            ]);
        }


        public function updatePoints($table, $id) {
            
          return (new Database($table))->update('id = ' . $id, [
            'Pontuacao' => $this->pontuacao,
          ]);
        }

        public function update($table, $id) {
            
          return (new Database($table))->update('id = ' . $id, [
            'Nome' => $this->nome,
            'Escola' => $this->escola,
          ]);
        }

        public function excluir($table, $id) {
            return (new Database($table))->delete('id = '.$id);
          }

        /**
         * Método responsável por obter as vagas do banco de dados
         * @param string $where
         * @param string $order
         * @param string $limit
         * @return array
         */
        public static function getAlunos($table, $where = null, $order = null, $limit = null) {
            return (new Database($table))->select($where, $order, $limit)->fetchAll(\PDO::FETCH_CLASS, self::class);
        }


        public static function getQuantidadeAlunos($table = null, $where = null) {

            return (new Database($table))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
            
          }

          public static function getAluno($table, $id) {
            return (new Database($table))->select('id = ' . $id)->fetchObject(self::class);
    
          }

      
    }
