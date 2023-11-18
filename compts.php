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
                <td>ID</td>
                <td>BALANCE</td>
                <td>DEVIS</td>
                <td>RIB</td>
                <td>CLIENT ID</td>

                
            </tr>
            <?php
    $sql = "SELECT id, balance, devis, RIB, IdClient FROM mycompts";
    

    $result = $conn->query($sql);
    if (isset($_GET['client'])){
  $id = $_GET['client'];
  $sql = "SELECT * FROM mycompts WHERE IdClient = '$id'";
  $result = mysqli_query($conn, $sql);
}
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['balance'] . "</td>
                    <td>" . $row['devis'] . "</td>
                    <td>" . $row['RIB'] . "</td>
                    <td>$row[IdClient]</td>
                    <td><a href='trans.php?client=" .$row["id"] ."'<button class='btndetails'>details</button></a></td>

                </tr>";
        }
    } else {
        echo "0 results";
    }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>