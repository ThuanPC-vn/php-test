<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--=============== BOXICON ===============-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--======================  CSS ===========================-->
    <link rel="stylesheet" href="./assets/index.css">
</head>
<body>
    <div class="form">
        <form action="login.php" method="POST" class="form__content">
            <div class="form__box">
                <input type="text" class="form__input" placeholder="Enter name" name="name">
                <label for="" class="form__label">ENTER NAME</label>
                <div class="form__shadow"></div>
            </div>
            <div class="form__box">
                <input type="password" class="form__input" placeholder="Enter password" name="password">
                <label for="" class="form__label">ENTER PASSWORD</label>
                <div class="form__shadow"></div>
            </div>

            <div class="form__button">
                <input type="submit" class="form__submit" value="Sign Up">
            </div>

            <?php
                session_start();
                if (isset($_SESSION['errors'])) {
                    echo '<p class="errors__content">' . htmlspecialchars($_SESSION['errors']) . '</p>';
                    unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị
                }
            ?>
        </form>

        
    </div>
</body>
</html>