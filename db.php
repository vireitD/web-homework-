<?php      //Li Ka Wa 22028345S

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="SEHS4517";
$conn = new mysqli($servername, $username, $password,$dbname);//connect to database
if ($conn->connect_error) {//when connection is failed
  die("Connection failed: " . $conn->connect_error);
}
function database() {// this function is use to display the table of database

$sql = "SELECT * FROM reservation ORDER BY id;";// sort by id
$result = $GLOBALS['conn']->query($sql);//get result of database


if ($result->num_rows > 0) {//when the database have record
   
    echo "<p>list of reservation sorted by id</p>"; // table of database 
    echo "<table>
                 <tr>
                   <th>Id</th>
                   <th>Store</th>
                   <th>Model</th>
                   <th>Fname</th>
                   <th>Lname</th>
                   <th>email</th>
                   <th>mobile</th>
                  </tr>";
    
    while($row = $result->fetch_assoc()) {//get all the value from result
        echo "<tr><td>".$row["id"]."</td><td>".$row["store"]."</td><td>".$row["model"]."</td><td>".$row["fname"]
        ."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["mobile"]."</td></tr>";
    }
    echo "</table>";
} else {// when database no record
    echo "no record in the database table";
}

$GLOBALS['conn']->close();//close database
}


function Search(){// function of Search record by mobile phone number
    echo //search button and input and save input value to cookies
    '
     
      <h1>SEHS4517 Admin System</h1>
      Search record by mobile phone number:<input type="number" id="searchbox" maxlength="8"> <button onclick="search()"> search </button> </br>

     <script type="text/javascript">

     function search(){
     var searchcheck = document.getElementById("searchbox").value;
     document.cookie = "checkmobile="+searchcheck;
       window.location.reload();
     }
     
        
     </script>
      ';

    if(isset($_COOKIE['checkmobile'])){//check cookie is null or not
    $checkmobile = $_COOKIE['checkmobile'];
    $sql2 = "SELECT * FROM reservation WHERE mobile = '$checkmobile' ";// get search record
    $result2 = $GLOBALS['conn']->query($sql2);//get result of database
        if ($result2->num_rows > 0) {//when the database have record
         echo "<table>
                 <tr>
                   <th>Id</th>
                   <th>Store</th>
                   <th>Model</th>
                   <th>Fname</th>
                   <th>Lname</th>
                   <th>email</th>
                   <th>mobile</th>
                  </tr>";
    
    while($row = $result2->fetch_assoc()) {//get all the value from result2
        echo "<tr><td>".$row["id"]."</td><td>".$row["store"]."</td><td>".$row["model"]."</td><td>".$row["fname"]
        ."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["mobile"]."</td></tr>";
    }
    echo "</table>";

        } else {
            echo "no record";
        }
    } 
}

?>