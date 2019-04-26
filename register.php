<?php 
include "layout/layout_functions.php";
echo_header("Register");


if (isset($_POST['register_button']))
{
    include "pdo-connection.php";

    $data = [
        'username' => $_POST['username'],
        'passwd' => $_POST['password'],
        'email' => $_POST['email']
    ];

    $sql = "INSERT INTO users (users.username, users.password, users.email) VALUES (:username, :passwd, :email)";
    $stmt= $pdo->prepare($sql);
    if ($stmt->execute($data)) {
        $_SESSION['user_data'] = $data;
        header('Location: index.php');
    } else {
        $message = "Register unsuccesfull!";
    }

}


?>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <h2>Register</h2>
    <form action="" method="post">
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
            <label for="password">Email</label>
            <input type="password" name="email">
        </div>
        <div class="form-control">
            <input type="submit" name="register_button" value="Register">
        </div>
    </form>


<?php echo_footer(); ?>