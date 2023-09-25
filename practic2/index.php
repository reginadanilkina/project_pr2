<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Form Validation</title>
</head>
<body>
    <div class="back_container">
        <div class="back">
        </div>
        <div class="container">
        <h1>Форма валидации:</h1>
        <form method="post" action="">
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="phone">Телефон:</label>
            <input type="tel" name="phone" id="phone" required>
            <button type="submit">Отправить</button>
        </form>
        <?php
        function validateForm($name, $email, $phone) {
            // Проверяем имя на пустоту и длину
            if (empty($name) || strlen($name) < 2) {
                return "Ошибка: имя должно содержать не менее 2 символов";
            }
            
            // Проверяем email на пустоту, длину и формат
            if (empty($email) || strlen($email) < 5 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Ошибка: некорректный email";
            }
            
            // Проверяем номер телефона на пустоту и количество символов
            if (empty($phone) || strlen($phone) != 11) {
                return "Ошибка: номер телефона должен содержать 11 символов";
            }
            
            // Если все проверки пройдены успешно, возвращаем true
            return true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $result = validateForm($name, $email, $phone);

            if ($result === true) {
                // Действия при успешной валидации формы
                echo "<p>Форма успешно отправлена!</p>";
            } else {
                // Выводим сообщение об ошибке
                echo "<p class='error'>" . $result . "</p>";
            }
        }
        ?>
    </div>
    </div>
</body>
</html>