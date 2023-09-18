<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->taskRepository->create($content);
    }
}
