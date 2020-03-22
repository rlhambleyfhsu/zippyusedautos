<?php
    $dsn = 'mysql://q5c7nbr8qv0d8mw0:h94jjqr3b7h4tjeb@b4e9xxkxnpu2v96i.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=zk5jev0np46bj9r6';
    $username = 'q5c7nbr8qv0d8mw0';
    $password = 'h94jjqr3b7h4tjeb';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/database_error.php');
        exit();
    }
?>
