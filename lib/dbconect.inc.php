<?php
 

function conectarse()
{
         $dbhost = 'localhost';
         $dbuser = 'root';
         $password = '1234';
         $db = 'sga_belgrano';
         $mysqli = new mysqli($dbhost, $dbuser, $password, $db);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         else{
            
            return $mysqli;
         }
}
