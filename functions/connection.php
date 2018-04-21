<?php
/**
 * Created by PhpStorm.
 * User: mash
 * Date: 21/04/18
 * Time: 21:56
 */

// mysqli connection.

function mysqlDBConnect () {
    $configs = require('private/config.php');

    $username = $configs['username'];
    $password = $configs['password'];
    $servername = $configs['host'];
    $dbname = $configs['dbname'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function mysqlDBDisconnect ($conn) {
    $close = mysqli_close($conn);

    if($close){
        // echo 'Disconnected.';
    }else {
        echo 'Error while disconnecting.';
    }
}

// Requests.

function getArraySQL($sql){
    $conn = mysqlDBConnect();
    if(!$result = mysqli_query($conn, $sql)) die();

    $sqlArray = array();
    while($row =mysqli_fetch_assoc($result)) {
        $sqlArray[] = $row;
    }
    mysqlDBDisconnect($conn);
    return $sqlArray;
}

function sqlRequest ($sql, $auth){
    //TODO authcode.
    $outputArray = getArraySQL($sql);
    if (json_encode($outputArray)){
        echo json_encode($outputArray);
    } else {
        echo "Error: Check mysqli request encoding or array.";
    }
}