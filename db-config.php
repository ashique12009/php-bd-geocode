<?php

function getDbConnection()
{
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $dbname = "bd-division-district-upazila-union-lon-lat";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        createTables($conn);

        return $conn;
    } 
    catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}

function createTables($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS `divisions` (
        `id` int(11) NOT NULL,
        `name` varchar(32) NOT NULL,
        `bn_name` varchar(32) NOT NULL,
        `lon` decimal(10,7) NOT NULL,
        `lat` decimal(10,7) NOT NULL,
        `coordinate` varchar(128) NOT NULL,
        `code` varchar(128) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    }
    else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS `districts` (
        `id` int(11) NOT NULL,
        `division_id` int(11) NOT NULL,
        `name` varchar(32) NOT NULL,
        `bn_name` varchar(32) NOT NULL,
        `lon` decimal(10,7) NOT NULL,
        `lat` decimal(10,7) NOT NULL,
        `coordinate` varchar(128) NOT NULL,
        `code` varchar(128) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    }
    else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS `upazilas` (
        `id` int(11) NOT NULL,
        `district_id` int(11) NOT NULL,
        `name` varchar(32) NOT NULL,
        `bn_name` varchar(32) NOT NULL,
        `lon` decimal(10,7) NOT NULL,
        `lat` decimal(10,7) NOT NULL,
        `coordinate` varchar(128) NOT NULL,
        `code` varchar(128) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    }
    else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS `unions` (
        `id` int(11) NOT NULL,
        `upazila_id` int(11) NOT NULL,
        `name` varchar(32) NOT NULL,
        `bn_name` varchar(32) NOT NULL,
        `lon` decimal(10,7) NOT NULL,
        `lat` decimal(10,7) NOT NULL,
        `coordinate` varchar(128) NOT NULL,
        `code` varchar(128) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    if ($conn->query($sql) === TRUE) {
        //echo "Table created successfully";
    }
    else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
}