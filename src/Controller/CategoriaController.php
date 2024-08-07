<?php
namespace GaleriaPHP\Controller;

use GaleriaPHP\Model\Categoria;

class CategoriaController
{
    public function create()
    {
        require_once('src/View/categoria.php');
        // cada usuario possui suas categorias
        if (isset($_POST['categoria'])) {
            $categoria = new Categoria();
            $categoria->setNome($_POST['categoria']);
            $categoria->setUserId($_SESSION['user']->id);
            $categoria->create();
        }
    }
    public function listAll(){
        // buscando as categorias do usuario logado
        $obj = new Categoria();
        $obj->setUserId($_SESSION['user']->id);
        $categorias = $obj->listAll();

        require_once('src/View/upload.php');
    }
}
