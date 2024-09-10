<?php

namespace App\Http\Executor;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

abstract class BaseExecutor
{
    public Collection $data;

    abstract protected function executeAction(): void;

    public function execute(array $processData = []): static
    {
        $this->setProcessData($processData);

        DB::transaction(function () {
            $this->executeAction();
        });

        return $this;
    }

    private function setProcessData(array $data): void
    {
        $this->data = collect($data);
    }
}
