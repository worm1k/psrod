<?php
/**
 * Indexation arrays
 */
require_once('database.php');
require_once('functions.php');
$indexes = array(
    'name' => getIndexForField('name'),
    'birth_date' => getIndexForField('birth_date'),
    'weight' => getIndexForField('weight'),
    'height' => getIndexForField('height'),
    'wage' => getIndexForField('wage'),
    'address' => getIndexForField('address'),
    'passport' => getIndexForField('passport'),
    'birth_place' => getIndexForField('birth_place'),
    'etc' => getIndexForField('etc')
);

session_start();
if (!isset($_SESSION['currentIndex'])) {
    $_SESSION['currentIndex'] = 2;
}
$currentIndex = $_SESSION['currentIndex'];

if (isset ($_GET['action'])) {
    if (isset($_GET['field'])) {
        $act = $_GET['action'];
        $field = $_GET['field'];
        if ($act == 'next') {
            nextInIndexArr($indexes[$field]);
        } elseif ($act == 'prev') {
            prevInIndexArr($indexes[$field]);
        } elseif ($act == 'first') {
            firstInIndexArr($indexes[$field]);
        } elseif ($act == 'last') {
            lastInIndexArr($indexes[$field]);
        }
    }
}


$pdo = Database::connect();
$sql = 'SELECT *
        FROM `employees`
        WHERE id='.$currentIndex;
foreach ($pdo->query($sql) as $row) {
    $employees[] = $row;
}
$row = $employees[0];
Database::disconnect();

echo 'current id: ' . $currentIndex;echo '<br/>';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h3>Author: Artem Bykov</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                    <a href="update.php?id=<?php echo $currentIndex; ?>" class="btn btn-warning">Update</a>
                    <a href="delete.php?id=<?php echo $currentIndex; ?>" class="btn btn-danger">Delete</a>
                </p>


                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <td><a href="index.php?action=first&field=name">First</a></td>
                        <td><a href="index.php?action=next&field=name">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=name">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=name">Last</a></td>
                    </tr>
                    <tr>
                        <th>Birth Date</th>
                        <td><a href="index.php?action=first&field=birth_date">First</a></td>
                        <td><a href="index.php?action=next&field=birth_date">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=birth_date">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=birth_date">Last</a></td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td><a href="index.php?action=first&field=weight">First</a></td>
                        <td><a href="index.php?action=next&field=weight">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=weight">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=weight">Last</a></td>
                    </tr>
                    <tr>
                        <th>Height</th>
                        <td><a href="index.php?action=first&field=height">First</a></td>
                        <td><a href="index.php?action=next&field=height">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=height">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=height">Last</a></td>
                    </tr>
                    <tr>
                        <th>Wage</th>
                        <td><a href="index.php?action=first&field=wage">First</a></td>
                        <td><a href="index.php?action=next&field=wage">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=wage">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=wage">Last</a></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><a href="index.php?action=first&field=address">First</a></td>
                        <td><a href="index.php?action=next&field=address">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=address">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=address">Last</a></td>
                    </tr>
                    <tr>
                        <th>Passport</th>
                        <td><a href="index.php?action=first&field=passport">First</a></td>
                        <td><a href="index.php?action=next&field=passport">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=passport">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=passport">Last</a></td>
                    </tr>
                    <tr>
                        <th>Birth Place</th>
                        <td><a href="index.php?action=first&field=birth_place">First</a></td>
                        <td><a href="index.php?action=next&field=birth_place">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=birth_place">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=birth_place">Last</a></td>
                    </tr>
                    <tr>
                        <th>Etc</th>
                        <td><a href="index.php?action=first&field=etc">First</a></td>
                        <td><a href="index.php?action=next&field=etc">Next &minus;&gt;</a></td>
                        <td><a href="index.php?action=prev&field=etc">&lt;&minus; Prev</a></td>
                        <td><a href="index.php?action=last&field=etc">Last</a></td>
                    </tr>
                </table>
                <hr/>

<!---------------------------------------------------------------------------------------------->

                <h4>Current:</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>Wage</th>
                        <th>Address</th>
                        <th>Passport</th>
                        <th>Birth Place</th>
                        <th>Etc</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['birth_date'] . '</td>';
                    echo '<td>' . $row['weight'] . '</td>';
                    echo '<td>' . $row['height'] . '</td>';
                    echo '<td>' . $row['wage'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['passport'] . '</td>';
                    echo '<td>' . $row['birth_place'] . '</td>';
                    echo '<td>' . $row['etc'] . '</td>';
                    echo '</tr>';
?>
                    </tbody>
                </table>

                    </tbody>
                </table>
            </div>
        </div> <!-- /container -->

    <footer class="panel-footer">
        <div class="container">
            <p><a href="https://github.com/worm1k/psrod">https://github.com/worm1k/psrod</a></p>
            <p><a href="https://github.com/worm1k/psrod">https://github.com/worm1k/psrod</a></p>
            <p><a href="https://github.com/worm1k/psrod">https://github.com/worm1k/psrod</a></p>
            <p><a href="https://github.com/worm1k/psrod">https://github.com/worm1k/psrod</a></p>
            <p><a href="https://github.com/worm1k/psrod">https://github.com/worm1k/psrod</a></p>
        </div>
    </footer>
    </body>
</html>