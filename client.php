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
            <tr class="tab">
                <td>ID</td>
                <td>NOM</td>
                <td>PRENOM</td>
                <td>DATE DE NAISSANCE</td>
                <td>NATIONALITE</td>
                <td>GENRE</td>
                <td>ACTION</td>
            </tr>
            <?php
            $sql = "SELECT id, nom , prenom , dateDeNaissance , nationalite , genre FROM MyGuests";
            
            $result = $conn->query($sql);
            if ($result->num_rows >0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                   
              echo "<tr>
                <td> $row[id]</td>
                <td>$row[nom]</td>
                <td>$row[prenom]</td>
                <td>$row[dateDeNaissance]</td>
                <td>$row[nationalite]</td>
                <td>$row[genre]</td>
                <td><a href='compts.php?client=" .$row["id"] ."'<button class='btndetails'>details</button></a></td>
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