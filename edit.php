<?php
session_start();
require 'dbcon.php';
require 'partials/header.php';
?>

<body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Edit
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $product_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM products WHERE id='$product_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $product = mysqli_fetch_array($query_run);
                                ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="id" value="<?= $product['id']; ?>">

                            <div class="mb-3">
                                <label>Product Brand name</label>
                                <input type="text" name="name" value="<?=$product['name'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Product Category</label>
                                <select class="form-select" name="category">
                                    <option selected>Select Category</option>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Shoe">Shoe</option>
                                    <option value="Electronic">Electronics</option>
                                    <option value="Book">Books</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_product" class="btn btn-primary">
                                    Update Product
                                </button>
                            </div>

                        </form>
                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'partials/footer.php';?>