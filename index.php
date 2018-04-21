<?php
/**
 * Created by PhpStorm.
 * User: mash
 * Date: 21/04/18
 * Time: 21:16
 */
if (isset($_GET["auth"])) {
    require ('functions/connection.php');
    $auth = $_GET["auth"];


    $sql = "";

    $output = sqlRequest($sql, $auth);
    if (json_encode($output) !== null){
        header('Content-Type: application/json');
    }
    echo $output;

}

?>
