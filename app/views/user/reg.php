<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Зарегистрироваться</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <a href="/">back</a>
    <?php if($_COOKIE['login'] == ''): ?>
        <h1>Зарегистрироваться</h1>
        <form action="/user/reg" method="post" class="bg-transparent mt-2 ms-5 me-5">
            <div class="form-floating mt-2 ms-5 me-5 w-25">
                <input type="email" name="email" class="form-control" value="<?=$_POST['email']?>">
                <label for="email">Email address</label>
            </div>

            <div class="form-floating mt-2 ms-5 me-5 w-25">
                <input type="text" name="login" class="form-control" value="<?=$_POST['login']?>">
                <label for="login">LOGIN</label>
            </div>

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

            <button class="ms-5 mt-2 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
        </form>

    <?php else: ?>
        <h1>Вы уже зарегистрировались</h1>
        <a href="/user/dashboard">кабинет пользователя <?=$_COOKIE['login']?></a>
    <?php endif; ?>
</body>
</html>
