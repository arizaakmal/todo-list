<?php

class Controller
{
    public function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            throw new Exception("View file not found: " . $view);
        }
    }

    public function model($model)
    {
        $modelPath = __DIR__ . '/../models/' . $model . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model;
        } else {
            throw new Exception("Model file not found: " . $model);
        }
    }
}
