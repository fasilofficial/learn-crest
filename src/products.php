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
                    <div class="card-header d-flex justify-content-between align-items-center  ">
                        <h2>Products</h2>
                        <a href='./add_product.php' type='button' class='btn btn-primary'>Add</a>
                    </div>
                    <div class="card-body">

                        <?php

                        require_once(__DIR__ . '/crest.php');

                        $products = CRest::call('crm.product.list');

                        if (!empty($products['result'])) {
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Name</th>';
                            echo '<th>Price</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            usort($products['result'], function ($a, $b) {
                                return $b['ID'] - $a['ID'];
                            });


                            foreach ($products['result'] as $product) {
                                echo '<tr>';
                                echo '<td>' . $product['ID'] . '</td>';
                                echo '<td>' . $product['NAME'] . '</td>';
                                echo '<td>' . $product['PRICE'] . '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                            echo "<a href='./index.php' type='button' class='btn btn-secondary'>Back</a>";
                        } else {
                            echo '<p>No product found.</p>';
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