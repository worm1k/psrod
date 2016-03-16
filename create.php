<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        
         
        <style>
         
            .randus {
                display: inline-block;
                float:right;
                width: 400px;
                height: auto;
                background-color:red;
            }
            
        </style>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Create an Employee</h3>
                </div>
                
                
                <form class="form-horizontal" action="create.php" method="post"> 
                    <!-- name -->
                    <div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo!empty($name) ? $name : ''; ?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- birthDate -->
                    <div class="control-group <?php echo!empty($birthDateError) ? 'error' : ''; ?>">
                        <label class="control-label">Birth Date</label>
                        <div class="controls">
                            <input name="birth_date" type="date" placeholder="Birth Date" value="<?php echo!empty($birthDate) ? $birthDate : ''; ?>">
                            <?php if (!empty($birthDateError)): ?>
                                <span class="help-inline"><?php echo $birthDateError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- weight -->
                    <div class="control-group <?php echo!empty($weightError) ? 'error' : ''; ?>">
                        <label class="control-label">Weight</label>
                        <div class="controls">
                            <input name="weight" type="number"  placeholder="Weight" value="<?php echo!empty($weight) ? $weight : ''; ?>">
                            <?php if (!empty($weightError)): ?>
                                <span class="help-inline"><?php echo $weightError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- height -->
                    <div class="control-group <?php echo!empty($height) ? 'error' : ''; ?>">
                        <label class="control-label">Height</label>
                        <div class="controls">
                            <input name="height" type="number" placeholder="Height" value="<?php echo!empty($height) ? $height : ''; ?>">
                            <?php if (!empty($heightError)): ?>
                                <span class="help-inline"><?php echo $heightError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- wage -->
                    <div class="control-group <?php echo!empty($wageError) ? 'error' : ''; ?>">
                        <label class="control-label">Wage</label>
                        <div class="controls">
                            <input name="wage" type="number" placeholder="Wage" value="<?php echo!empty($wage) ? $wage : ''; ?>">
                            <?php if (!empty($wageError)): ?>
                                <span class="help-inline"><?php echo $wageError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- address -->
                    <div class="control-group <?php echo!empty($addressError) ? 'error' : ''; ?>">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input name="address" type="text" placeholder="Address" value="<?php echo!empty($address) ? $address : ''; ?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- passport -->
                    <div class="control-group <?php echo!empty($passportError) ? 'error' : ''; ?>">
                        <label class="control-label">Passport</label>
                        <div class="controls">
                            <input name="passport" type="text" placeholder="Passport" value="<?php echo!empty($passport) ? $passport : ''; ?>">
                            <?php if (!empty($passportError)): ?>
                                <span class="help-inline"><?php echo $passportError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- birthPlace -->
                    <div class="control-group <?php echo!empty($birthPlaceError) ? 'error' : ''; ?>">
                        <label class="control-label">Birth Place</label>
                        <div class="controls">
                            <input name="birth_place" type="text" placeholder="Birth Place" value="<?php echo!empty($birthPlace) ? $birthPlace : ''; ?>">
                            <?php if (!empty($birthPlaceError)): ?>
                                <span class="help-inline"><?php echo $birthPlaceError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- etc -->
                    <div class="control-group <?php echo!empty($etcError) ? 'error' : ''; ?>">
                        <label class="control-label">Etc.</label>
                        <div class="controls">
                            <input name="etc" type="text" placeholder="Etc." value="<?php echo!empty($etc) ? $etc : ''; ?>">
                            <?php if (!empty($etcError)): ?>
                                <span class="help-inline"><?php echo $etcError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a class="btn" href="index.php">Back</a>
                    </div>
                </form>
            </div>

        </div> <!-- /container -->
        <div class="randus">
            
        </div>
    </body>
</html>

<?php
require_once('database.php');

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $birthDateError = null;
    $weightError = null;
    $heightError = null;
    $wageError = null;
    $addressError = null;
    $passportError = null;
    $birthPlaceError = null;
    $etcError = null;

    // keep track post values
    $name = $_POST['name'];
    $birthDate = $_POST['birth_date'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $wage = $_POST['wage'];
    $address = $_POST['address'];
    $passport = $_POST['passport'];
    $birthPlace = $_POST['birth_place'];
    $etc = $_POST['etc'];

    // validate input
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    } /*else if (!preg_match('/([А-Я]){2}-[0-9]{6}/', $name)) {
        $nameError = 'Please, ';
        $valid = false;
    }*/

    // insert data
    if ($valid) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO `employees`(name, birth_date, weight, height,
                wage, address, passport, birth_place, etc)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            $name,
            $birthDate,
            $weight,
            $height,
            $wage,
            $address,
            $passport,
            $birthPlace,
            $etc,
        ));
        Database::disconnect();
    }
}
?>