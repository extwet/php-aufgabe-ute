<?php 
include_once('inc/database_con.php');

/*Select wenn der Username schon vergeben ist dann...*/

$select = 'SELECT * FROM employee WHERE user_username="' .$_POST['username']. '"';

$result = $dbcon->query($select);

    if($result->num_rows > 0) {
        $arr[0] = false;
        $arr[1] = "Der Username ist schon vergeben";
        echo json_encode($arr);

    } else {
    /*Insert*/
        $insert = $dbcon->prepare('INSERT INTO employee(user_username, user_firstname, user_lastname, user_rights, user_photo, user_email, user_pwd) VALUES (?,?,?,?,?,?,?)');
        $insert->bind_param("sssssss", $username, $firstname, $lastname, $rights, $photo, $email, $pwd);

        $username = $_POST['username'];
        $firstname= $_POST['firstname'];
        $lastname =$_POST['lastname'];
        $rights = $_POST['rights'];
        /*$photo = $_POST['photo'];*/
        $photo = "test.jpg";
        $email = $_POST['email'];
        $pwd = md5($_POST['userpwd']);
        
        /*-----scho json brauch ich nicht wirklich */

        // if($insert->execute()) {
        //     $arr[0] = true;
        //     $arr[1] = "Der neue Mitarbeiter wurde erfolgreich angelegt";
        // } else {
        //     $arr[0] = false;
        //     $arr[1] = "Der Mitarbeiter konnte nicht angelegt werden";
        // }
        // echo json_encode($arr);


            $insert->close();
            

    }
$dbcon->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);


?>