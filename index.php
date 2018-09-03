<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos u tablicu  arhiva </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



    </head>
    <body>
                            <?php
                            // spajamo se na net
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                           // $dbname = "ss";
                            $dbname = "transfer";
                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                        ?>

                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                          <a class="navbar-brand" href="#">Menu</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                              <li class="nav-item active">
                                <a class="nav-link" href="#">Home / Naslovna<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="transfer.php">Adapter (db > Wp/post)</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="shop_index.php">Pregled Shop artikala</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="transfer_shop.php">Adapter Shop</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="DBFixChart.php">DB FIX</a>
                              </li>


                            </ul>
                          </div>
                        </nav>



  <div class="container">

    <!-- Jumbotron -->
        <div class="jumbotron">
          <h1>Pregled sadržaja koji ide u novu bazu</h1>
                                <?php
                                if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                                            echo'  <p><a class="btn btn-lg btn-danger" href="#" role="button">Nema konekcije</a></p>';
                                }

                                else {

                                        echo'  <p><a class="btn btn-lg btn-success" href="#" role="button">konekcija s serverom uspostavljena</a></p>';
                                        mysqli_set_charset($conn, 'utf8');
                                }?>

<!--
ALTER TABLE
   table_name
   CONVERT TO CHARACTER SET utf8mb4
   COLLATE utf8mb4_unicode_ci; -->
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>

        </div>



<?php
try {


echo '<table class="table">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>naziv</th>
<th>sadržaj</th>
<th>kategorija</th>
<th>tekst</th>
</tr></thead><tbody>';
$count = 0;
$postTitle = "select * from novosti order by ID ASC";
$resulTitle = $conn ->query($postTitle);

if($resulTitle ->num_rows > 0){
  while($row = $resulTitle -> fetch_assoc()){
$count+1;
//  echo''.$row["naziv"].' , '.$row["detaljnije"].'';
echo'
<tr>
<td scope="row">'.$row["id"].'</td>
<td> '.$row["naziv"].' </td>
<td> '.$row["detaljnije"].' </td>
<td> '.$row["kateg"].' </td>
<td> '.$row["tekst"].' </td>
</tr>';

  }
}


echo'
</tbody>
</table>';


  } catch (Exception $e) {
  echo 'Poruka '. $e -> getMessage();
  }
	mysqli_free_result($resulTitle);

        ?>


      </div>
    </body>
</html>
