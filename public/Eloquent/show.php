<?php
require "init.php";
$id= $_GET['id'];

if(!empty($id))
{
//    $user = User::find($id);
//    $user->newfield = 'asd';
//    $user->save();
//    echo ($user);

    $posts = User::with('posts')
        ->where('id', $id)
        ->first()
        ->toArray();

    echo '<pre>';
    print_r($posts);
}
