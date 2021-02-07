<?php
include "config.php";
 
if(isset($_REQUEST["term"])){
    $var = $_REQUEST["term"];
    $likeVar = "%" . $var . "%";
    $sql = "SELECT * FROM table_name WHERE (product_column) LIKE ? LIMIT 5";
    $kat = "SELECT * FROM table_name WHERE (categories_column) LIKE ? LIMIT 3";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $likeVar);
        
        $var = $_REQUEST["term"] . '%';
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result) > 0){
                  echo "<span style='font-weight: bold; font-size: 15px'><i class='fas fa-arrow-right'></i> Products</span>";
                  echo "<hr>";
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  echo "<div style'display: flex'>";
                     echo "<a href=''><p style='font-size: 20px'><img src='../assets/images/image.jpg' width='30' height='20'><span style='padding-left: 10px'>" . $row["products"] . "</span>";
                     echo "<span style='float: right; font-weight: bold; color: red;'>".$row['price']."</span></p></a>";
                   echo "</div>";
              }
            } else{
               echo "<span style='font-weight: bold; font-size: 15px'><i class='fas fa-arrow-right'></i> Products</span>";
               echo "<hr>";
               echo "<p>Nothing found!</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }if($stmt = mysqli_prepare($link, $kat)){
      mysqli_stmt_bind_param($stmt, "s", $param_term);
  
      $param_term = $_REQUEST["term"] . '%';
      
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);
          
          if(mysqli_num_rows($result) > 0){
                echo "<span style='font-weight: bold; font-size: 15px'><i class='fas fa-arrow-right'></i> Categories</span>";
                echo "<hr>";
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                   echo "<a href=''><p style='font-size: 20px'><i class='fas fa-folder-open'></i><span style='padding-left: 10px'>". $row["categories"] . "</span></a>";

            }
          } else{
            echo "<span style='font-weight: bold; font-size: 15px'><i class='fas fa-arrow-right'></i> Categories</span>";
            echo "<hr>";
            echo "<p>Nothnig found!</p>";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
   }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>
