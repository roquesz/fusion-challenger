<?php
include_once('Classes/Connection.php');
include_once('Classes/Drivers.php');
$conn = new Connection();
$id = addslashes($_POST['id']);
try {
    $data = $conn->destroy($id);
    echo json_encode(['success' => true]);
} catch (\Exception $e) {
    echo json_encode(['errorMsg' => $e->getMessage()]);
}
