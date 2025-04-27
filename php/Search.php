<?php
require_once 'function.php';

if (isset($_POST['query'])) {
    $inputText = '%' . $_POST['query'] . '%';  // Add wildcards here
    $sql = "SELECT user_id, fullname, username FROM parkinglot  WHERE user_id LIKE :user_id OR fullname LIKE :fullname OR username LIKE :username";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'user_id' => $inputText,
        'fullname' => $inputText,
        'username' => $inputText
    ]);
    $result = $stmt->fetchAll();

    if ($result) {
        foreach ($result as $row) {
            echo '<a class="list-group-item list-group-item-action border-1">' . $row['fullname'] . '</a>';
        }
    } else {
        echo '<p class="list-group-item border-1">No record.</p>';
    }
}

?>