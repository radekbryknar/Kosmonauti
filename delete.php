<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'kosmonautidb' );
    
       
    if(isset($_POST['delete'])) 
    {
        $id = $_POST['smazane_id'];

      
        $query = "DELETE FROM kosmonauti WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
                echo '<script> alert("Data smazána); </script>';
                header('Location: index.php');
        }
        else
        {
                echo '<script> alert("Data nebyla smazána); </script>';
        }
    }   


?>