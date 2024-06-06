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
                        <h2>Leads</h2>
                    </div>
                    <div class="card-body">

                        <?php

                        require_once(__DIR__ . '/crest.php');

                        $leads = CRest::call('crm.lead.list');

                        if (!empty($leads['result'])) {
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Title</th>';
                            echo '<th>Name</th>';
                            echo '<th>Last Name</th>';
                            echo '<th>Has Email</th>';
                            echo '<th>Has Phone</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            usort($leads['result'], function ($a, $b) {
                                return $b['ID'] - $a['ID'];
                            });

                            // Loop through each lead and output data into table rows
                            foreach ($leads['result'] as $lead) {
                                echo '<tr>';
                                echo '<td>' . $lead['ID'] . '</td>';
                                echo '<td>' . $lead['TITLE'] . '</td>';
                                echo '<td>' . $lead['NAME'] . '</td>';
                                echo '<td>' . $lead['LAST_NAME'] . '</td>';


                                echo '<td>' . ($lead['HAS_EMAIL'] == "Y" ? 'True' : 'False') . '</td>';

                                echo '<td>' . ($lead['HAS_PHONE'] == "Y" ? 'True' : 'False') . '</td>';

                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<p>No leads found.</p>';
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