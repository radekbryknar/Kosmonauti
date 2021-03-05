<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'kosmonautidb' );
    
       
    if(isset($_POST['savedata'])) 
    {
        $jmeno = $_POST['jmeno']; 
        $prijmeni = $_POST['prijmeni'];  
        $datum = date('Y-m-d', strtotime($_POST['datum']));  
        $super = $_POST['super'];   

        $query = "INSERT INTO kosmonauti (`jmeno` , `prijmeni` , `datum` ,`super`) VALUES ( '$jmeno' , '$prijmeni' , '$datum' , '$super' )";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
                echo '<script> alert("Data uložena); </script>';
                header('Location: index.php');
        }
        else
        {
                echo '<script> alert("Data nebyla uložena); </script>';
        }
    }   


?>