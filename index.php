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
        //add dbconnection

        include('dbconnect.php');

        //create query

        $query = "SELECT * FROM books";
        $result = mysqli_query($conn, $query);
    
    ?>

    <div class="container-fluid bg-white" style="padding-top:20px; padding-bottom:20px">
        <h3>PHP Mysql And Bootstrap Crud App</h1>
        <hr>

        <div class="row">
            <div class="col-sm-4">
                <h3>Insert Books Form</h3>

                <form role="form" action="insert.php" method="post">
                    <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" name="btitle" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Book Price</label>
                        <input type="text" name="bprice" class="form-control" required pattern="^(?:[1-9]\d*|0)?(?:\.\d+)?$">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">
                    Add Books
                    </button>
                </form>
            </div>
            <div class="col-sm-8">
                <h3>Display All Record Table</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Book Price</th>
                            <th>Crud Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                        
                        ?>

                        <tr>
                            <td><?php echo $row['book_title']; ?></td>
                            <td><?php echo $row['book_price']; ?></td>
                            <td>
                                <a href="editform.php?id=<?php echo $row['book_id'] ?>" class="btn btn-success" role="button">Edit Book</a>
                                <a href="delete.php?id=<?php echo $row['book_id'] ?>" class="btn btn-danger" role="button" onclick="return confirm('Are you sure???')">Delete Book</a>
                            </td>
                        </tr>

                        <?php
                            };

                            mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    

</body>
</html>