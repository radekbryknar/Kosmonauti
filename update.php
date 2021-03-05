<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'kosmonautidb' );
    
       
    if(isset($_POST['update'])) 
    {
        $id = $_POST['nove_id'];

        $jmeno = $_POST['jmeno']; 
        $prijmeni = $_POST['prijmeni'];  
        $datum = date('Y-m-d', strtotime($_POST['datum']));  
        $super = $_POST['super'];   

        $query = "UPDATE kosmonauti SET jmeno='$jmeno' , prijmeni='$prijmeni' , datum='$datum' , super='$super' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
                echo '<script> alert("Data upravena); </script>';
                header('Location: index.php');
        }
        else
        {
                echo '<script> alert("Data nebyla upravena); </script>';
        }
    }   


?>