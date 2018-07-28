<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.  https://www.theurbanpenguin.com/adding-data-to-mysql-with-php-and-web-forms/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos u tablicu  arhiva </title>
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

     if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

  else {
        echo("<h5>konekcija s serverom uspostavljena</h5>");
    }







    function wp_insert_post( $postarr, $wp_error = false ) {
    global $wpdb;
    $user_id = 1;
    $defaults = array(
        'post_author' => $user_id,
        'post_content' => '',
        'post_content_filtered' => '',
        'post_title' => '',
        'post_excerpt' => '',
        'post_status' => 'draft',
        'post_type' => 'post',
        'comment_status' => '',
        'ping_status' => '',
        'post_password' => '',
        'to_ping' =>  '',
        'pinged' => '',
        'post_parent' => 0,
        'menu_order' => 0,
        'guid' => '',
        'import_id' => 0,
        'context' => '',
    );
  }

    //for($i = 1007; $i <= 1387; $i++)
    //{

      // $sql = "insert into wp_term_relationships (object_id) values ('$i');";




       //$sql = "insert into wp_term_relationships (term_taxonomy_id, object_id) values (43, '$i');";

      // $sql = "insert into wp_term_relationships (term_taxonomy_id, object_id) values (43, '$i');";
      // mysqli_query($conn, $sql);



  //  }



//    $sql = "insert into wp_term_relationships (object_id, term_taxonomy_id) values (1, 1)";
//
//    if(mysqli_query($conn, $sql))
//    {
//         echo "New record created successfully";
//    }
//
//
//    else
//    {
//            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//    }



// $sql= "INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES ";
// $sql .="('','".$post_author."',"."'".$post_date."',"."'".$post_date_gmt."',"."'".$post_content."',"."'".$post_title."',"."'".$post_excerpt."',"."'".$post_status."',"."'".$comment_status."',"."'".$ping_status."',"."'".$posd_password."',"."'".$post_name."',"."'".$to_ping."',"."'".$pinged."',"."'".$post_modified."',"."'".$post_modified_gmt."',"."'".$post_content_filtered."',"."'".$post_parent."',"."'".$guid."',"."'".$menu_order."',"."'".$post_type."',"."'".$post_mime_type."',"."'".$comment_count."'),";
//

//https://stackoverflow.com/questions/31531834/how-copy-data-from-one-table-into-another-php

$postTitle = "select * from novosti";


$resulTitle = $conn ->query($postTitle);

if($resulTitle ->num_rows > 0){
  while($row = $resulTitle -> fetch_assoc()){
    //echo''.$row["naziv"].' , '.$row["detaljnije"].'';
  //  $sql= "INSERT INTO `wp_posts` ('post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`,  `post_status`, `ping_status`,  `post_name`,  `guid`, `post_type`) VALUES ('igzyy', '', '', '".$row["detaljnije"]."', '".$row["naziv"]."', 'publish', 'open', '".$row["naziv"]."', '', 'post')";

     // Create post object
     $my_post = array(
       'post_title'    => wp_strip_all_tags( $row["naziv"] ),
       'post_content'  => wp_strip_all_tags ($row["detaljnije"]),
       'post_status'   => 'publish',
       'post_author'   => 1,
       'post_category' => array( 8,39 )
     );

     // Insert the post into the database
     wp_insert_post( $my_post );

  }


//https://developer.wordpress.org/reference/functions/wp_insert_post/
//https://developer.wordpress.org/reference/functions/wp_insert_post/



/*https://www.phpflow.com/php/insert-php-array-into-mysql-table/


$sql = "INSERT INTO wp_posts (post_author, post_content, post_content_filtered, post_title, post_excerpt, post_status, ping_status, guid, post_type) VALUES ";
$sql  ."(1, 'detalji', '', 'ffnaslov', '', 'publish', 'ping', '', 'post')";


https://dba.stackexchange.com/questions/123572/convert-mysql-database-from-latin1-to-utf8mb4-and-take-care-of-german-umlauts



konvertiranje baze :
https://stackoverflow.com/questions/9407834/mysql-convert-latin1-characters-on-a-utf8-table-into-utf8


# For each table
REPAIR TABLE table_name;
OPTIMIZE TABLE table_name;



        ?>
    </body>
</html>
