<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once 'app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once 'app/models/' . $model . '.php';
        return new $model;
    }
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
