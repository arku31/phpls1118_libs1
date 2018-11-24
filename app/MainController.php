<?php
namespace App;

use App\Core\View;

class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function defaultPage()
    {
        echo "Default";
    }
}