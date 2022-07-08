<?php
$servername="localhost";
$user="root";
$password="";
$db='employee';

$conn = mysqli_connect("localhost", "root", "", "employee");

?>

<html>  

<head>  

<title> Pagination in PHP </title>  

</head>  

<body>   

<?php  
 
$limit = 10;  

$sql = "SELECT *FROM `employee`";    

$res = mysqli_query($conn, $sql);  

$total_rows = mysqli_num_rows($res);    

$total_pages = ceil ($total_rows / $limit); 
   
if (!isset ($_GET['page']) ) 
{  

$page_number = 1;  

} else {  

$page_number = $_GET['page'];  

}    

 $initial_page = ($page_number-1) * $limit;   

$sql1 = "SELECT *FROM  employee LIMIT " . $initial_page . ',' . $limit;  

$result = mysqli_query($conn, $sql1);   
?>  

<div class="table-responsive">

<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>

<th>id</th>
<th>name</th>
<th>phone</th>
<th>created_at</th>
<th>updated_at</th>
 

</tr>

<?php
$i = 1;
if ($total_rows > 0) {
while ($total1 = mysqli_fetch_array($result)) {
?>
        
        <tr>


<td align="center"><?= $total1['id'] ?></td>
<td align="center"><?= $total1['name'] ?></td>
<td align="center"><?= $total1['phone'] ?></td>
<td align="center"><?= $total1['created_at'] ?></td>
<td align="center"><?= $total1['updated_at'] ?></td>
</tr>      
            <?php
        }
    } else { ?>
            <tr>
                <td colspan="12" align="center">No Record Found!</td>
    
</tr><?php  }              
"<br>";    
for ($page_number = 1; $page_number <= $total_pages; $page_number++) {  
            
echo   '<a href = "page.php?page=' . $page_number . '">' . $page_number . ' </a>';  

}    

?>  
</div>

</thead>
</table>

</body>  

</html> 

