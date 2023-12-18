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
    <form action="handle.php?action=login" method="post" class="form-example">
        <div class="form-example">
            <label for="email">Enter your email: </label>
            <input type="email" name="email" id="email" required />
        </div>
        <div class="form-example">
            <label for="name">Enter your password: </label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="form-example">
            <input type="submit" value="login" />
        </div>
    </form>

</body>

</html>