<?php 

namespace app\DataBase;

class Pagination 
{
    /**
     * Número máximo de registros por página
     * @var integer
     */
    private int $limit; 

    /**
     * Quantidade total de resultados
     * @var integer
     */

    private $results;

    /**
     * Quantidade de páginas 
     * @var integer
     */

    private $pages;

    /**
     * Página atual
     * @var integer
     */

    private $currentPage;

    /**
     * Construtor da classe
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    public function __construct($results, $currentPage = 1, $limit = 5)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) AND $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    private function calculate() {
        // CALCULAR O TOTAL DE PÁGINAS
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        // VERIFICA SE A PÁGINA ATUAL NÃO ATINGE O NÚMERO DE PÁGINAS
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Método responsável por retornar a cláusula limit do sql
     * @return string
     */
    public function getLimit() {
        $offset = ($this->limit * ($this->currentPage - 1));
        return $offset.', '. $this->limit;
    }

    /**
     * Método responsável por retornar as opções de páginas disponiveis
     * @return array
     */

    public function getPages() {
        // NÃO RETORNA PAGINAS 
        if($this->pages == 1) return [];

        // Páginas 
        $paginas = [];

        for($i = 1; $i <= $this->pages; $i++) {
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }

        return $paginas;
    }
}



