<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once 'navbar.php'; ?>

    <div class="container mt-5 ">
        <div class="row ">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h2>Add Product</h2>
                    </div>
                    <div class="card-body">

                        <form action="./add_product.php" method="post" class="mb-5">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input required type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input required type="number" name="price" id="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="currency_id">Currency</label>
                                <select class="form-control" id="currency_id" name="currency_id" required>
                                    <option value="INR">Indian Rupee (INR)</option>
                                    <option value="USD">US Dollar (USD)</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href='./index.php' type='button' class='btn btn-secondary'>Back</a>
                        </form>

                        <?php
                        require_once(__DIR__ . '/crest.php');

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $currency_id = $_POST['currency_id'];

                            $result = CRest::call(
                                'crm.product.add',
                                [
                                    'fields' => [
                                        'NAME' => $name,
                                        'PRICE' => $price,
                                        'CURRENCY_ID' => $currency_id
                                    ]
                                ]
                            );

                            if (!$result['error']) {
                                echo '<div class="alert alert-success mt-5" role="alert">';
                                echo 'Product added successfully';
                                echo '</div>';
                            } else {

                                echo '<div class="alert alert-warning" role="alert">';
                                echo 'Failed to add product';
                                echo '</div>';
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS (optional, for certain components) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>