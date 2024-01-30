<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'taskname' => 'required',
            'taskdetail' => 'required',
            'taskduedate' => 'required|date',
            'taskprogress' => 'required',
        ];
    }
    public function attributes(): array
    {
        return [
            'taskname' => 'Task Name',
            'taskdetail' => 'Task Detail',
            'taskduedate' => 'Date',
            'taskprogress' => 'Status',
        ];
    }
}
