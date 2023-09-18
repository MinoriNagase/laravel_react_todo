<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\PostRequest;
use App\Services\TaskServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    private TaskServiceInterface $taskService;

    /**
     * @param TaskServiceInterface $taskService;
     */
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * 未完了タスクを全て取得する
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tasks = $this->taskService->fetchIncomplete();
        return response()->json($tasks, Response::HTTP_OK);
    }

    /**
     * タスクを作成する
     * @param PostRequest $request
     * @return JsonResponse
     */
    public function store(PostRequest $request): JsonResponse
    {
        $task = $this->taskService->create($request->getTaskContent());
        return response()->json($task, Response::HTTP_CREATED);
    }
}
