<?php
require 'dbcon.php';
require 'partials/header.php';
?>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Details
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
                                $product   = mysqli_fetch_array($query_run);
                                ?>

                        <div class="mb-3">
                            <label>Title</label>
                            <p class="form-control">
                                <?=$product['title'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Brand</label>
                            <p class="form-control">
                                <?=$product['name'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Category</label>
                            <p class="form-control">
                                <?=$product['category'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Price</label>
                            <p class="form-control">
                                <?=$product['price'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <p class="form-control">
                                <img src="<?= "upload/".$product['image']; ?>" width="175px"
                                    alt="<?= $product['title'];?>">
                            </p>
                        </div>

                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such product Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php require 'recommendation.php'; ?>
        <?php require 'related.php'; ?>
    </div>
    <?php require 'partials/footer.php';?>