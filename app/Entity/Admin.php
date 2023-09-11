<?php 

 namespace app\Entity;
 
 use app\DataBase\dataBase;

 use \PDO; 

 class Admin 
 {
    /**
     * Identificador único do usuário
     * @var integer 
     */
    public $id; 

    /**
     * Nome do Admin
     * @var string
     */
    public $nome;

      /**
     * Nome do Admin
     * @var string
     */
    public $login;

    /**
     * Senha do usuário
     * @var string
     */
    public $senha;


      /**
         * Método responsável por retornar uma instancia de usuário com base no nome
         * @param string 
         * @return Usuario
         */
        public static function getUsuarioPorEmail($login) {
         return (new Database('Usuario'))->select('Login = "'.$login.'"')->fetchObject(self::class);
     }


 }