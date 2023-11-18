<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "DB_azii";

        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        ?>
        
<div class="navbar">
        <nav> 
            <ul>
              <li><a href="client.php">clients</a></li>
              <li><a href="compts.php">comptes</a></li>
              <li><a href="trans.php">transactions</a></li>
            </ul>
        </nav>
    </div>
   <a href="index.php"> <img class="image" src="Your_Personal_Bank-removebg-preview.png" alt="">  </a>
    <div class="table">
        <table>
            <tr>
                <td> ID</td>  
                <td>ID DE COMPTS</td>
                <td>TYPE DE TRANSACTION</td>
                <td>MONTANT</td>
            </tr>
            <?php
    $sql = "SELECT ID, montant, typeDeTrans,IdCompts FROM Transactions";

    $result = $conn->query($sql);
    if (isset($_GET['client']))
{
  $id = $_GET['client'];
  $sql = "SELECT * FROM Transactions WHERE IdCompts = '$id'";
  $result = mysqli_query($conn, $sql);
}
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['IdCompts'] . "</td>
                    <td>" . $row['typeDeTrans'] . "</td>
                    <td>" . $row['montant'] . "</td>
                    

                   

                </tr>";
        }
    } else {
        echo "0 results";
    }
            $conn->close();
            ?>
</body>
</html>