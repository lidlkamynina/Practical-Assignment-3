<?php
require_once '../includes/db.php';
require_once '../classes/Service.php';


$service = new Service($pdo);

if (isset($_GET['delete'])) {
  $service->delete($_GET['delete']);
  header("Location: dashboard.php");
}

$services = $service->readAll();
?>


<?php include '../layout/head.php'; ?>
<main class="min-h-screen bg-gray-100 dark:bg-gray-900 py-12">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
      <div>
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Service Dashboard</h1>
        <p class="text-gray-600 dark:text-gray-400">Manage all your services from here.</p>
      </div>
      <a href="add_service.php" class="inline-block mt-4 sm:mt-0 p-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
        + Add New Service
      </a>
    </div>

    <div class="relative overflow-x-auto shadow-md rounded-lg bg-white dark:bg-gray-800">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
          <tr>
            <th scope="col" class="px-6 py-4">Title</th>
            <th scope="col" class="px-6 py-4">Description</th>
            <th scope="col" class="px-6 py-4 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($services as $s): ?>
          <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($s['title']) ?></td>
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"><?= htmlspecialchars($s['description']) ?></td>
            <td class="px-6 py-4 text-center space-x-2">
              <a href="edit_service.php?id=<?= $s['id'] ?>" 
                class="inline-block px-4 py-2 bg-yellow-500 dark:bg-yellow-600 text-white rounded hover:bg-yellow-600 dark:hover:bg-yellow-700 transition">
                Edit
              </a>
              <a href="dashboard.php?delete=<?= $s['id'] ?>" 
                onclick="return confirm('Are you sure you want to delete this service?')"
                class="inline-block px-4 py-2 bg-red-500 dark:bg-red-600 text-white rounded hover:bg-red-600 dark:hover:bg-red-700 transition">
                Delete
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</main>
<!-- <h1>Service Dashboard</h1>
<a href="add_service.php">Add New Service</a>
<table border="1" cellpadding="10">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($services as $s): ?>
    <tr>
      <td><?= htmlspecialchars($s['title']) ?></td>
      <td><?= htmlspecialchars($s['description']) ?></td>
      <td>
        <a href="edit_service.php?id=<?= $s['id'] ?>">Edit</a> |
        <a href="dashboard.php?delete=<?= $s['id'] ?>" onclick="return confirm('Delete this service?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table> -->
<?php include '../layout/footer.php'; ?>