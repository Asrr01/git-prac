<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
//==========================VARIABLES=============================
    $name="imong mama";
     echo $name;

    
    //array types(contains multiple values)
    $colors = array ("red", "green", "blue");
        echo $colors[0];
        echo $colors[1];
        echo $colors[2];

    //associative array types(contains multiple values with key-value pairs)
    $person = (
        "name" => "John", 
        "age" => 30, 
        "city" =>  "New York"
    );
        echo $person["name"];
        echo $person["age"];
        echo $person["city"];    


    //object types
    $object = new stdClass();


    //data types / scalar types (contains one value)
    $string = "Hello World";
    $int = 42;
    $float = 3.14;
    $bool = true;
        echo $string;
        echo $int;
        echo $float;
        echo $bool;
//==========================VARIABLES=============================



//=========================SUPERGLOBALS============================
    $_SERVER['PHP_SELF'];
    $_SERVER['DOCUMENT_ROOT'];
        echo $_SERVER['HTTP_USER_AGENT'];
        echo $_SERVER['REMOTE_ADDR'];
        echo $_SERVER['REQUEST_METHOD'];
        echo $_SERVER['SERVER_NAME'];

    //METHODS    
    $_GET['name'];    
    $_POST['name'];
    $_REQUEST['name'];
    $_FILES['file'];
    $_COOKIE['name'];
    $_SESSION['name'];
    $_ENV['name'];
//=========================SUPERGLOBALS============================


//=====================CONDITIONAL STATEMENTS=======================
    $age = 20;
    $age = 17;
        if ($age >= 18) {
            echo "You are an adult.";
             } else {
            echo "You are a minor.";
        }

    echo "<br>";

    $grade = 85;
        if ($grade >= 90) {
            echo "You got an A.";
            } elseif ($grade >= 80) {
                echo "You got a B.";
            } elseif ($grade >= 70) {
                echo "You got a C.";
            } else {
                echo "You failed.";
        }
//=====================CONDITIONAL STATEMENTS=======================


//========================CONNECT TO MYSQL==========================
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase"; //Create a database named "mydatabase" in your MySQL server

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    
//========================CONNECT TO MYSQL==========================


//=============================C-R-U-D==============================

//========================CREATE-(INSERT)===========================
//(Include connection code from 'connect.php' file)

    $sql = "INSERT INTO users (firstname, lastname, email) 
    VALUES ('John', 'Doe', 'john.doe@example.com')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
//========================CREATE-(INSERT)===========================

//========================READ-(SELECT)=============================

    require 'connect.php'; // Include connection code from 'connect.php' file

    $sql = "SELECT id, firstname, lastname, email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }
//========================READ-(SELECT)=============================

//========================UPDATE-(UPDATE)===========================
    require 'connect.php'; // Include connection code from 'connect.php' file

    $sql = "UPDATE users SET lastname = 'Smith' WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
//========================UPDATE-(UPDATE)===========================

//========================DELETE-(DELETE)===========================
    require 'connect.php'; // Include connection code from 'connect.php' file

    //SQL to delete a record
    $sql = "DELETE FROM users WHERE id = 3";

    if( $conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
//========================DELETE-(DELETE)===========================    

    ?>
</body>
</html>