<?php

namespace App\Http\Transformers;

use Illuminate\Pagination\AbstractPaginator;

abstract  class BaseTransformer
{
    abstract public function simpleTransform($item): array;

    public function safeTransform($item, $method = 'simpleTransform'): ?array
    {
        return $item ? $this->{$method}($item) : null;
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = new static;

        if (method_exists($instance, 'transform'.ucfirst($name))) {

            return $instance->{'transform'.ucfirst($name)}(...$arguments);
        }

        return $instance->{$name.'Transform'}(...$arguments);
    }

    public function transformPagination($paginator, string $method = 'simpleTransform', ...$args): array
    {
        if (request()->has('withoutPagination')) {
            return $this->transformCollectionWithItems($paginator, $method, $args);
        }

        return [
            'meta' => array_merge(
                method_exists($paginator, 'total') ? ['total' => $paginator->total()] : [],
                [
                    'hasMorePages' => $paginator->hasMorePages(),
                    'hasPrevPages' => $paginator->currentPage() > 1,
                    'perPageCount' => (int) $paginator->perPage(),
                    'currentPage' => $paginator->currentPage(),
                    'isPaginatedData' => $paginator instanceof AbstractPaginator,
                ]),
            'items' => $this->transformArray($paginator->items(), $method, ...$args),
        ];
    }
    public function transformCollectionWithItems(\ArrayAccess $items, string $method = 'simpleTransform', ...$args): array
    {
        return [
            'items' => $this->transformCollection($items, $method, ...$args),
        ];
    }
    public function transformCollection(\ArrayAccess $items, string $method = 'simpleTransform', ...$args): array
    {
        return $items->map(function ($item) use ($method, $args) {
                return $this->{$method}($item, ...$args);
            })->toArray();
    }

    public function transformArray(array $items, string $method = 'simpleTransform', ...$args): array
    {
        return array_map(function ($item) use ($method, $args) {
            return $this->{$method}($item, ...$args);
        }, $items);
    }
}
