<?php
require_once 'db/database.php';

if (isset($_POST['title'])) {

    $dirPath = 'img/box-img/';
    $user = $_POST['title'];
    $color = $_POST['color'];

    if(!empty($_FILES['file'])){
        $file = $_FILES['file'];
        $fileName = basename($file['name']);
        $dirPath = $dirPath.$fileName;    
        move_uploaded_file($file['tmp_name'], $dirPath);
    }else {
        $fileName = '';
    }


    $insert = $db->query("INSERT INTO `content` (Title,image,color) VALUES('$user','$fileName','$color')");

    if ($insert) {
        $msg = 'Item has been added Successfully.';
        echo json_encode($msg);
    }
} else {
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
        <?php include_once 'includes/header.php'; ?>
        <!-- Content -->
        <div class="main">
            <section class="add-user">
                <h3 class="msg"></h3>
                <form id="myForm" enctype="multipart/form-data">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" required>
                    <label for="color">Color Code</label>
                    <input type="color" name="color" id="color">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file">

                    <input type="submit" value="submit">
                </form>
            </section>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>

    </html>

<?php } ?>