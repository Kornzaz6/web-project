<?php
require_once 'function.php';

if (isset($_POST['search_submit'])) {
    $search_term = '%' . $_POST['search_submit'] . '%'; // Add wildcards for partial matches

    $sql = "SELECT user_id, fullname, username FROM parkinglot WHERE user_id LIKE :search_term OR fullname LIKE :search_term OR username LIKE :search_term";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':search_term', $search_term, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetchAll();

    // Rest of your code

?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    <title>Detail</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-5 mx-auto">
                <div class="card shadow text-center">
                    <div class="card-header">
                        <h1><?php echo $row['fullname'];?></h1>
                    </div>
                    <div class="card-body">
                        <h3>User ID<?php echo $row['user_id'];?></h3>
                        <h3>Username<?php echo $row['username'];?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else {
        header('location: history_admin.php');
        exit();
    }
    ?>
</body>
</html>