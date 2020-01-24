<?php
include_once('Classes/Connection.php');
include_once('Classes/Drivers.php');
$conn = new Connection();
$id = addslashes($_POST['id']);
$name = addslashes($_POST['name']);
$cpf = addslashes($_POST['cpf']);
$email = addslashes($_POST['email']);
$situation = addslashes($_POST['situation']);
$status = intval($_POST['status']);
try {
    $dataDriver = [];
    $dataDriver['name'] = $name;
    $dataDriver['cpf'] = $cpf;
    $dataDriver['email'] = $email;
    $dataDriver['situation'] = $situation;
    $dataDriver['status'] = $status;
    $driver = new Driver($dataDriver);
    $data = $conn->update($id, $driver);
    echo json_encode($data);
} catch (\Exception $e) {
    echo json_encode(['errorMsg' => $e->getMessage()]);
}
