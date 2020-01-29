<!DOCTYPE html>
<html lang="en">
<head>
<title>
    Registration Form
</title>
    <style>
        label {
            display: inline-block;
            width: 300px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php require_once 'form_post.php';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo '<br>';
    print_r($_SESSION);
    ?>
    <div>
        <h1>REGISTRATION FORM</h1>
    </div>
    <div>
        <form action="form.php" method="POST">
            <div>
                <h2>YOUR ACCOUNT DETAILS</h2>
                <label>Select One Of Prefix:</label>
                <?php $prefix_Data = ['Mr', 'Mrs', 'Dr']; ?>
                <select name="account[prefix]">
                    <?php foreach ($prefix_Data as $value) : ?>
                        <?php $selected = $value == getValue('account', 'prefix') ? "selected" : ""; ?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>

                <br><br><label>Enter First Name:</label><input type="text" name="account[first_name]" value="<?php echo getvalue('account', 'first_name'); ?>"><br>
                <br><label>Enter Last Name:</label><input type="text" name="account[last_name]" value="<?php echo getvalue('account', 'last_name'); ?>"><br>
                <br><label>Enter Date Of Birth:</label><input type="date" name="date"><br>
                <br><label>Enter Phone Number:</label><input type="text" name="acount[number]" value="<?php echo getvalue('account', 'number'); ?>"><br>
                <br><label>Enter Email:</label><input type="text" name="account[email]" value="<?php echo getvalue('account', 'email'); ?>"><br>
                <br><label>Enter Password:</label><input type="password " name="account[paasword]" value="<?php echo getvalue('account', 'paasword'); ?>"><br>
                <br><label>Confirm Password:</label><input type="password" name="confirm_password"><br>
            </div>
            <div>
                <h2>ADDRESS INFORMATION</h2>
                <br><label>Enter Address Line 1:</label><input type="text" name="address[address1]" value="<?php echo getvalue('address', 'address1'); ?>"><br>
                <br><label>Enter Address Line 2:</label><input type="text" name="address[address2]" value="<?php echo getvalue('address', 'address2'); ?>"><br>
                <br><label>Enter Company Name:</label><input type="text" name="address[company]" value="<?php echo getvalue('address', 'company'); ?>"><br>
                <br><label>Enter City Name:</label><input type="text" name="city"><br>
                <br><label>Enter State Name:</label><input type="text" name="state"><br>
                <br><label>Enter Country Name:</label>
                <?php $Country_Data = ['India', 'Ausralia', 'Canada', 'U.S.']; ?>
                <select name="address[country]">
                    <?php foreach ($Country_Data as $value) : ?>
                        <?php $selected = $value == getValue('address', 'country') ? "selected" : ""; ?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>

                <br><br><label>Enter Postal Code:</label><input type="text" name="address[postal]" value="<?php echo getvalue('address', 'postal'); ?>"><br>
            </div>
            <div>
                <br><input type="checkbox" id="myCheck" onclick="myFunction()"><label>Click To Fill Additional Information</label><br>
                <div id="text" style="display:none">
                    <br><label>Describe Yourself:</label><textarea name="other[description]"><?php echo getvalue('other', 'description'); ?></textarea><br>
                    <br><label>Profile Image:</label><input type="file" name="photo" accept="image/*"><br>
                    <br><label>Certifiacte Upload:</label><input type="file" name="certificate" accept="pdf/*"><br>
                    <br><label>How long have you been in business?</label><br>
                    <?php $businessDuration_Data = ['UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', '5-10 YEARS', 'OVER 10 YEARS']; ?>
                    <?php foreach ($businessDuration_Data as $value) : ?>
                        <?php $checked = getValue('other', 'businessDuration') == $value ? "checked" : ""; ?>
                        <input type="radio" name="other[businessDuration]" value="<?php echo $value ?>" <?php echo $checked; ?>> <?php echo $value; ?>
                    <?php endforeach; ?><br>


                    <br><label>Number of unique clients you see each week?</label>
                    <select name="prefix">
                        <option value="1-5">1-5</option>
                        <option value="6-10">6-10</option>
                        <option value="11-15">11-15</option>
                        <option value="15+">15+</option>
                    </select>
                    <br>
                    <br><label>How Do you Like to get in touch with us</label><br>
                    <?php $Response_Data = ['Post', 'SMS', 'Mail', 'Number']; ?>
                    <?php foreach ($Response_Data as $value) : ?>
                        <?php $checked = in_array($value, getValue('other', 'response','array')) ? "checked" : ""; ?>
                        <input type="checkbox" name="other[response][]" value="<?php echo $value ?>" <?php echo $checked; ?>><?php echo $value; ?>
                    <?php endforeach; ?><br>
                    <br><label>Select Your Hobbies:</label>
                    <?php $Hobbies_Data = ['Listening to music', 'Art', 'Sports','Travelling']; ?>
                    <select name="other[hobbies][]" multiple>
                        <?php foreach ($Hobbies_Data as $value) : ?>
                            <?php $selected = $value== getValue('other', 'hobbies') ? "selected" : ""; ?>
                            <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <br><input type="submit">
        </form>
    </div>
    <script src="form.js"></script>
</body>

</html>