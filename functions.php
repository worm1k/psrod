<?php

/**
 * Indexation array generator
 *
 * @param $field
 * @return array
 */

function getIndexForField($field) {

    $pdo = Database::connect();

    $sql = 'SELECT `id` FROM `employees` ORDER BY `'.$field.'`';

    $index = null;
    foreach ($pdo->query($sql) as $row) {
        $index[] = $row['id'];
    }


    return $index;
    Database::disconnect();
}

function nextInIndexArr($indexArr) {

    $currentIndex = $_SESSION['currentIndex'];

    $tempIndex = array_search($currentIndex, $indexArr);

    $max = count($indexArr) - 1;
    if ($tempIndex == $max) {
       header("Location: http://wormik.co.nf/psrod/error.php");
    } else {
        ++$tempIndex;
        $_SESSION['currentIndex'] = $indexArr[$tempIndex];
        header("Location: http://wormik.co.nf/psrod");
    }
}
function prevInIndexArr($indexArr) {
    $currentIndex = $_SESSION['currentIndex'];

    $tempIndex = array_search($currentIndex, $indexArr);

    if ($tempIndex == 0) {
        header("Location: http://wormik.co.nf/psrod/error.php");
    } else {
        --$tempIndex;
        $_SESSION['currentIndex'] = $indexArr[$tempIndex];
        header("Location: http://wormik.co.nf/psrod");
    }
}

function firstInIndexArr($indexArr) {
    $_SESSION['currentIndex'] = $indexArr[0];
    header("Location: http://wormik.co.nf/psrod");
}

function lastInIndexArr($indexArr) {
    $_SESSION['currentIndex'] = $indexArr[count($indexArr) - 1];
    header("Location: http://wormik.co.nf/psrod");
}