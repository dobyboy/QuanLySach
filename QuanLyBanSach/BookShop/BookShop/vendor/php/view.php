<?php

include("connection.php");
//sql to INSERT

$sql="SELECT * FROM loai_sach";
$result=mysqli_query($conn,$sql) or die(mysql_error());

echo "<h2>Bảng đơn vị</h2>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border=1>";
    echo"<tr><th>TEN LOAI</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["ten_loai_sach"]."</td>";
        echo "</tr>";

        echo "<a >". $row['ten_loai_sach']." </a>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

