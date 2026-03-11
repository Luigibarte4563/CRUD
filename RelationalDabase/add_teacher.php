<?php
require 'connect.php';

$sql = "SELECT * FROM subjects";
$stmt = $conn->prepare($sql);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<nav>
    <a href="add_student.php">add student</a>
    <a href="add_subject.php">add subject</a>
    <a href="add_teacher.php">add teacher</a>
    <a href="display.php">leadger</a>
</nav>

<h2>Add Teacher</h2>

<form method="POST">

<input type="text" name="teacher_name" placeholder="Teacher Name" required>

<select name="subject_id">

<option>Select Subject</option>

<?php foreach($subjects as $subject){ ?>

<option value="<?php echo $subject['id']; ?>">
<?php echo $subject['subject_name']; ?>
</option>

<?php } ?>

</select>

<button type="submit" name="add_teacher">
Add Teacher
</button>

</form>

<?php

if(isset($_POST['add_teacher'])){

$name = $_POST['teacher_name'];
$subject_id = $_POST['subject_id'];

$sql = "INSERT INTO teachers(teacher_name,subject_id)
VALUES(:name,:subject_id)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(":name",$name);
$stmt->bindParam(":subject_id",$subject_id);

$stmt->execute();

echo "Teacher Added";

}

?>