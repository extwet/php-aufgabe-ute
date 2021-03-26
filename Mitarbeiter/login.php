<?php include_once('header.php'); ?>


<main>

    <?php
        include_once('inc/database_con.php');

        // $select = "SELECT user_username, user_color, user_rights, user_photo FROM user_list WHERE 
                   // user_pwd='". md5($_POST['userpwd'])."' AND user_username='". $_POST['username']."'";

        // PREPARED STATEMENTS 

        //prepare statement
        $select = $dbcon->prepare("SELECT * FROM employee WHERE 
        user_username = ?");
        //bind paramater
        $select->bind_param("s", $username);

        //set paramater
        $username= $_POST['username'];

        //execute
        $select->execute();
        $result = $select->get_result();
        
        if($result->num_rows > 0) {
            //user einloggen
            while($row = $result->fetch_assoc()) {
                $_SESSION['username'] = $row['user_username'];
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['rights'] = $row['user_rights'];

                if($row['user_photo'])
                    $_SESSION['photo'] = $row['user_photo'];

            }
            ?>
            <h2>Du bist als <?php echo $_SESSION['username']; ?> eingeloggt.
                <a href="usermanagement.php">Neuen Mitarbeiter anlegen</a> </h2>
            <?php
        }
        else {
            echo '<h3>Password or Username is not correct. </h3>';
        }
        $select->close();
        $dbcon->close();
    ?>
    



</main>


<?php include_once('footer.php'); ?>