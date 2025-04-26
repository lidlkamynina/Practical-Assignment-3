<?php
session_start();
require_once '../includes/db.php';
// session_start(); // Or if already inside head.php, fine!

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['login_success'] = "Welcome back, {$user['username']}!";

        setcookie('last_visit', date('Y-m-d H:i:s'), time() + 86400 * 30, "/");
        setcookie('username', $user['username'], time() + 86400 * 30, "/");

        header('Location: /Practical-Assignment-3/index.php');
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}

// 🧠 Only now, after all processing, you can start sending HTML

?>
<html>
<?php include '../layout/head.php'; ?>

<body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <main class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="w-full sm:w-96 md:w-1/2 lg:w-1/3 space-y-8 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg">

            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 pb-3">Sign in to Your Account</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Enter your credentials below
                </p>
            </div>

            <!-- Form -->
            <form action="login.php" method="POST" class="mt-6 space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="you@example.com" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="••••••••" />
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                        <span class="ml-2 text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                    <a href="/forgot-password.php" class="text-blue-600 hover:underline dark:text-blue-400">
                        Forgot your password?
                    </a>
                </div>

                <button
                    type="submit"
                    class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                Don't have an account?
                <a href="./register.php" class="text-blue-600 hover:underline dark:text-blue-400">Register here</a>
            </p>
        </div>
    </main>



    <?php include '../layout/footer.php'; ?>
</body>

</html>