<?php

namespace App\Http\DataProviders;

abstract class BaseDataProvider
{
    const PER_PAGE_COUNT = 15;

    protected $builder;
    protected $request;
    abstract protected function setBuilder();

    public function getBuilder()
    {
        return $this->builder;
    }

    protected function getPerPageCount(): int
    {
        return self::PER_PAGE_COUNT;
    }
    public function getData()
    {
//        if ($this->request->withoutPagination) {
//            return $this->getBuilder()->get();
//        }

//        return $this->request->withCount ?
//            $this->getBuilder()->paginate($this->getPerPageCount(), ['*'], 'page', $this->getCurrentPage()) :
//            $this->getBuilder()->simplePaginate($this->getPerPageCount(), ['*'], 'page', $this->getCurrentPage());

        return $this->getBuilder()->simplePaginate($this->getPerPageCount(), ['*'], 'page');
    }
}
