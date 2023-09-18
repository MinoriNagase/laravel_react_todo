<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TaskService implements TaskServiceInterface
{
    private TaskRepositoryInterface $taskRepository;

    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @inheritDoc
     */
    public function fetchIncomplete(): ?Collection
    {
        return $this->taskRepository->fetchIncomplete();
    }

    /**
     * @inheritDoc
     */
    public function create(string $content): Task
    {
        return DB::transaction(function () use ($content) {
            return $this->taskRepository->create($content);
        });
    }

    /**
     * @inheritDoc
     */
    public function updateToComplete(int $id): Task
    {
        return DB::transaction(function () use ($id) {
            return $this->taskRepository->updateToComplete($id);
        });
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $id): void
    {
        DB::transaction(function () use ($id) {
            $this->taskRepository->deleteById($id);
        });
    }
}
