<?php
    include_once('connect.php');
    $questionId = $_POST['questionId'];
    
    $sql = "SELECT id, answer, qid FROM answers where qid=".$questionId;
    $result = $conn->query($sql);
    $data =  array();
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($data, $row);
        }
        echo json_encode($data);
    } else {
        echo "0 Answers Found";
    }

?>