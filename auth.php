<?php
include("connection.php");

function authenticate() {
    global $conn;

    if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized!']);
        exit();
    }

    $token = trim(str_replace('Bearer', '', $_SERVER['HTTP_AUTHORIZATION']));

    $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Valid token
    } else {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Invalid or expired token!']);
        exit();
    }
}
?>
