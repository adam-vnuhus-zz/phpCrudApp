<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <title>Crud App</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        // echo $id;

        //dbconnect.php

        include('dbconnect.php');
        //create query
        $query = "SELECT * FROM books WHERE book_id='$id'";
        $result = mysqli_query($conn, $query);

        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo $row['book_title'];
        //     echo "<br>";
        //     echo $row['book_price'];
        // }
    ?>

    <div class="container bg-primary" style="padding-top:20px; padding-bottom:20px">
        <h3>Edit Book Form</h3>
        <form role="form" action="edit.php" method="get">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    
                
            ?>
            <input type="hidden" name="bookid" value="<?php echo $row['book_id'];?>">
            <div class="form-group">
                <label>Book Title</label>
                <input type="text" name="btitle" class="form-control" value="<?php echo $row['book_title'];?>">
            </div>
            <div class="form-group">
                <label>Book Price</label>
                <input type="text" name="bprice" class="form-control" value="<?php echo $row['book_price'];?>" required pattern="^(?:[1-9]\d*|0)?(?:\.\d+)?$">
            </div>
            <button type="submit" class="btn bn-success btn-block">Edit Book</button>
            <?php 
                };
                // mysqli_query($conn);
            ?>
        </form>
    </div>

    
</body>
</html>