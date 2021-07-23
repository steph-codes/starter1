<?php
// 1. protect this page, ensure that user gets here by $_POST
//2. ensure that only logged in user are able to visit this page
//3. retrieve the form data and sanitize
//4. require the class and instantiate an object of the class
// 5. call the function updateprofile()
//6. we will develop the update function profile function together in the user class.
if($_POST){
    require('user.php');
    $obj=new user;
    if(!isset($_SESSION['userid'])){
        header('location:index.php');
    }

//$name =trim(strip_tags($_post['name']));
//$description =trim(strip_tags($_post['description']));
//$state =trim(strip_tags($_post['id']));
//$number =trim(strip_tags($_post['phone'];

$id = $_SESSION['userid'];
$deets = $obj->update_profile($_POST, $id);

//Note: $_POST is the summary of all the posts. post'name', post 'description' etc.
// $id is used cos if you dont log in, you can get to this page. and the id is 
//used to know the people that logged in.

}else{
    header('location:home.php');

}

?>