<?php
    //connect database
    include ('dbconnect.php');
    $bid = $_GET['id'];
    //create query

    $query = "DELETE FROM books WHERE book_id='$bid'";

    if(mysqli_query($conn, $query)){
        // echo "Record Delete Successfully";
        // redirect your page from delete.php to index.php
        header("Location:index.php");
    } else{
        echo "Error in Your query" . mysqli_error($conn);
    };

    mysqli_close($conn);
?>