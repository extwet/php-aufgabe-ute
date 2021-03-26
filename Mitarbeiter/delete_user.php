<?php 
    include_once('inc/database_con.php');

    $delete = 'DELETE FROM user_list WHERE user_username="' . $_POST['username'].'"';

    if($dbcon->query($delete)) {
        $arr['msg'] = 'User wurde erfolgreich gelöscht!';
       
    } else {
        $arr['msg'] = 'User konnte nicht gelöscht!';
    }
    echo json_encode($arr);

    $dbcon->close();
?>