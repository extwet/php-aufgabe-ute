<?php include_once ("header.php");?>

 <main>
 <form method="post" action="addLoginUser.php" class="form_box">
            <h2>Neuen Mitarbeiter anlegen</h2>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="userpwd" placeholder="Password">
            <input type="text" name="firstname" placeholder="Vorname">
            <input type="text" name="lastname" placeholder="Nachname">
            <input type="text" name="rights" placeholder="Team">
            <input type="text" name="email" placeholder="email">

            <select name="rights">
                <option value="admin">Admin</option>
                <option value="leader">Teamleiter</option>
                <option value="user">Mitarbeiter</option>
            </select>
            <input type="submit" value="registrieren">   
    </form>

    <form id="delete_user" class="form_box">
        <select name="username">
            <?php 
                include_once('inc/database_con.php');
                $select = "SELECT user_username FROM employee";

                $result = $dbcon->query($select);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        echo '<option value="'.$row->user_username .'" >' .$row->user_username . '</option>';
                    }
                }
            
            ?>

        </select>
        <input type="submit" value="User löschen">
    </form>

</main>

 <?php include_once ("footer.php");?>
