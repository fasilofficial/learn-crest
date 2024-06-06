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
                        <h2>Add Lead</h2>
                    </div>
                    <div class="card-body">

                        <form action="./add_lead.php" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input required type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input required type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input required type="text" name="last_name" id="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required type="email" name="email" id="email" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="./index.php" type="button" class="btn btn-secondary">Back</a>
                        </form>

                        <?php
                        require_once(__DIR__ . '/crest.php');

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $title = $_POST['title'];
                            $name = $_POST['name'];
                            $last_name = $_POST['last_name'];
                            $email = $_POST['email'];
                            $email_type = $_POST['email_type'];
                            $phone = $_POST['phone'];
                            $phone_type = $_POST['phone_type'];


                            $result = CRest::call(
                                'crm.lead.add',
                                [
                                    'fields' => [
                                        'TITLE' => $title,
                                        'NAME' => $name,
                                        'LAST_NAME' => $last_name,
                                        'EMAIL' => [
                                            '0' => ['VALUE' => $email,],
                                        ],
                                    ],
                                ]
                            );

                            if (!$result['error']) {
                                echo '<div class="alert alert-success mt-5" role="alert">';
                                echo 'Lead added successfully.';
                                echo '</div>';
                            } else {
                                echo '<div class="alert alert-warning" role="alert">';
                                echo 'Failed to add lead';
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