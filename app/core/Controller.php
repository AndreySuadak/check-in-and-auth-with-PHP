<?php
    class Controller {

        //создаем модель на осовании какого то класса
        protected function model($model) {
            require_once 'app/models/' . $model . '.php';
            return new $model();
        }

        //выводим страницу
        protected function view($view, $data = []) {
            require_once 'app/views/' . $view . '.php';
        }
    }
