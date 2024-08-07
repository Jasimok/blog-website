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
else if ($action == 'selectById') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    $query = "SELECT * FROM `posts` WHERE id = $id";
    $result = $db->select($query);
    if ($result) {
        $post = $result->fetch_assoc();
        $res['post'] = $post;
    } else {
        $res['message'] = "Post Not Found!";
    }
} else if ( $action == 'category' ) {
    $query = "SELECT * FROM `category` ORDER BY id DESC";
    $results = $db->select($query);
    $userdata = [];
    if ($results) {
        while ($row = $results->fetch_assoc()) {
            array_push($userdata, $row);
        }
        $res['user_cat'] = $userdata;
    } else {
        $res['message'] = "No Data Found!";
    }
}else if ( $action == 'related' ) {
    $query = "SELECT * FROM `posts` ORDER BY id DESC LIMIT 3";
    $results = $db->select($query);
    $userdata = [];
    if ($results) {
        while ($row = $results->fetch_assoc()) {
            array_push($userdata, $row);
        }
        $res['user_rel'] = $userdata;
    } else {
        $res['message'] = "No Data Found!";
    }
} else if($action == 'login') {
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $fname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $fname = isset($_POST['email']) ? $_POST['email'] : '';
    $fname = isset($_POST['message']) ? $_POST['message'] : '';
    $query = 
} else {
    echo json_encode(['error' => 'Invalid action', 'action_received' => $action]);
}


echo json_encode($res);
?>
