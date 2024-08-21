<?php

namespace App\Http\Persisters;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

abstract class BasePersister
{
    public Collection $data;

    abstract protected function executePersist(): void;

    public function persist(array $processData = []): static
    {
        $this->setProcessData($processData);

        DB::transaction(function () {
            $this->executePersist();
        });

        return $this;
    }

    private function setProcessData(array $data): void
    {
        $this->data = collect($data);
    }
}
