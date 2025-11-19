<?php
    include("connection.php");
    $query = "UPDATE tbl_hospital SET status='activate' WHERE id=$_GET[id]";
    mysqli_query($connection,$query);
    echo "<script>window.location.href='hospital.php'</script>";
?>