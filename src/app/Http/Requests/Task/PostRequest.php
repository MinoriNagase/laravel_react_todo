<?php declare(strict_types=1);

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
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
            'content' => ['required', 'string', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => 'タスク内容'
        ];
    }

    public function messages() :array
    {
        return [
            'content.required' => 'タスク内容を入力してください'
        ];
    }

    /**
     * タスク内容を取得する
     * @return string
     */
    public function getTaskContent() :string
    {
        return $this->input('content');
    }
}
