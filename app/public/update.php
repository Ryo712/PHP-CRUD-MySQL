<?php
require __DIR__ . '/../src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);

    echo "データが更新されました！";
}
?>
<form method="POST">
    ID: <input type="number" name="id" required><br>
    名前: <input type="text" name="name" required><br>
    説明: <textarea name="description" required></textarea><br>
    <button type="submit">更新</button>
</form>
