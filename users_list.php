<?php
$conn=mysqli_connect('localhost','root','','php_test');
$sql="SELECT * FROM users_tbl";
$result=mysqli_query($conn,$sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table class="maintbl">
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Field</th>
            <th>Comment</th>
            <th>Picture</th>
            <th>Delete</th>
            <th>edit</th>
        </tr>

    <?php
        while($row=mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['field']; ?></td>
            <td><?php echo $row['comment']; ?></td>
            <td><img src="<?php echo $row['picture']; ?>" height="30" /></td>
            <td>
               <a href="../chapter_24/delete.php?id=<?php echo $row['user_id']; ?>">
                   <img src="../chapter_24/delete.png" width="20" />
               </a>
            </td>
            <td>
                <a href="../chapter_24/edit.php?id=<?php echo $row['user_id']; ?>">
                    <img src="../chapter_24/edit.png" width="20" />
                </a>
            </td>
        </tr>
    <?php
        }
    ?>


    </table>
    <?php if(isset($_GET['delete'])){?>
        <div class="alert">
            Delete OK
        </div>
    <?php }?>
</body>
</html>
