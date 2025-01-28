<?php
require __DIR__ . '/../src/db.php';

// `$pdo` が正しくセットされているか確認
if (!isset($pdo)) {
    die("Error: データベース接続が確立されていません！");
}

try {
    // データ取得
    $stmt = $pdo->query("SELECT * FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("データ取得エラー: " . $e->getMessage());
}
?>

<h1>データ一覧</h1>
<ul>
<?php foreach ($items as $item): ?>
    <li>ID: <?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>, 
        名前: <?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>, 
        説明: <?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8'); ?>
    </li>
<?php endforeach; ?>
</ul>
