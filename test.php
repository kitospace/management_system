<?php

$limit = 12;  
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;   

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Canteen Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
  <script src="js/new_bootstrap.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <script>
  $(function(){
  $("#register-form").validate({
   
    rules: {
        item_name: "required",
        lastname: "required"
    },
    messages: {
        item_name: "Please enter your firstname",
        lastname: "Please enter your lastname"
    }
});
});
  </script>
  
  </head>
  <body>
  <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2" class="pull-right">Open Data Table</a>
		<ul class="pagination"> 
      <?php   
           
        $total_records = 456;   
         
        $total_pages = ceil($total_records / $limit);   
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<li class='active'><a href='test.php?page=".$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='test.php?page=".$i."'>".$i."</a></li>";   
          } 
        };   
        echo $pagLink;   
      ?> 
		</ul> 
    </h4>
<div id="collapse2" class="panel-collapse collapse">
<div class="panel-body">
<?php

$sql = "SELECT id, item_type, item_form, pack_description, fixed_mrp, non_batch_item, item_name, category, item_mrp, non_expiry_item, item_code, sub_category, tax_type
		, non_mrp_item, hsn_code FROM item_table_master";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
	echo '<table class="table table-striped">';
	echo '<thead>';
	echo '<tr><th>SNo.</th><th>Item Type</th><th>Item Form</th><th>Pack Description</th><th>Is Fixed Price?</th><th>Non Batch Item?</th>
			<th>Item Name</th><th>Category</th><th>Item MRP</th><th>Non-Expiry Item?</th><th>Item Code</th><th>Sub-Category</th><th>Tax Type</th>
			<th>Non MRP Item?</th><th>HSN Code</th><th>Edits</th></tr>';
	echo '</thead>';
	echo '<tbody>';
	
	while($row = mysqli_fetch_assoc($result)){
		echo '<tr><td>'.$row['id'].'</td><td>'.$row["item_type"].'</td><td>'.$row["item_form"].'</td><td>'.$row['pack_description'].'</td><td>'.$row['fixed_mrp'].'</td>
		<td>'.$row['non_batch_item'].'</td><td>'.$row['item_name'].'</td><td>'.$row['category'].'</td><td>'.$row['item_mrp'].'</td><td>'.$row['non_expiry_item'].'</td>
		<td>'.$row['item_code'].'</td><td>'.$row['sub_category'].'</td><td>'.$row['tax_type'].'</td><td>'.$row['non_mrp_item'].'</td><td>'.$row['hsn_code'].'</td>
		<td><a href="item_master.php?item_id='.$row['id'].'&mode=edit" class="btn btn-info btn-sm" onclick="update()">Edit</a></td></tr>';
	}
	echo '</tbody>';
	echo '</table>';
	
}else {
	echo "0 results";
}

mysqli_close($conn);
?>
</div>
</div>
  </body>
  </html>