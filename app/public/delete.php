<?php
require __DIR__ . '/../src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
    $stmt->execute(['id' => $id]);

    echo "データが削除されました！";
}
?>
<form method="POST">
    ID: <input type="number" name="id" required><br>
    <button type="submit">削除</button>
</form>
