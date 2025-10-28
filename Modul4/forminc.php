<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="form">
    <h1>Form Validasi</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table border="0">
            <tr>
                <td><label for="name">Nama</label></td>
                <td>: <input type="text" name="name" value="<?php echo $name; ?>"><span class="error"><?php echo $nameError; ?></span></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>: <input type="text" name="email" value="<?php echo $email; ?>"><span class="error"><?php echo $emailError; ?></span></td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal lahir</label></td>
                <td>: <input type="text" name="tanggal" value="<?php echo $date; ?>"><span class="error"><?php echo $dateError; ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"><input type="reset" name="reset" value="reset"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
