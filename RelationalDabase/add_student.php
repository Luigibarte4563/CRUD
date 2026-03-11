<?php
require 'connect.php';

$sql = "SELECT * FROM teachers";
$stmt = $conn->prepare($sql);
$stmt->execute();
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<nav>
    <a href="add_student.php">add student</a>
    <a href="add_subject.php">add subject</a>
    <a href="add_teacher.php">add teacher</a>
    <a href="display.php">leadger</a>
</nav>

<h2>Add Student</h2>

<form method="POST">

<input type="text" name="student_name" placeholder="Student Name" required>

<select name="teacher_id">

<option>Select Teacher</option>

<?php foreach($teachers as $teacher){ ?>

<option value="<?php echo $teacher['id']; ?>">
<?php echo $teacher['teacher_name']; ?>
</option>

<?php } ?>

</select>

<button type="submit" name="add_student">
Add Student
</button>

</form>

<?php

if(isset($_POST['add_student'])){

$student = $_POST['student_name'];
$teacher_id = $_POST['teacher_id'];

$sql = "INSERT INTO students(student_name,teacher_id)
VALUES(:student,:teacher_id)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(":student",$student);
$stmt->bindParam(":teacher_id",$teacher_id);

$stmt->execute();

echo "Student Added";

}

?>