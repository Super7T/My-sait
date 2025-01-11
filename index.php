<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=advvita8g2","advvita8g2",
            "W8Ln^TGDFP8XGDGN");
        $sql = "SELECT * FROM apple";
        $result = $conn->query($sql);
        echo"fdgklfdjlkjlkjl";
        echo "<table><tr><th>id</th><th>name</th><th>dirth</th><th>salary</th></tr> ";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" .$row['id']. "</td>";
                echo "<td>" .$row['name']. "</td>";
                echo "<td>" .$row['dirth']. "</td>";
                echo "<td>" .$row['salary']. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    catch (PDOException $e) {
        echo "database error:". $e->getMessage();
    }
?>