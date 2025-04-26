<?php
require_once '../includes/db.php';
require_once '../classes/Service.php';

$service = new Service($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $img = $_POST['image']; // Or handle file upload

    if ($service->create($title, $desc, $img)) {
        echo "Service added!";
    }
}
?>

<form method="POST">
  <input name="title" placeholder="Title" required><br>
  <textarea name="description" placeholder="Description" required></textarea><br>
  <input name="image" placeholder="Image URL"><br>
  <button type="submit">Add Service</button>
</form>
