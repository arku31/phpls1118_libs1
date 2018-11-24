<?php
require "init.php";
$id= $_GET['id'];

if (!empty($id)) {
    $user = User::find($id);
    $user->delete();
    print_r($user);
//    User::destroy(123);
}
