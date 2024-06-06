<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webhook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <?php

                        require_once(__DIR__ . '/crest.php');

                        $userInfo = CRest::call('user.current');

                        if ($userInfo['result']) {

                            echo "<h2>Welcome " . $userInfo['result']['NAME'] . " " . $userInfo['result']['LAST_NAME'] . "</h2>";
                        }
                        ?>

                    </div>
                    <div class="card-body">
                        <p class="">This is a custom PHP application to manage Bitrix24 data using REST API. This application uses the CREST PHP framework.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</body>

</html>