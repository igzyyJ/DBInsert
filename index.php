<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos u tablicu Wordpress (WPPost) </title>

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



      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ig = $_POST["Id"];
       insert();
              echo' <script type="text/javascript">
                      $(document).ready(function(){
                          $("#myModal").modal("show");
                      });
                  </script>';
      }
        ?>


        <div class="container">


          <!-- Jumbotron -->
              <div class="jumbotron">
                <h1>transport sadržaja u Wordpress </h1>
                                      <?php
                                      if (!$conn) {
                                      die("Connection failed: " . mysqli_connect_error());
                                            echo'  <p><a class="btn btn-lg btn-danger" href="#" role="button">Nema konekcije</a></p>'; }

                                                else {
                                                    echo'  <p><a class="btn btn-lg btn-success" href="#" role="button">konekcija s serverom uspostavljena</a></p>';
                                                        mysqli_set_charset($conn, 'utf8');
                                                        }
                                    ?>

              </div>



      <?php

                function wp_strip_all_tags($string, $remove_breaks = false) {
                    $string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
                    $string = strip_tags($string);

                    if ( $remove_breaks )
                        $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
                    return trim($string);
                }


function insert(){
try{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "transfer";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $ig = 0;
                $postTitle = "select * from novosti";
                $resulTitle = $conn ->query($postTitle);

                                if($resulTitle ->num_rows > 0){
                                  while($row = $resulTitle -> fetch_assoc()){
                                    $titl = wp_strip_all_tags($row["naziv"]);
                                    $sadrzaj = wp_strip_all_tags($row["detaljnije"]);
                                    // $sadrzajString =  "'convert(cast(convert('".$row["detaljnije"]."' using latin1) as binary) using utf8)'";
                                    $sql = "INSERT INTO wp_posts (post_author, post_content, post_content_filtered, post_title, post_excerpt, post_status, ping_status, guid, post_type) VALUES (1, '$sadrzaj', '', '$titl', '', 'publish', '', 'http://localhost:800/transfer/?p=".$ig."', 'post')";
                                  //  $conn ->query($sql);
                                    $ig = $ig+1;
                                  //  echo '<h4>insertano , od = '.$ig.'</h4>';
                                    }
                                }

                    echo'              <div id="myModal" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">Uspješan unos</h4>
                                              </div>
                                              <div class="modal-body">
                                                        <p>unio si : '.$ig.'</p>

                                              </div>
                                          </div>
                                      </div>
                                  </div>';
                      }

 catch (Exception $e) {
 echo 'Poruka '. $e -> getMessage();
 }

}
        ?>



                  <div id="myModal2" class="modal fade">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title">Problem</h4>
                                   </div>
                                  <div class="modal-body">
                                             <p>Nisi unio broj Id-a</p>

                                   </div>
                               </div>
                            </div>
                        </div>







<div class="row">
    <div class="col-sm">
  <form action="index.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Unesi id od koje kreće unos u post (obično je 5)</label>
    <input type="text" name="Id" value="">
  </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Launch demo modal</button>
  </form>

</div>
</div>


      </div>
    </body>
</html>
