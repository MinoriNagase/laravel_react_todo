<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\PostRequest;
use App\Http\Requests\Task\UpdateToCompleteRequest;
use App\Http\Requests\Task\DestroyRequest;
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

    /**
     * タスクを完了させる
     * @param UpdateToCompleteRequest $request
     * @return JsonResponse
     */
    public function updateToComplete(UpdateToCompleteRequest $request): JsonResponse
    {
        $task = $this->taskService->updateToComplete($request->getTaskId());
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * 不要なタスクを削除する
     * @param DestroyRequest $request
     * @return JsonResponse
     */
    public function destroy(DestroyRequest $request): JsonResponse
    {
        $this->taskService->deleteById($request->getTaskId());
        return response()->json('タスクを削除しました', Response::HTTP_OK);
    }
}
