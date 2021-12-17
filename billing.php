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

        
        <script>
            function getLog(){
                var url = "api/get_log.php";                
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;

                
                var results = JSON.parse(text);
                console.log(results);
                var out = "";
                var counter = 0;
                for (var i=0; i < results.length; i++){
                    var calc = results[i];
                    console.log(calc);
                    var x = calc[1];
                    var y = calc[2];
                    var z = calc[3];
                    var zu = calc[5];
                    out += "X: " + x + " Y: " + y + " Result: " + z + " Date: " + zu + "<br>";
                    counter += 1;
                }
                document.getElementById("display").innerHTML = out;
                document.getElementById("amount").innerText = counter + " USD";
            }
        </script>

    </head>
    <body onload="getLog();">
        <h1>Your calculations: </h1>
        <div id="display"></div>
        <h2>Your cost: 
        <div id="amount"></div></h2>
    </body>
</html>