<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_register_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->error) {
    die("Connection failed: " .$conn->connect_error);
}

$sql = "SELECT * FROM student_record";
$result = $conn->query($sql);

echo "<h1>Registered Student</h1>";
echo "<table border='1'><tr><th>Full Name</th><th>Email</th><th>Department</th><th>Matric Number</th><th>Action</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td> " . $row["full_name"]. "</td>
                <td> " . $row["email"]. "</td>
                <td> " . $row["department"]. "</td>
                <td> " . $row["matric_number"]. "</td>
                <td><a href='delete.php?id="  .$row["id"]. "'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No students registered yet.";
}

$conn->close();
?>

