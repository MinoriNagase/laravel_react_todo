<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) :array
    {
        return $this->resource->map(function ($task) {
            return [
                'id' => $task->id,
                'content' => $task->content,
                'status' => $task->status,
            ];
        })->all();
    }
}
