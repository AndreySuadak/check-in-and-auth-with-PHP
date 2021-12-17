<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>кабинет пользователя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <a href="/">back</a>
    <?php if($_COOKIE['login'] == ''): ?>
        <h1>Зарегистрироваться</h1>
        <a href="/user/reg">Зарегистрироваться</a>
        <a href="/user/auth">Авторизоваться</a>

    <?php else: ?>
        <h1>Кабинет пользователя <?=$data['login']?></h1>
        <p>COOKIE: <?=$_COOKIE['login']?></p>
        <p>Email: <?=$data['email']?></p>
        <p>LOGIN: <?=$data['login']?></p>
        <p>ФИО: <?=$data['fio']?></p>

        <h3>Вы можете поменять ФИО и пароль</h3>
        <form action="/user/dashboard" method="post" class="bg-transparent mt-2 ms-5 me-5">

            <div class="form-floating mt-2 ms-5 me-5 w-25">
                <input type="text" name="fio" class="form-control" value="<?=$_POST['fio']?>">
                <label for="fio">ФИО</label>
            </div>

            <div class="form-floating mt-2 ms-5 me-5 w-25">
                <input type="pass" name="pass" class="form-control">
                <label for="pass">Пароль</label>
            </div>

            <div class="form-floating mt-2 ms-5 me-5 w-25">
                <input type="pass" name="re_pass" class="form-control">
                <label for="re_pass">Повторить пароль</label>
            </div>
            <p><?=$data['message1']?>.</p>

            <button class="ms-5 mt-2 btn btn-lg btn-primary" type="submit">Заменить</button>
        </form>
<hr>
        <form action="/user/dashboard" method="post" class="bg-transparent mt-2 ms-5 me-5">
            <input type="hidden" name="exit">
            <button class="ms-5 mt-2 btn btn-lg btn-danger" type="submit">Выйти</button>
        </form>

    <?php endif; ?>
</body>
</html>
