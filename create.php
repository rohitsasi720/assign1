<?php
session_start();
require 'partials/header.php';
?>


<body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Add
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Product brand name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div>
                                <select class="form-select" name="category">
                                    <option selected>Select Category</option>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Shoe">Shoe</option>
                                    <option value="Electronic">Electronics</option>
                                    <option value="Book">Books</option>
                                </select>
                            </div>
                            <div class="mb-3 my-4">
                                <button type="submit" name="save_product" class="btn btn-primary">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'partials/footer.php';?>