<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
        }
        table {
            width: 350px;
        }
        td {
            height: 30px;
        }
    </style>
</head>
<body>
<form action="no003.php" method="post">
    <table border="2">
        <tr>
            <td><label for="name">Nama Lengkap :</label></td>
            <td><input type="text" name="name" /></td>
        </tr>
        <tr>
            <td><label for="email">Email Address :</label></td>
            <td><input type="text" name="email" /></td>
        </tr>
        <tr>
            <td><label for="tanggal">tanggal lahir :</label></td>
            <td><input type="text" name="tanggal" /></td>
        </tr>
        <tr>
            <td class="button-cell"></td>
            <td class="button-cell"><input type="submit" /><input type="reset" /></td>
        </tr>
    </table>
</form>
</body>
</html>
