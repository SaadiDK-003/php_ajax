<?php
require_once 'db/database.php';

if(isset($_POST['title'])){
    $user = $_POST['title'];
    $img = $_POST['img'];
    $color = $_POST['color'];
    $file = $_FILES['file']['tmp_name'];

    $insert = $db->query("INSERT INTO `content` (Title,image,color) VALUES('$user','$img','$color')");

    if($insert){
        $msg = 'User has been added Successfully.';
        echo json_encode($msg);
    }
}
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include_once 'includes/header.php';?>
    <!-- Content -->
    <div class="main">
        <section class="add-user">
            <h3 class="msg"></h3>
            <form id="myForm" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>
                <label for="img">Img Name with extension</label>
                <input type="text" name="img" id="img">
                <label for="color">Color Code</label>
                <input type="text" name="color" id="color">
                <label for="file">File</label>
                <input type="file" name="file" id="file">
                
                 <input type="submit" value="submit">
            </form>
        </section>
    </div>

    <?php include_once 'includes/footer.php';?>
</body>
</html>

<?php } ?>