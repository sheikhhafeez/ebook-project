<?php
include "../../assets/includes/db.php";

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

if ($category_id === 0) {
    $sql = "SELECT ebooks.*, categories.category_name FROM ebooks
            JOIN categories ON ebooks.category_id = categories.category_id";
    $stmt = $mysqli->prepare($sql);
} else {
    $sql = "SELECT ebooks.*, categories.category_name FROM ebooks
            JOIN categories ON ebooks.category_id = categories.category_id
            WHERE ebooks.category_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $category_id);
}

$stmt->execute();
$result = $stmt->get_result();

$ebooks = [];
while ($row = $result->fetch_assoc()) {
    $ebooks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($ebooks);
?>
