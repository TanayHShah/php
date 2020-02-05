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
    
    ?>
    <h2>ADD NEW blog</h2>
    <form method="POST">
        <div>
            <label>Title</label><input type="text" name="blog[Title]">
        </div>
        <div>
            <label>Content</label><textarea rows="3" cols="20" name="blog[Content]"></textarea>
        </div>
        <div>
            <label>URL</label><input type="text" name="blog[Url]" >
        </div>
        <div>
            <div>
                <label>Parent blog</label>
                <select name="parent_blog_id" multiple>
                    <?php
                    $id = get_parent_id();
                    $name = get_parent_category();
                    for ($i = 0; $i < sizeof($id); $i++) {
                        echo '<option value=' . $id[$i] . '>' . $name[$i] . '</option>';
                    }
                    ?>

                </select>
            </div>
            <div>
                <label>Image</label><input type="file" name="blog[image]">
            </div>
            <div>
                <input type="submit" value="SUBMIT" name="submit_blog">
            </div>
    </form>
    <form action="blog_page.php">
        <input type="submit" value="BACK TO BLOG blog">
    </form>
    <?php
    ?>
</body>

</html>