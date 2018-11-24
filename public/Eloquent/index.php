<?php
require('init.php');
//$users = User::with('posts')
//    ->where('id', '>', 15)
//    ->where('id', '<', 30)
//    ->get();

//$user = User::where('users.id', '>', 15)
//    ->where('name', 'like', 'N%')
//    ->orWhere('name', 'like', 'A%')
//    ->leftjoin('posts', 'users.id', '=', 'posts.user_id')
//    ->first()
//    ->toArray();
//$user = User::find(1);
//echo '<pre>';
//print_r($user);
//die();

//edit?id=2
//explode('?') //edit || id=2
//$_GET

//$users = User::where('id', '>', 10)
//    ->where('id', '<', 25)
//    ->where('name', 'like', '%a%')
//    ->get();
$users = User::all();
?>
<a href="create.php">Создать</a>
<table>
    <tr>
        <th>ID пользователя</th>
        <th>Имя пользователя</th>
        <th>Управление</th>
    </tr>
    <?php foreach ($users as $user) :    ?>
        <tr>
            <td><a href="show.php?id=<?= $user->id; ?>"><?=$user->id?></a></td>
            <td><a href="show.php?id=<?= $user->id; ?>"><?=$user->name?></a></td>
            <td>
                Posts: <?=count($user->posts) ?>
                <?php if (is_array($user->posts)) {
                    echo $user->posts[0]->title;
                }
                ?>
            </td>
            <td>
                <a href="edit.php?id=<?= $user->id; ?>">edit</a>
                <a href="delete.php?id=<?= $user->id; ?>">delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
