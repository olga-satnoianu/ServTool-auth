<?php

namespace App\JsonApi\V1\Users;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class UserRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $user = $this->model();
        $uniqueEmail = Rule::unique('users', 'email');

        if($user) {
            $uniqueEmail->ignoreModel($user);
        }

        return [
            'app_user_id' => ['integer'],
            'name' => ['required', 'string'],
            'email' => ['required', ' string', $uniqueEmail],
            'password' => ['string'],
        ];
    }

}
