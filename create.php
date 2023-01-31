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
                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" required name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Brand</label>
                                <input type="text" required name="name" class="form-control">
                            </div>
                            <div>
                                <select class="form-select my-4" required name="category">
                                    <option selected>Select Category</option>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Footwear">Footwear</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Book">Book</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" required id="price" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input class="form-control" accept="image/*" required type="file" id="image"
                                    name="image">
                            </div>
                            <div class="mb-3 my-4">
                                <button type="submit" name="save_product" class="btn btn-primary">Save
                                    Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'partials/footer.php';?>