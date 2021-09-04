<?php
$connect = new PDO("mysql:host=localhost;dbname=testing","root","");

$query = "SELECT * FROM  tbl_customer ";
$statement = $connect->prepare($query);
$statement->execute();
$count = $statement->rowCount();


?>

<html>
<head>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <script src="lib/jquery.min.js"></script>

</head>
<style>

</style>
<body>

<div class="container bg-light">
    <h1 class="text-center">MySQL data to Excel in PHP </h1>
    <table class="table table-bordered">
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

    <br>
    <br>
    <br>
    <form method="post" action="export.php">
        <input type="submit" name="sub" class="btn btn-primary">
    </form>
</div>



</body>

</html>