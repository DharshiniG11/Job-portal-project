<?php
include 'db.php';
$name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$role = isset($_POST['role_applied']) ? $conn->real_escape_string($_POST['role_applied']) : '';
$experience = isset($_POST['experience']) ? (int)$_POST['experience'] : 0;
$skills = isset($_POST['skills']) ? $conn->real_escape_string($_POST['skills']) : '';
$cover = isset($_POST['cover_note']) ? $conn->real_escape_string($_POST['cover_note']) : '';
$resume_path = '';
if(isset($_FILES['resume']) && $_FILES['resume']['error'] == 0){
    $target = 'uploads/'.basename($_FILES['resume']['name']);
    if(move_uploaded_file($_FILES['resume']['tmp_name'],$target)){
        $resume_path = $conn->real_escape_string($target);
    }
}
$sql = "INSERT INTO applications (name,email,role_applied,experience,skills,resume_path,cover_note) VALUES ('$name','$email','$role',$experience,'$skills','$resume_path','$cover')";
if($conn->query($sql) === TRUE){
    echo '<p>Application submitted successfully (DB).</p><p><a href="jobs.php">View jobs</a></p>';
} else {
    echo '<p>Error: '.htmlspecialchars($conn->error).'</p>';
}
$conn->close();
?>