<?php

include 'Database.php';
$db = new Database();

$action = '';
$res = array('error' => false);
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'select') {
    $query = "SELECT * FROM `posts`";
    $results = $db->select($query);
    $userdata = [];
    if ($results) {
        while ( $row = $results->fetch_assoc() ) {
            array_push($userdata,$row);
        }
        $res['user_data'] = $userdata;
    } else {
        $res['message']="No Data Found!";
    }
}
else {
    echo json_encode(['error' => 'Invalid action', 'action_received' => $action]);
}
echo json_encode($res);
?>
