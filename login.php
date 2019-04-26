<?php 
session_start();

include "layout/layout_functions.php";
echo_header("Login");

if (isset($_POST['login_button']))
{
    include "pdo-connection.php";

    $data = [
        'username' => $username,
        'password' => $password,
        'email' => $email
    ];

    $sql = "INSERT INTO users (username, users.password, email) VALUES (:username, :password, :email)";
    $stmt= $pdo->prepare($sql);
    if ($stmt->execute($data)) {
        $message = "Register succesfull";
        $_SESSION['user_data'] = $data;
    } else {
        $message = "Register unsuccesfull!";
    }

}



?>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <h2>Login</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="form-control">
            <input type="submit" name="login_button" value="Login">
        </div>
    </form>


<?php echo_footer(); ?>