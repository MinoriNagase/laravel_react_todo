<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    /**
     * 未完了タスクを全て取得する
     * @return Collection|null
     */
    public function fetchIncomplete(): ?Collection;
}
