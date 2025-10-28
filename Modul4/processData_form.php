<!DOCTYPE html>
<html>
<head>
    <title>Form Data</title>
</head>
<body>
    <form action="procces.php" method="post">
        <table>
            <tr>
                <td><label for="nama">Nama Lengkap:</label></td>
                <td><input type="text" id="nama" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="text" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea id="alamat" name="alamat" rows="4" cols="50" required></textarea></td>
            </tr>
            <tr>
                <td><label for="provinsi">Provinsi:</label></td>
                <td>
                    <select id="provinsi" name="provinsi" required>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="country" value="Indonesia"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
                    <label for="laki-laki">Laki-laki</label><br>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                    <label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td><label for="sudah_bekerja">Sudah Bekerja?</label></td>
                <td><input type="checkbox" id="sudah_bekerja" name="sudah_bekerja" value="Ya"></td>
            </tr>
        </table>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
