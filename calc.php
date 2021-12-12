<?php
    session_start();
    echo ("Loged on user: ");
    echo($_SESSION["user"]);
    if (!isset($_SESSION["user"])){
        die("Need to LOGIN");
    }

?>

<html>
    <head>
        <meta charset="utf-8">

        <style>
            input {
                width: 140px;
                margin: 5px;
                text-align: center;
            }

            button {
                width: 63px;
                margin: 5px;
            }

            .pressed {
                background-color: pink;
            }
        </style>

        <script>
            function plus(){
                var x = document.getElementById("x").value;
                var y = document.getElementById("y").value;               

                var url = "api/plus.php?x=" + x + "&y=" + y;                
                var xhr = new XMLHttpRequest();
                xhr.open("GET", url, false);
                xhr.send();
                var z = xhr.responseText;

                document.getElementById("z").value = z;
                document.getElementById("btn1").className = "pressed";
                document.getElementById("btn2").className = "";                
            }
            function minus(){
                var x = document.getElementById("x").value;
                var y = document.getElementById("y").value;

                var url = "api/minus.php?x=" + x + "&y=" + y;
                var xhr = new XMLHttpRequest();
                xhr.open("GET", url, false);
                xhr.send();
                var z = xhr.responseText;

                document.getElementById("z").value = z;
                document.getElementById("btn1").className = "";
                document.getElementById("btn2").className = "pressed";
            }

        </script>

    </head>
    <body>
        <h1>CALC</h1>
        <input id="x"> <br>
        <input id="y"> <br> 
        <button id="btn1" onclick="plus();">+</button>
        <button id="btn2" onclick="minus();">-</button> <br>
        <input id="z">  
        <br><a href="index_.html">index</a>
    </body>
</html>