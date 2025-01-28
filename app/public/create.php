<?php
require __DIR__ . '/../src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
    $stmt->execute(['name' => $name, 'description' => $description]);

    echo "データが作成されました！";
}
?>
<form method="POST">
    名前: <input type="text" name="name" required><br>
    説明: <textarea name="description" required></textarea><br>
    <button type="submit">作成</button>
</form>
