<?php require "connect.php"; ?>

<nav>
    <a href="add_student.php">add student</a>
    <a href="add_subject.php">add subject</a>
    <a href="add_teacher.php">add teacher</a>
    <a href="display.php">leadger</a>
</nav>

<h2>Add Subject</h2>

<form method="POST">

<input type="text" name="subject_name" placeholder="Subject Name" required>

<button type="submit" name="add_subject">
Add Subject
</button>

</form>

<?php

if(isset($_POST['add_subject'])){

$subject = $_POST['subject_name'];

$sql = "INSERT INTO subjects(subject_name) VALUES(:subject)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":subject",$subject);
$stmt->execute();

echo "Subject Added";

}

?>