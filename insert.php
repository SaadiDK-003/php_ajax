<?php
require_once 'db/database.php';

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $insert = $db->query("INSERT INTO `user` (username) VALUES('$user')");

    if($insert){
        echo 'User has been added Successfully.';
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
            <form action="" id="myForm">
                <label for="username">Username</label>
                <input type="text" name="user" id="username" required>
                <!-- <label for="Email">Email</label><br>
                <input type="text" name="email" id="Email"><br>
                 -->
                 <input type="submit" value="submit">
            </form>
        </section>
    </div>

    <?php include_once 'includes/footer.php';?>
</body>
</html>

<?php } ?>