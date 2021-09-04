
<?php
//export.php
//header('Content-Type: application/xls');
//header('Content-Disposition: attachment; filename=download.xls');
?>
<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=download.xls');
$connect = new PDO("mysql:host=localhost;dbname=testing","root","");

$query = "SELECT * FROM  tbl_customer ";
$statement = $connect->prepare($query);
$statement->execute();
$count = $statement->rowCount();

?>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Postal Code</th>
        <th>Country</th>
    </tr>
    <?php
    if($count >0){
        $result = $statement->fetchAll();
        foreach ($result as $row){
            echo "<tr>
                <td>".$row['CustomerName']."</td>
                <td>".$row['Address']."</td>
                <td>".$row['City']."</td>
                <td>".$row['PostalCode']."</td>
                <td>".$row['Country']."</td>


                  </tr>
                    ";
        }
    }

    ?>
</table>
