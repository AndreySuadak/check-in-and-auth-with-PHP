<?php

require 'DB.php';

class UserModel {
    private $email;
    private $login;
    private $fio;
    private $pass;
    private $re_pass;

    private $_db = null;

    public function __construct() {
      $this->_db = DB::getInstence();
    }

    public function setData($email, $login, $fio, $pass, $re_pass) {
        $this->email = trim(filter_var($email, FILTER_SANITIZE_STRING));
        $this->login = trim(filter_var($login, FILTER_SANITIZE_STRING));
        $this->fio = trim(filter_var($fio, FILTER_SANITIZE_STRING));
        $this->pass = trim(filter_var($pass, FILTER_SANITIZE_STRING));
        $this->re_pass = trim(filter_var($re_pass, FILTER_SANITIZE_STRING));

    }

    public function validForm() {
        if(strlen($this->email) < 3)
            return "Email слишком короткое";
        else if(strlen($this->login) < 3)
            return "LOGIN слишком короткий(3-знака)";
        else if(strlen($this->fio) < 6)
            return "ФИО слишком короткое(6-знаков)";
        else if(strlen($this->pass) < 6)
            return "Пароль слишком короткий(6-знаков)";
        else if($this->pass != $this->re_pass)
            return "Пароли не совпадают";
        else
            return "Верно";
    }

    public function addUser() {
        $sql = 'INSERT INTO users(email, login, fio, pass) VALUES(:email, :login,  :fio, :pass)';
        $query = $this->_db->prepare($sql);

        $pass = password_hash($this->pass, PASSWORD_DEFAULT);

        $query->execute(['email' => $this->email, 'login' => $this->login, 'fio' => $this->fio, 'pass' => $pass]);

        // ============КУКИ===============
        // В момент записи пользователя в базу мы будем добовлять КУКИ
        // Устанавливаем КУКИ и перенапровляем на страницу
        $this->setAuth($this->email);// передаем email из формы для добовления пользователя

    }

    public function getUser() {
        $email = $_COOKIE['login'];
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function logOut() {
        // ============КУКИ===============
        // Мы удоляем КУКИ  - 3600
        setcookie('login', $this->email, time() - 3600, '/');
        unset($_COOKIE['login']); //100% удоляем КУКИ
        // перенапровляем на страницу регистрации
        header('Location:/home/index');
    }

// метод АВТОРИЗАЦИЯ получаем два значения email pass
    public function auth($email, $pass) {
        // по email выбираем из БД все данные о пользователе
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $user = $result->fetch(PDO::FETCH_ASSOC);//помещаем все из БД в переменную

        // делаем проверки если в Бд НЕ существует(равна пустоте) такая запись email то выводим сообщение
        if ($user['email'] == '') {
            return 'Пользователя с такми email не существует.';

            // password_verify($pass, $user['pass']) сравнивает получаемый пароль из формы с паролем из БД
        } else if(password_verify($pass, $user['pass'])) {

            // Если пароли совпали  то
            // Устанавливаем КУКИ и перенапровляем на страницу
            $this->setAuth($email);// передаем параметр из формы авторизации

        // return 'Пароли совпали';
        } else {
            return 'Пароли не совпадают';
        }
    }

    // создаем метод где у нас будет добовляться КУКИ и переодрисация на страницу КАЬИНЕТ пользователя
    public function setAuth($email) {
        // ============КУКИ===============
        setcookie('login', $email, time() + 3600, '/');

        // отпровляем  пользователя на страницу user/dashboard
        header('Location:/user/dashboard_success');
    }

    public function updateUser($email) {
        $sql = 'UPDATE `users` SET `fio` = :fio, `pass` = :pass WHERE `users`. `email` = :email';
        $query = $this->_db->prepare($sql);

        $pass = password_hash($this->pass, PASSWORD_DEFAULT);

        $query->execute(['fio' => $this->fio, 'pass' => $pass, 'email' => $email]);
    }

}
