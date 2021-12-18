<?php
    session_start();    
    include ('/var/www/html/params.php');
    echo ("Loged on user: ");
    echo($_SESSION["user"]);    
    if (!isset($_SESSION["user"])){
        echo('<meta http-equiv="refresh" content="2; URL=../login.php">');
        die("Need to LOGIN");        
    }
    $user = $_SESSION["user"];
           
        $sql = "SELECT ID, Number1, Number2, Result
                FROM log
                WHERE UserID = '$user'     
        ";

        $conn = mysqli_connect("$DB_URL","$DB_USER","$DB_PWD","$DB_NAME");            
        $statement = mysqli_prepare($conn, $sql);           
        $cursor = mysqli_stmt_execute($statement);
        echo(mysqli_error($conn));
        $cursor = mysqli_stmt_get_result($statement);


        $result = mysqli_fetch_all($cursor);
        echo(mysqli_error($conn));
        // var_dump($result);
        mysqli_close($conn);
        echo(json_encode($result));
