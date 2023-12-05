<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додади нов корисник</title>
</head>
<body>
    <h2>Регистрација</h2>
    <form action="register_process.php" method="post">
        <label for="username">Корисничко име:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Лозинка:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Регистрирај се!</button>
    </form>
</body>
</html>
