<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateToCompleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
        ];
    }

    /**
     * 完了したタスクのIDを取得
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->route('task');
    }

    /**
     * パラメータIDのバリデーション
     * @return void
     */
    public function prepareForValidation(): void
    {
        $this->merge(['id' => $this->route('task')]);
    }
}
