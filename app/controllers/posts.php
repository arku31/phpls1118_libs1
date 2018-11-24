<?php
namespace App;

use \App\Models\User;

class Posts extends MainController
{
    public function index()
    {
        $users = new User();
        $allusers = $users->all();
        $this->view->render('posts', [
            'allusers' => $allusers,
            'moredata' => 'Случайная строка'
        ]);
    }
}