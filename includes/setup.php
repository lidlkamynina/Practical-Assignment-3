<?php include '../layout/head.php'; ?>
<body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<main class="flex-1 flex items-center justify-center px-4 py-12">

<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$port = 3306;

try {
    $dsn = "mysql:host=$host;port=$port;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS webdev_project CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

    $dsnDb = "mysql:host=$host;port=$port;dbname=webdev_project;charset=$charset";
    $pdo = new PDO($dsnDb, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS services (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            image VARCHAR(255)
        );

        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            image VARCHAR(255) DEFAULT NULL
        );

        CREATE TABLE messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            
        );

    ");

    echo "<p> Table <strong>messages</strong> created or already exists.</p>";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();

}
?>
</main>
</body>
  <?php include '../layout/footer.php'; ?>

