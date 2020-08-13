<?php
    include_once('connect.php');
    $data = $_POST['data'];
    $score = 0;
    foreach ($data as $value) {
        $questionId = $value['questionId'];
        $answerId = $value['answerId'];
        $sql = "SELECT correct FROM answers where id=".$answerId;
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                if($row['correct'] == 1) {
                    $score++;
                }
                // die(json_encode($row['correct']));
            }
        }
    }   
    echo $score;
?>