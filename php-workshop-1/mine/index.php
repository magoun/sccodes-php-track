<!DOCTYPE html>

<?php
    // Show all errors.
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    // Read data file.
    $data = file_get_contents('data.json');
    
    // Convert the string into a JSON object, then transform it to an array.
    $people = json_decode($data, true);
    
    // Deal with actions
    switch ($_GET) {
        case 'delete':
            $people = slice($people, $_GET['id'], 1);
            break;
        case 'edit':
            echo 'edit';
            break;
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP Workshop</title>
​
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
​
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
​
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
​
        <div class="page-header">
            <div class='pull-right control-group'>
                <form class="form-inline" action="" method="post">
                    <div class="form-group">
                        <label class="sr-only" for="first_name">First</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                    </div>
​
                    <div class="form-group">
                        <label class="sr-only" for="last_name">Last</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
​
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
​
            <h1>People</h1>
            <p class="lead">Tracking info!</p>
        </div>
​
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($people as $id => $person) {
                        echo
                        '<tr>
                            <th>' . ($id + 1) . '</th>
                            <th>' . $person['first_name'] . '</th>
                            <th>' . $person['last_name'] . '</th>
                            <th><a href="#"><button class="btn btn-info">Edit</button></a></th>
                            <th><a href="?action=delete&id=' . $id . '"><button class="btn btn-danger">Delete</button></a></th>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
        <?= var_dump($people) ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>