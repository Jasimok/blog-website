<?php

include 'Database.php';
$db = new Database();

$action = '';
$res = array('error' => false);
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'select') {
   
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 3;
    $offset = ($page - 1) * $limit;

    $totalQuery = "SELECT COUNT(*) as total FROM `posts`";
    $totalResult = $db->select($totalQuery);
    $totalPosts = $totalResult->fetch_assoc()['total'];

    $query = "SELECT * FROM `posts` ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $results = $db->select($query);
    $userdata = [];
    if ($results) {
        while ($row = $results->fetch_assoc()) {
            array_push($userdata, $row);
        }
        $res['user_data'] = $userdata;
        $res['total_posts'] = $totalPosts;
    } else {
        $res['message'] = "No Data Found!";
    }

}
else {
    echo json_encode(['error' => 'Invalid action', 'action_received' => $action]);
}
echo json_encode($res);
?>
