<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface TaskServiceInterface
{
    /**
     * 未完了タスクを全て取得する
     * @return Collection|null
     */
    public function fetchIncomplete(): ?Collection;
}
