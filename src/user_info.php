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
                        <h2>User Information</h2>
                    </div>
                    <div class="card-body">
                        <?php

                        require_once(__DIR__ . '/crest.php');

                        $userInfo = CRest::call('user.current');

                        if (!empty($userInfo['result'])) {

                            echo "<div class='form-group'>";
                            echo "<label for='title'>Name</label>";
                            echo "<input required type='text' name='title' id='title' class='form-control disabled' disabled value='" . $userInfo['result']['NAME'] . "' >";
                            echo "</div>";

                            echo "<div class='form-group'>";
                            echo "<label for='title'>Last Name</label>";
                            echo "<input required type='text' name='title' id='title' class='form-control disabled' disabled value='" . $userInfo['result']['LAST_NAME'] . "' >";
                            echo "</div>";

                            echo "<div class='form-group'>";
                            echo "<label for='title'>Email</label>";
                            echo "<input required type='text' name='title' id='title' class='form-control disabled' disabled value='" . $userInfo['result']['EMAIL'] . "' >";
                            echo "</div>";

                            echo "<div class='form-group'>";
                            echo "<label for='title'>Date Registered</label>";
                            echo "<input required type='text' name='title' id='title' class='form-control disabled' disabled value='" . $userInfo['result']['DATE_REGISTER'] . "' >";
                            echo "</div>";

                            echo "<div class='form-group'>";
                            echo "<label for='title'>Last Login</label>";
                            echo "<input required type='text' name='title' id='title' class='form-control disabled' disabled value='" . $userInfo['result']['LAST_LOGIN'] . "' >";
                            echo "</div>";

                            echo "<a href='./index.php' type='button' class='btn btn-secondary'>Back</a>";

                        } else {
                            echo '<div class="alert alert-warning" role="alert">';
                            echo 'Error gettting user information';
                            echo '</div>';
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