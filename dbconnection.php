<?php
// Connect to the database
$db = mysqli_connect("localhost", "root", "", "wms-rfive");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle student registration
if (isset($_POST['register_student'])) {
    $student_first_name = $_POST['student_first_name'];
    $student_middle_name = $_POST['student_middle_name'];
    $student_last_name = $_POST['student_last_name'];
    $student_dob = $_POST['student_dob'];
    $student_address = $_POST['student_address'];

    $query = "INSERT INTO students (FirstName, MiddleName, LastName, DateOfBirth, Address) VALUES ('$student_first_name', '$student_middle_name', '$student_last_name', '$student_dob', '$student_address')";

    if (mysqli_query($db, $query)) {
        echo "success"; // Send success message to the frontend
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}

// Handle faculty registration
if (isset($_POST['register_faculty'])) {
    $faculty_first_name = $_POST['faculty_first_name'];
    $faculty_middle_name = $_POST['faculty_middle_name'];
    $faculty_last_name = $_POST['faculty_last_name'];
    $faculty_dob = $_POST['faculty_dob'];
    $faculty_address = $_POST['faculty_address'];

    $query = "INSERT INTO instructors (FirstName, MiddleName, LastName, DateOfBirth, Address) VALUES ('$faculty_first_name', '$faculty_middle_name', '$faculty_last_name', '$faculty_dob', '$faculty_address')";

    if (mysqli_query($db, $query)) {
        echo "success"; // Send success message to the frontend
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}

// Close the database connection
mysqli_close($db);
?>
