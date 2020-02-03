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
    include 'registration_post.php';
    ?>
  <h2>ADD NEW CATEGORY</h2>
  <form method="POST">
 <div>     
<label>Title</label><input type="text" name="category[Title]">
</div>
<div>     
<label>Content</label><textarea rows="3" cols="20" name="category[Content]"></textarea>
</div>
<div>     
<label>URL</label><input type="text" name="category[Url]">
</div>
<div>     
<label>Meta Title</label><input type="text" name="category[Meta_Title]">
</div>
<div> 
    <div>
    <label>Parent Category</label><input type="text"  name="show[parent_category]">    
    </div>  
<div>     
<label>Image</label><input type="file" name="image">
</div>
<div>
    <input type="submit" value="SUBMIT" name="submit_category">
</div>
</form>  
<form action="category.php">
    <input type="submit" value="BACK TO BLOG CATEGORY">
</form>
<?php
print_r($_SESSION['array']);
?>
</body>
</html>