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
   include 'database_connection.php';
   function setDatabase($section)
   {
           (isset($_POST[$section])) ? convert_form_data(): [];
   }
   if(    (isset($_POST['login']))){
       check_action();
   }
   setDatabase('practice');
   ?> 
</body>
</html>