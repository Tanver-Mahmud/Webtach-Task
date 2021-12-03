<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture</title>
    
</head>
<body>

<?php include "../Controller/HeaderL.php"; ?>
<?php include "../Controller/Sidebar.php"; ?>
<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form action="#" method="POST">

        <table>

            <tr>
                <td><img src="image/profile.png" width="157" height="173"><br></td>
            </tr>

            <tr>
                <td><input name="image" type="file"><span class="error"></span><br></td>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Submit" style="width: 60px">
        
    </form>
</fieldset>

</body>
</html>