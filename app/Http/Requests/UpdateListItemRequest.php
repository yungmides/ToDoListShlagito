<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateListItemRequest extends FormRequest
{
    public $redirectRoute = 'to_do_lists.index';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $listItem = $this->route("list_item");
        return $listItem && Auth::id() === $listItem->toDoList->user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "item_name" => "required|string|max:255",
            "item_content" => "required|string|max:1000",
        ];
    }
}
