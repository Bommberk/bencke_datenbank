<?php

    

include("../Medoo.php");
    
    
         
// Using Medoo namespace.

use Medoo\Medoo;
 
$database = new Medoo([
    // [required]
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 's5418_bencke',
    'username' => 's5418_bencke',
    'password' => '7sp4qM#86',
 
    // [optional]
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'port' => 3306,
 
    // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
    'prefix' => '',
 
    // [optional] To enable logging. It is disabled by default for better performance.
    'logging' => true,
 
    // [optional]
    // Error mode
    // Error handling strategies when the error is occurred.
    // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
    // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
    'error' => PDO::ERRMODE_SILENT,
 
    // [optional]
    // The driver_option for connection.
    // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ],
 
    // [optional] Medoo will execute those commands after the database is connected.
    'command' => [
        'SET SQL_MODE=ANSI_QUOTES'
    ]
]);

    if(isset($_POST["email"]) && $_POST["email"] != "" && isset($_POST["password"]) && $_POST["password"] != ""){
    $data = $database->select("admin",[
        "email",
        "password",
    ],["email" => $_POST["email"],"password" => $_POST["password"]]);

    $zähler = count($data);

    if($zähler == 1){
        header("location: ?page=add");
    }
}

if(isset($_GET["page"]) && $_GET["page"] == "add"){
    include("add.php");
}else{
    include("admin.html");
}

?>