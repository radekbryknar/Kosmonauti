<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosmonauti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

</head>

<body>




<!-- Modal -->
<div class="modal fade" id="addpopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Další kosmonaut!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

         <form action="add.php" method="POST">
             <div class="modal-body">
         
                <div class="mb-3">
                    <label for="jmenoid" class="form-label">Jméno</label>
                    <input type="text" name="jmeno" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="prijmeniid" class="form-label">Příjmení</label>
                    <input type="text" name="prijmeni" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="dateid" class="form-label">Datum narození</label>
                    <input type="date" name="datum" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="superid" class="form-label">Superschopnost</label>
                        <select class="form-select" name="super" aria-label="Default select example">
                        <option value="Geniální matematik">Geniální matematik</option>
                        <option value="Super manažer">Super manažer</option>
                        <option value="Extra odolnost vůči stresu">Extra odolnost vůči stresu</option>
                    </select>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít</button>
                    <button type="sumbit" name="savedata" class="btn btn-primary">Uložit</button>
                </div>
         </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Modal-Upravit -->
<div class="modal fade" id="modalupravit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Úprava kosmonauta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

         <form action="update.php" method="POST">
             <div class="modal-body">

                <input type="hidden" name="nove_id" id="nove_id">

                <div class="mb-3">
                    <label for="jmenoid" class="form-label">Jméno</label>
                    <input type="text" name="jmeno" id="jmeno" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="prijmeniid" class="form-label">Příjmení</label>
                    <input type="text" name="prijmeni" id="prijmeni" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="dateid" class="form-label">Datum narození</label>
                    <input type="text" name="datum" id="datum" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="superid" class="form-label">Superschopnost</label>
                        <select class="form-select" name="super" aria-label="Default select example">                   
                            <option value="Geniální matematik">Geniální matematik</option>
                            <option value="Super manažer">Super manažer</option>
                            <option value="Extra odolnost vůči stresu">Extra odolnost vůči stresu</option>
                        </select>
                </div>

               </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít</button>
                    <button type="sumbit" name="update" class="btn btn-primary">Upravit kosmonauta</button>
                </div>
         </form>
    </div>
  </div>
</div>
<!-- End Modal-Upravit -->

<!-- Modal-Smazat -->
<div class="modal fade" id="modalsmazat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Smazání kosmonauta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

         <form action="delete.php" method="POST">
             <div class="modal-body">

                <input type="hidden" name="smazane_id" id="smazane_id">

                <h4>Opravdu chcete smazat kosmonauta?</h4>

               </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nechci</button>
                    <button type="sumbit" name="delete" class="btn btn-primary">Ano</button>
                </div>
         </form>
    </div>
  </div>
</div>
<!-- End Modal-Smazat -->


    <div class="container">
        <div class="jumbotron">
            <h2> Evidence kosmonautů </h2>
            
        </div>
                                         
        <div class="card">
            <div class="card-body">
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpopup">
                    Přidat kosmonauta
                </button>
            </div>
            <!-- Tabulka -->
            <div class="card">
                <div class="card-body">

                <?php
                 $connection = mysqli_connect("localhost", "root", "");
                 $db = mysqli_select_db($connection, 'kosmonautidb' );

                 $query = "SELECT * FROM kosmonauti";
                 $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th style="display:none;" scope="col"> ID </th>
                            <th scope="col">Jméno</th>
                            <th scope="col">Příjmení</th>
                            <th scope="col">Datum narození</th>
                            <th scope="col">Superschopnost</th>
                            <th scope="col">Akce</th>
                        </tr>
                    </thead>

                    <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                            {
                    ?>

                    <tbody>
                        <tr>
                            <td style="display:none;"> <?php echo $row['id']?> </td>
                            <td> <?php echo $row['jmeno']?> </td>
                            <td> <?php echo $row['prijmeni']?> </td>
                            <td> <?php echo $row['datum']?> </td>
                            <td> <?php echo $row['super']?> </td>
                            <td> 
                                 <button type="button" class="btn btn-outline-warning editbtn">Upravit</button>
                                 <button type="button" class="btn btn-outline-danger deletebtn">Smazat</button>
                                
                            </td>
                            
                        </tr>                   
                    </tbody>

               <?php 
                    }
                 }
                 else{
                    echo "Nebyl nalezen žádný záznam";
                 }
                ?>

                </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> 

<!-- Delete script -->
<script>

$(document).ready(function() {
    $('.deletebtn').on('click', function() {

       $('#modalsmazat').modal('show');  

       $tr = $(this).closest('tr');

       var data = $tr.children("td").map(function() {
           return $(this).text();
       }).get();

       console.log(data);

       $('#smazane_id').val(data[0]);
    

    });
});

</script>

<!-- Edit script -->
<script>

$(document).ready(function() {
    $('.editbtn').on('click', function() {

       $('#modalupravit').modal('show');  

       $tr = $(this).closest('tr');

       var data = $tr.children("td").map(function() {
           return $(this).text();
       }).get();

       console.log(data);

       $('#nove_id').val(data[0]);
       $('#jmeno').val(data[1]);  
       $('#prijmeni').val(data[2]);  
       $('#datum').val(data[3]);  
       $('#superid').val(data[4]);     

    });
});

</script>

</body>
</html>