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
                        <h2>Add Post</h2>
                    </div>
                    <div class="card-body">

                        <form action="./add_post.php" method="post" class="mb-5">
                            <div class="form-group">
                                <label for="post_title">Post Title</label>
                                <input required type="text" name="post_title" id="post_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="post_message">Post Message</label>
                                <input required type="text" name="post_message" id="post_message" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href='./index.php' type='button' class='btn btn-secondary'>Back</a>
                        </form>

                        <?php
                        require_once(__DIR__ . '/crest.php');

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $post_title = $_POST['post_title'];
                            $post_message = $_POST['post_message'];

                            $result = CRest::call(
                                'log.blogpost.add',
                                [
                                    'POST_TITLE' => $post_title,
                                    'POST_MESSAGE' => $post_message,
                                ]
                            );

                            if (!$result['error']) {
                                echo '<div class="alert alert-success mt-5" role="alert">';
                                echo 'Post added successfully';
                                echo '</div>';
                            } else {

                                echo '<div class="alert alert-warning" role="alert">';
                                echo 'Failed to add post';
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