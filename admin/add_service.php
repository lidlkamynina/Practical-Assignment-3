<?php
require_once '../includes/db.php';
require_once '../classes/Service.php';

$service = new Service($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $img = $_POST['image']; // Or handle file upload

  if ($service->create($title, $desc, $img)) {
    $message = "Service created successfully!";
    $messageType = 'success';
  } else {
    $message = "Failed to created service.";
    $messageType = 'error';
  }
}
?>

<?php include '../layout/head.php'; ?>

<main class="min-h-screen flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">

  <?php if (!empty($message)): ?>
    <div class="flex justify-center items-center h-screen">
      <div class="fixed left-1/2 transform -translate-x-1/2 z-50" style="top: 100px;">
        <div class="message bg-green-100 <?= $messageType === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?> text-xl p-4 rounded-lg text-center w-auto px-8 shadow-lg">
          <?= $message ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="max-w-lg w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
    <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-8">Add New Service</h1>

    <form method="POST" class="space-y-6">
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
        <input
          type="text"
          id="title"
          name="title"
          placeholder="Enter service title"
          required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
        <textarea
          id="description"
          name="description"
          rows="4"
          placeholder="Enter service description"
          required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
      </div>

      <div>
        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image URL (optional)</label>
        <input
          type="text"
          id="image"
          name="image"
          placeholder="Paste image URL"
          class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div class="flex justify-between items-center">
        <a href="dashboard.php" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">← Back to Dashboard</a>
        <button
          type="submit"
          class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
          Add Service
        </button>
      </div>
    </form>

  </div>

</main>

<?php include '../layout/footer.php'; ?>