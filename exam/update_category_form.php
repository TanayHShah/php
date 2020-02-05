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
    if(!isset($_SESSION['id'])){
        echo header("Location:login.php");
    }
    
    $array=[];
    ?>
    <h2>ADD NEW CATEGORY</h2>
    <form method="POST">
        <div>
            <label>Title</label><input type="text" name="category[Title]"  value="<?php echo getvalue('category','Title')?>">
        </div>
        <div>
            <label>Content</label><textarea rows="3" cols="20" name="category[Content]"  ><?php echo getvalue('category','Content')?></textarea>
        </div>
        <div>
            <label>URL</label><input type="text" name="category[Url]" value="<?php echo getvalue('category','Url')?>">
        </div>
        <div>
            <label>Meta Title</label><input type="text" name="category[Meta_Title]"  value="<?php echo getvalue('category','Meta_Title')?>">
        </div>
        <div>
            <div>
                <label>Parent Category</label>
                <select name="category[parent_category_id]">
                    <?php
                    $id = get_parent_id();
                    $name = get_parent_category();
                    $array=array_combine($name,$id);
                    foreach ($array as $key => $value): ?>
                        <?php $value == getvalue('category', 'parent_category_id') ? $selected="selected" :$selected= "";?> 
                      <option value=<?php echo $value?> <?php echo $selected?>   ><?php echo $key?></option>
                      <?php endforeach; ?>

                </select>
            </div>
            <div>
                <label>Image</label><input type="file" name="image">
            </div>
            <div>
            <input type="submit" value="UPDATE" name="submit_updated_category">
            </div>
    </form>
    <form action="category.php">
        <input type="submit" value="BACK TO BLOG CATEGORY">
    </form>
    
</body>

</html>