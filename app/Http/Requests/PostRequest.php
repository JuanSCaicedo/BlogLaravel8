<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts', // Corrección de la regla unique
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if ($post) {
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        // Verificar si el usuario tiene permiso de publicar posts
        if ($this->status == 2) {
            if (!Gate::allows('admin.posts.publish')) {
                $rules['status'] = 'required|in:1'; // Establecer el estado como Borrador si el usuario no tiene el permiso
            } else {
                // Si el usuario tiene el permiso, validar los campos adicionales para publicar
                $rules = array_merge($rules, [
                    'category_id' => 'required',
                    'tags' => 'required',
                    'extract' => 'required',
                    'body' => 'required'
                ]);
            }
        }

        return $rules;
    }
}
