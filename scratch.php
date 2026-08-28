<?php
$pdo = new PDO('mysql:host=localhost;dbname=ziibay_soft', 'root', '');
$stmt = $pdo->query('SHOW TABLES');
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    echo $row[0] . "\n";
}
