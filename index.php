<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Create database des clients
        $sql = "CREATE DATABASE if not exists DB_azii";
        if ($conn->query($sql) === TRUE) {
        } 
        else {
        echo "Error creating database: " . $conn->error;
        }
        $dbname = "DB_azii";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        

        // sql to create table
        $sql = "CREATE TABLE if not exists MyGuests (
        Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(30) NOT NULL,
        prenom VARCHAR(30) NOT NULL,
        dateDeNaissance DATE NOT NULL,
        nationalite VARCHAR(30) NOT NULL,
        genre VARCHAR(30) NOT NULL
        )";


        // if ($conn->query($sql) === TRUE) {
        // } else {
        // }
        // $sql = "INSERT INTO MyGuests (Id , nom, prenom, dateDeNaissance, nationalite , genre)
        // VALUES ('' , 'omar','benddhan','2000/11/01','marocain','homme')";

        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }



           // sql to create table compts
           $sql = "CREATE TABLE if not exists mycompts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            balance VARCHAR(30) NOT NULL,
            devis VARCHAR(30) NOT NULL,
            RIB VARCHAR(30) NOT NULL,
            IdClient INT UNSIGNED,
             FOREIGN KEY (IdClient) REFERENCES MyGuests(Id) 
            )";
            $conn->query($sql);
             $date = date("dHis");
             $rib = $date.substr($date,0,16);
            
            
            // $sql = "INSERT INTO mycompts (id, balance, devis, RIB,IdClient )
            // VALUES ( '' ,'743.000', 'euro', '$rib','371')";
            
    if ($conn->query($sql) === TRUE) {
        // Insertion successful
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
               // sql to create table compts
               $sql = "CREATE TABLE if not exists Transactions (
                ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                montant VARCHAR(30) NOT NULL,
                typeDeTrans VARCHAR(30) NOT NULL,
                IdCompts INT UNSIGNED,
                 FOREIGN KEY (IdCompts) REFERENCES Mycompts(id) 
                )";

                
                
                // $sql = "INSERT INTO Transactions (ID, montant, typeDeTrans,IdCompts )
                // VALUES ( '' , '11.000', 'debit','26')";
                
        if ($conn->query($sql) === TRUE) {
            // Insertion successful
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    

        $conn->close();

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
   <a href="client.php"> <img class="image" src="Your_Personal_Bank-removebg-preview.png" alt=""></a>
   
   <div class="btnn">
   <img class="img" src="1.png" alt="">
        <a  href="client.php"><button class="btn">afficher tous les clients</button></a>
    </div> 
        
</body>
</html>