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
        return response()->json([
            'data' => $this->taskService->fetchIncomplete()
        ]);
    }

    /**
     * タスクを作成する
     * @param PostRequest $request
     * @return JsonResponse
     */
    public function store(PostRequest $request): JsonResponse
    {
        return response()->json([
            'data' => $this->taskService->create($request->getTaskContent())
        ], Response::HTTP_CREATED);
    }

    /**
     * タスクを完了させる
     * @param UpdateToCompleteRequest $request
     * @return JsonResponse
     */
    public function updateToComplete(UpdateToCompleteRequest $request): JsonResponse
    {
        return response()->json([
            'data' => $this->taskService->updateToComplete($request->getTaskId())
        ]);
    }

    /**
     * 不要なタスクを削除する
     * @param DestroyRequest $request
     * @return void
     */
    public function destroy(DestroyRequest $request): void
    {
        $this->taskService->deleteById($request->getTaskId());
    }
}
