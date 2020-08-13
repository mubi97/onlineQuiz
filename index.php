<!DOCTYPE html>
<html>

<head>
    <title>Online Quiz Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="public/custom.css" ></link>

</head>

<body>
    <div class="container">
        <div class="row">
        <div class="col-md-12 my-4">
            <h1 class="mx-auto">Online Quiz Portal</h1>
            <?php
                include_once('connect.php');
                $sql = "SELECT id, question FROM questions";
                $result = $conn->query($sql);
                
                if ($result->rowCount() > 0) {
                    echo "<table class='table table-hover'><tr><th scope='col'>ID</th><th scope='col'>Question</th><th scope='col'>Answer</th></tr><tbody>";
                    // output data of each row
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr class='questions'><td class='id'>".$row["id"]."</td><td>".$row["question"]."</td><td class='answerBox'></td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "0 Questions Found";
                }
            ?>
            <button id="submit-btn" type="button" class="btn btn-success">Submit</button>
        </div>
        
        
        </div>
    </div>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="public/custom.js"></script>
</body>

</html>