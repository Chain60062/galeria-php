<?php
namespace GaleriaPHP\Controller;

use GaleriaPHP\Model\Imagem;

class ImagensController
{
    public function listAll()
    {
        $obj = new Imagem();
        $obj->setUserId($_SESSION['user']->id);
        $imagens = $obj->listAll();

        require_once('src/View/imagens.php');
    }
}
