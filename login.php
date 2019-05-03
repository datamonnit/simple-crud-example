<?php 
session_start();

include "layout/layout_functions.php";
echo_header("Login");

if (isset($_GET['message'])) { $message = $_GET['message']; }

if (isset($_POST['login_button']))
{
    include "pdo-connection.php";

    $data = [
        'username' => $_POST['username']
    ];

    $sql = "SELECT password FROM users WHERE username = :username";
    $stmt= $pdo->prepare($sql);
    
    if ($stmt->execute($data)) {
        $result = $stmt->fetch();
        
        // Compare password hash 
        if (password_verify($_POST['password'], $result['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $message = "Register succesfull";    
            header('Location: show_users.php?message='.urlencode($message));
        } else {
            $message = "Invalid password";
        }
        
    } else {
        $message = "Register unsuccesfull!";
    }

}

?>

    <?php if (isset($message)): ?>
        <p class="error"><?php echo $message; ?></p>
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