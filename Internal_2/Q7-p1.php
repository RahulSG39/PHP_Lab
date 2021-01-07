<?php
    $conn = mysqli_connect("localhost", "root", "", "ajax_post");
    $First_Name = $_GET['q'];
    $sql = "select * from name where FirstName LIKE '$First_Name%'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo $row['FirstName'] . " " . $row['age'] . "<br>";
    }
    mysqli_close($conn);
?>