<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <form>
            <div>
                <h2>PERSONAL INFO</h2>
                <div>
                    <label>ENTER FIRST NAME:</label><input type="text" name="personal[first_name]" value="">
                </div>
                <div>
                    <label>ENTER LAST NAME:</label><input type="text" name="personal[last_name]" value="">
                </div>
                <div>
                    <label>ENTER EMAIL:</label><input type="text" name="personal[email]" value="">
                </div>
            </div>
            <div>
                <h2>ACCOUNT INFO</h2>
                <div>
                    <label>SELECT ONE OF THE MONTH</label>
                    <?php 
                    $month=["JAN","FEB","JULY"];
                    foreach($month as $field)
                    '<option>'
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>

</html>