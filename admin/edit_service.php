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

<form method="POST">
  <input name="title" value="<?= htmlspecialchars($data['title']) ?>" required><br>
  <textarea name="description" required><?= htmlspecialchars($data['description']) ?></textarea><br>
  <button type="submit">Update</button>
</form>
