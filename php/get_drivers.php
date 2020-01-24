<?php
// include_once('../vendor/autoload.php');
// use php\Classes\Connection as Connection;
include_once('classes/Connection.php');
$con = new Connection();

$drivers = $con->query("SELECT * FROM drivers ORDER BY name");
$total = $drivers->num_rows;
$arrDrivers = [];
$arrDrivers['total'] = $total;
if($total > 0):
    foreach($drivers as $driver):
        $arrDrivers['rows'][] = [
                                    'id' => $driver['id'],
                                    'name' => $driver['name'],
                                    'cpf' => $driver['cpf'],
                                    'email' => $driver['email'],
                                    'situation' => $driver['situation'],
                                    'status' => $driver['status'] ? 'Active' : 'Inactive',
                                ];
    endforeach;
endif;

echo json_encode($arrDrivers);
