<?php

include 'db_connection.php';

// Get row that needs updating

$selectedUser = $_POST['selectedUser'];

$sql = "SELECT * FROM users WHERE name = '$selectedUser';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){

    while($row = mysqli_fetch_assoc($result)){

        if(empty($_POST['name'])){
            $name = $row['name'];
        } else {
            $name = $_POST['name'];
        }

        if(empty($_POST['age'])){
            $age = $row['age'];
        } else {
            $age = $_POST['age'];
        }

        if(empty($_POST['occupation'])){
            $occupation = $row['occupation'];
        } else {
            $occupation = $_POST['occupation'];
        }

        // update info
        $sql2 = "UPDATE users SET name='$name', age='$age', occupation='$occupation' WHERE name = '$selectedUser';";
        $result2 = mysqli_query($conn, $sql2);
        header("Location: http://localhost:8888/PhpFrontAndBack");
    }

} else {
    echo "There is no user with that name";
}

?>