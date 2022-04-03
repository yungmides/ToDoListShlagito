<?php

namespace App\Http\Requests;

use App\Models\ToDoList;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateToDoListRequest extends FormRequest
{
    public $redirectRoute = 'to_do_lists.index';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $toDoList = $this->route('to_do_list');
        return $toDoList && Auth::id() === $toDoList->user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'list_title' => 'required|string|max:50',
            'description' => 'required|string'
        ];
    }
}
