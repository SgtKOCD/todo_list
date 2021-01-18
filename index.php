<?php

$db = mysqli_connect('localhost','root','';'todo');

if(isset($_POST['submit']){
    $task=$_POST['task'];
    mysqli_query($db,"insert into task (task) values ('$task')");
    header('location: index.php');
}

 if (isset($_GET['del_task'])){
     $id=$_GET['del_task'];
     mysqli_query($db,"delete from tasks where id=$id");
     header('location: index.php');
 }  
   
$tasks= mysqli_query($db, "select*from tasks");
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css.css">
<title>Yapılacaklar Listesi</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <h2> ToDo List</h2>
    </a>
  </div>
</nav>
	
        <h2>Yapılacaklar</h2>
    


    <form method="post" action="index.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="btn btn-success" name="submit">Ekle</button>   
    </form>
    <table>
    <thead>
        <tr>
            <th>N</th>
            <th>Yapılacak</th>
            <th>Eylem</th>
        </tr>
        </thead>    
        <tbody>
            <?php $i=1 while ($row= mysqli_fetch_array($task)) {
    ?>
             <tr>
                <td><?php echo $i; ?></td>
                <td class="task"><?php echo $row['task']; ?></td>
                <td class="delete">
                    <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
                </td>
            
            </tr>
            <?php $i++;
}
   
   ?>
           
        
        </tbody>
        
        
    </table>    
    
</body>
</html>