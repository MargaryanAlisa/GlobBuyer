<?php

namespace App\Http\Transformers;

abstract  class BaseTransformer
{
    abstract public function simpleTransform($item): array;

    public function safeTransform($item, $method = 'simpleTransform'): ?array
    {
        return $item ? $this->{$method}($item) : null;
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = new static();

        if(method_exists($instance, $name . 'Transform')){
            return $instance->{$name . 'Transform'}(...$arguments);
        }
        return [];
    }
}
