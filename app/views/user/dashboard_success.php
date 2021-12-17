<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-center">
    <div id="goog-gt-tt" class="skiptranslate" dir="ltr">
        <?php if($_COOKIE['login'] == ''): ?>
            <div class="top" style="padding: 8px; float: left; width: 100%;">
                <h1 class="title gray">Где я?!</h1>
            </div>
            <div class="middle" style="padding: 8px;">
                <div class="original-text">
                    <a href="/user/reg">Зарегистрироваться</a> | 
                    <a href="/user/auth">Авторизоваться</a>
                </div>
            </div>
        <?php else: ?>
            <div class="top" style="padding: 8px; float: left; width: 100%;">
                <h1 class="title gray">Успешно!!!</h1>
            </div>
            <div class="middle" style="padding: 8px;">
                <div class="original-text">
                    <a href="/user/dashboard">кабинет пользователя <?=$_COOKIE['login']?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
