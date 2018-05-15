
<meta charset="utf-8">
<?php

include("connection.php");
//sql to INSERT

$sql="SELECT * FROM loai_sach";
$result=mysqli_query($conn,$sql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
   // output data of each row   
    while($row = mysqli_fetch_assoc($result)) {
        echo "<a >".$row['ten_loai_sach']."</a>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

