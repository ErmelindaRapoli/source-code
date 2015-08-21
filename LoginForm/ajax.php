<?php
$username = $_POST['username'];
$password = $_POST['password'];
$response = array(
    'status' => 0,
    'message' => ''
);

// Check username
if($username != 'admin'){
    $response = array(
        'status' => 1,
        'message' => 'Invalid Username'
    );
    echo json_encode($response);
}

// Check password
else if($password != 'admin'){
    $response = array(
        'status' => 2,
        'message' => 'Invalid Password'
    );
    echo json_encode($response);
}

// correct
else if($password == 'admin' && $username == 'admin'){
    $response = array(
        'status' => 3,
        'message' => 'Success'
    );
    sleep(1);
    echo json_encode($response);
}
?>