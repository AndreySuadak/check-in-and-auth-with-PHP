<?php
    class User extends Controller {

        public function reg() {
            $data = [];
            if(isset($_POST['email'])) {
                $user = $this->model('UserModel');//Определяем Модель
                // данные получаемые из формы
                $user->setData($_POST['email'], $_POST['login'], $_POST['fio'], $_POST['pass'], $_POST['re_pass']);
                // проверяем ошибка
                $isValid = $user->validForm();
                // Если данные вверны то загружаем в БД
                if($isValid == "Верно"){
                    $user->addUser();
                } else {
                    $data['message1'] = $isValid;
                }
            }
            $this->view('user/reg', $data);
        }

        public function auth() {
           $data = [];
           if(isset($_POST['email'])) {
               $user = $this->model('UserModel');
               $data['message'] = $user->auth($_POST['email'], $_POST['pass']);
           }
           $this->view('user/auth', $data);
        }

        public function dashboard() {
            $user = $this->model('UserModel');
            $data = $user->getUser();
            if(isset($_POST['exit'])) {
                $user->logOut();
                exit(); //благодоря этому код не будет дальше продолжаться
            }

            if(isset($_POST['fio'])) {
                $user->setData($data['email'], $data['login'], $_POST['fio'], $_POST['pass'], $_POST['re_pass']);
                $isValid = $user->validForm();
                if($isValid == "Верно"){
                    $user->updateUser($data['email']);
                } else {
                    $data['message1'] = $isValid;
                }
            }

            $this->view('user/dashboard', $data);
        }

        public function dashboard_success() {
            $this->view('user/dashboard_success');
        }

    }
