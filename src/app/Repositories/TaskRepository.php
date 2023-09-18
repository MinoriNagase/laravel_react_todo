<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    private Task $task;

    private static int $STATUS_INCOMPLETE = 0;
    private static int $STATUS_COMPLETE = 1;

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

    /**
     * @inheritDoc
     */
    public function create(string $content): Task
    {
        return $this->task->create(['content' => $content]);
    }

    /**
     * @inheritDoc
     */
    public function updateToComplete(int $id): Task
    {
        $task = $this->task->find($id);
        $task->update(['status' => self::$STATUS_COMPLETE]);
        return $task;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $id): void
    {
        $this->task->destroy($id);
    }
}


