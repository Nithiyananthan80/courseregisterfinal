<?php
$connection = mysqli_connect("localhost", "root", "", "studentapplication");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $sql = "DELETE FROM student WHERE id = ?";
    
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
}

mysqli_close($connection);

header("Location: index.php"); 
?>