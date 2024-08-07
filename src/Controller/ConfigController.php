<?php
namespace GaleriaPHP\Controller;

use GaleriaPHP\Model\{User, Imagem};

class ConfigController
{
    public function view()
    {
        require_once('src/View/configs.php');
    }
    public function deleteAccount()
    {
        
    }
    public function alterAccount()
    {

    }
    public function alterImage()
    {
        $obj = new Imagem();

        if (isset($_POST['submit'])) {
            $name = $_FILES['image']['name'];
            $temp_name  = $_FILES['image']['tmp_name'];

            if (isset($name) and !empty($name)) {
                $location = './uploads/';
                if (move_uploaded_file($temp_name, $location . $name)) {
                    $obj->setCaminho($location . $name);
                    $obj->setUserId($_SESSION['user']->id);
                    $obj->create();
                }
            } else {
                echo 'You should select a file to upload !!';
            }
        }
    }
}
