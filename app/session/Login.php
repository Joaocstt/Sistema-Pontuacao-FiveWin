<?php 

    namespace app\session;

    class Login 
    {   

        /**
         * Método responsável por iniciar a sessão
         */
        private static function init() {
            // Verificando status da sessão
            if(session_status() !== PHP_SESSION_ACTIVE) {
                // Inicia a sessão
                session_start();
            }
        }

        /**
         * Método responsável por retornar os dados do usuário logado
         */
        public static function getUsuarioLogado() {
            self::init();

            return self::isLogged() ? $_SESSION['usuario'] : null;
        }

        /**
         * Método responsável por criar a sessão do usuário
         * @param Usuario
         */

        public static function login($obUsuario) {

            // Inicia a sessão
            self::init();

            // Sessão do usuário
            $_SESSION['usuario'] = [
                'id' => $obUsuario->UsuarioID,
                'nome' => $obUsuario->Nome,
            ];

            // Redireciona o usuário para index
            header('location: index.php');
            exit;
        }

        public static function logout() {
            // Inicia a sessão
            self::init();

            // Remove a sessão de usuário
            unset($_SESSION['usuario']);

            // Redireciona o usuário para login
            header('location: login.php');
            exit;
        }

        /**
         * Método responsável por verificar se o usuário está logado
         * @return boolean
         */
        public static function isLogged() {
            // Inicia a sessão
            self::init();

            // Retornando true
            return isset($_SESSION['usuario']['id']);
        }


        public static function requireLogin() {
            // Se o isLogged for falso o usuário vai pro login
            if(!self::isLogged()) {
                header('Location: index.php');
                exit;
            }
        }

        public static function requireLogout() {
            if(self::isLogged()) {
                header('Location: index.php');
                exit;
            }
        }
    }

