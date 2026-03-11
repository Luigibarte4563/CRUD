<?php
require "connect.php"; // Make sure $conn is defined

$sql = "SELECT 
        students.student_name,
        teachers.teacher_name,
        subjects.subject_name
        FROM students
        JOIN teachers ON students.teacher_id = teachers.id
        JOIN subjects ON teachers.subject_id = subjects.id";

$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Ledger</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        caption {
            caption-side: top;
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<nav>
    <a href="add_student.php">add student</a>
    <a href="add_subject.php">add subject</a>
    <a href="add_teacher.php">add teacher</a>
    <a href="display.php">leadger</a>
</nav>
<table>
    <caption>Student Ledger</caption>
    <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Teacher Name</th>
            <th>Subject</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $count = 1;
        foreach($results as $row): ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo htmlspecialchars($row['student_name']); ?></td>
            <td><?php echo htmlspecialchars($row['teacher_name']); ?></td>
            <td><?php echo htmlspecialchars($row['subject_name']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>