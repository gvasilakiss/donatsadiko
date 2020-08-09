<?php include ("dbconnect.php"); ?>

<?php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
    
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                <th width="5%">ID</th>  
                <th width="30%">Customer Name</th>  
                <th width="15%">Sprinkles</th>  
                <th width="15%">Chocolate</th>
                <th width="15%">Caramel</th>
                <th width="15%">Raspberry</th>
                <th width="15%">Strawberry</th>
                <th width="15%">Blueberry</th>
                <th width="15%">Total Cost</th>
                <th width="15%">Order Date</th>
                </tr>';  

      $date1 = $_POST["from_date"];
      $date2 = $_POST["to_date"];

      
      $sql = $conn ->prepare("SELECT * FROM donut WHERE Order_Date LIKE ? AND ?");

      $sql -> bindValue(1, "$date1");
      $sql -> bindValue(2, "$date2");

      $sql -> execute();
      if($sql -> rowCount())  
      {  
           while($row = $sql->fetch())  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["Order_ID"] .'</td>  
                          <td>'. $row["Order_Name"] .'</td>  
                          <td>'. $row["field1"] .'</td> 
                          <td>'. $row["field2"] .'</td>  
                          <td>'. $row["field3"] .'</td>  
                          <td>'. $row["field4"] .'</td>  
                          <td>'. $row["field5"] .'</td>  
                          <td>'. $row["field6"] .'</td>   
                          <td>'. $row["Total_Price"] .'</td>  
                          <td>'. $row["Order_Date"] .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="10">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>