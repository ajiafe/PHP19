<?php
session_start();
// 判断用户是否已经登录?
if (isset($_SESSION['user'])) {
    echo '<script>alert("不要重复登录");locatoin.href="index.php"</script>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form.form-example {
            display: table;
        }

        div.form-example {
            display: table-row;
        }

        label,
        input {
            display: table-cell;
            margin-bottom: 10px;
        }

        label {
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <form action="handle.php?action=register" method="post" class="form-example">
    <div class="form-example">
            <label for="name">Enter your name: </label>
            <input type="name" name="name" id="name" required />
        </div>
        <div class="form-example">
            <label for="email">Enter your email: </label>
            <input type="email" name="email" id="email" required />
        </div>
        <div class="form-example">
            <label for="name">Enter your password: </label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="form-example">
            <label for="name">Confirm your password: </label>
            <input type="password" name="password1" id="password1" required />
        </div>
        <div class="form-example">
            <input type="submit" value="register" />
        </div>
    </form>

</body>

</html>