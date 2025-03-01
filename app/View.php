<?php

namespace App;

class View
{
    public function __construct(protected string $view, protected array $params = []) {}

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }
    public function render(): string
    {
        $viewPath = __DIR__ . "/views/{$this->view}.php";
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$this->view}");
        }
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $viewPath;
        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}
