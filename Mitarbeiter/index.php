<?php include_once('header.php'); ?>


<main id= "wrap">

    <!--
        Wenn der User nicht angemeldet ist -> LOGIN 
        Wenn der User angemeldet ist -> Mitarbeiter anlegen addLoginUser


    -->

    <?php if(isset($_SESSION['username'])): ?>

        <?php 
            if($_SESSION['rights'] != 'user') : ?>

            <div id="addentryform">
                <form method="post" id="addForm">
                    <textarea name="text">Eintrag hinzufügen ... </textarea>
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                    <!-- <input type="hidden" name="noteId" value=""> -->
                   <input type="submit"  value="hinzufügen">
                </form>
            </div>

        <?php endif;
        ?>

        
    
    <?php else: ?>

        <form method="post" action="login.php" class="form_box">
            <h2>loggen Sie sich ein</h2>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="userpwd" placeholder="Password">
            <input type="submit" value="Bestätigen">   
        </form>

    <?php endif; ?>


</main>


<?php include_once('footer.php'); ?>