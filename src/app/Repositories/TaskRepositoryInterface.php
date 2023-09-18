<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Task;

interface TaskRepositoryInterface
{
    /**
     * 未完了タスクを全て取得する
     * @return Collection|null
     */
    public function fetchIncomplete(): ?Collection;

    /**
     * タスクを作成する
     * @param string $content
     * @return Task
     */
    public function create(string $content): Task;

    /**
     * タスクを完了させる
     * @param int $id
     * @return Task
     */
    public function updateToComplete(int $id): Task;
}
