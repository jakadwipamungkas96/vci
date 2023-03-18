<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="<?php echo site_url('auth/login'); ?>">
        <label>Username:</label>
        <input type="text" name="username"><br>

        <label>Password:</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
</body>
</html>
