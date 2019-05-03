<?php 
session_start();

if (!isset($_SESSION['username'])) {
    $message = urlencode("Page requires login!");
    header('Location: login.php?message='.$message);
    die();
}



include "layout/layout_functions.php";
echo_header("Login");

include "pdo-connection.php";

$sql = "SELECT id, username, email, LEFT(password, 25) as pwd FROM users";
$stmt= $pdo->prepare($sql);
if ($stmt->execute()) {
    $result = $stmt->fetchAll();
} else {
    $message = "Query unsuccesfull!";
}
?>

    <?php if (isset($message)): ?>
        <p class="error"><?php echo $message; ?></p>
    <?php endif; ?>
    
    <h2>Showing all users</h2>
    <table class="myTable">
        <tr><td>ID</td><td>User</td><td>Email</td><td>Password</td></tr>
        <?php 
        foreach($result as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['pwd']}</td>
                </tr>";
        }
        ?>

    </table>
<?php echo_footer(); ?>