<?php
require_once '../includes/db.php';
require_once '../classes/Service.php';


$service = new Service($pdo);
$id = $_GET['id'] ?? null;

if (!$id) {
    die('Service ID is required.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    if ($service->update($id, $title, $desc)) {
        echo "Service updated!";
    }
}

$current = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$current->execute([$id]);
$data = $current->fetch();
?>

<?php include '../layout/head.php'; ?>

<main class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">

    <div class="max-w-lg w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-8">Edit Service</h1>

        <form method="POST" class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= htmlspecialchars($data['title']) ?>"
                    required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"><?= htmlspecialchars($data['description']) ?></textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="dashboard.php" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">← Back to Dashboard</a>
                <button
                    type="submit"
                    class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Update Service
                </button>
            </div>
        </form>

    </div>

</main>

<?php include '../layout/footer.php'; ?>