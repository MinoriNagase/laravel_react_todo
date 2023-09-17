<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskServiceInterface;
use App\Http\Resources\Task\IndexResource;

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
     * @return IndexResource
     */
    public function index(): IndexResource
    {
        $tasks = $this->taskService->fetchIncomplete();
        return new IndexResource($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
