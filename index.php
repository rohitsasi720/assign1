<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Product CRUD</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Details
                            <a href="create.php" class="btn btn-primary float-end">Add Product</a>
                        </h4>
                    </div>
                    <div class="container my-4">
                        <select class="form-select" name="filter" id="filter">
                            <option selected>Tap to filter</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Shoe">Shoe</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Book">Book</option>
                        </select>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product id</th>
                                    <th>Brand name</th>
                                    <th>Product Category</th>
                                    <th>RUD Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM products";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $product)
                                        {
                                            ?>
                                <tr>
                                    <td><?= $product['id']; ?></td>
                                    <td><?= $product['name']; ?></td>
                                    <td><?= $product['category']; ?></td>
                                    <td>
                                        <a href="view.php?id=<?= $product['id']; ?>"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="edit.php?id=<?= $product['id']; ?>"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_product" value="<?=$product['id'];?>"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Products Found </h5>";
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#filter").on('change', function() {
            var value = $(this).val();
            //alert(value);
            $.ajax({
                url: "fetch.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend: function() {
                    $(".container").html("<span>Working...</span>");
                },
                success: function(data) {
                    $(".container").html(data);
                }
            })

        });
    });
    </script>

</body>

</html>