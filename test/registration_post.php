<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <?php
   include 'connection.php';
   function setDatabase($section)
   {
           (isset($_POST[$section])) ? check_function($section): [];
   }
   if(    (isset($_POST['login']))){
       check_action();
   }
   setDatabase('register');
   if(isset($_POST['category'])){
   if(check_url()==0)
   setDatabase('category');
   else{
       echo "URL CANNOT BE COPIED";
   }
}
   ?> 
</body>
</html>