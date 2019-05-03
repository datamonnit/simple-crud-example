<header>
    <h1>List Demo</h1>
    <nav class="main-nav">
        <ul>
            <li>
                <a href="show_users.php">Users</a>
            </li>
            <li>
                <a href="lists.php">Lists</a>
            </li>
        </ul>
    </nav>
    <div class="logout">
        <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php">Log out <?php echo $_SESSION['username']; ?></a>  
        <?php else: ?>
            <a href="login.php">Login</a> | 
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>
</header>
    
<main class="container">