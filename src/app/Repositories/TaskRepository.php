<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    private Task $task;

    private static int $STATUS_INCOMPLETE = 0;

    /**
     * @param Task $task;
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @inheritDoc
     */
    public function fetchIncomplete(): ?Collection
    {
        return $this->task->where('status', self::$STATUS_INCOMPLETE)->get();
    }
}


