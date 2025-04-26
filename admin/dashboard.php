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

<h1>Service Dashboard</h1>
<a href="add_service.php">Add New Service</a>
<table border="1" cellpadding="10">
  <tr><th>Title</th><th>Description</th><th>Actions</th></tr>
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
</table>
