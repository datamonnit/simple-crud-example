<?php include "layout/head.inc.php" ?>
<?php include "layout/nav.inc.php" ?>    
    
    
    <h2>Register</h2>
    <form action="">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="form-control">
            <label for="password">Confirm password</label>
            <input type="password" name="confirm">
        </div>
        <div class="form-control">
            <input type="submit" name="password" value="Register">
        </div>
    </form>


<?php include "layout/footer.inc.php" ?>