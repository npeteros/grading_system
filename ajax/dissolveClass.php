<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include('../includes/mysqli_connect.php');
        $id = $_POST['id'];

        $query = "DELETE FROM classes WHERE classID = $id";
        if($r = mysqli_query($dbc, $query)) {
            if(mysqli_affected_rows($dbc) == 1) {
                echo "Class ID " . $id . " permanently dissolved.";
                $query = "DELETE FROM students WHERE studentClass = $id";
                mysqli_query($dbc, $query);
                $num_rows = mysqli_affected_rows($dbc);
            }
            else echo "Invalid class ID!";
        }

        mysqli_close($dbc);
    }
?>