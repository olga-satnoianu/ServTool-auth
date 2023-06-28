<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new user repository instance.
     *
     * @param \App\Models\User
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve or create a new resource owner.
     *
     * @param array  $attributes
     * @return \App\Models\User
     */
    public function findOrCreateSocialUser(array $attributes)
    {
        $provider_id = -1;
        if(isset($attributes['id']))
        {
            $provider_id = $attributes['id'];
        }
        else if(isset($attributes['sub']))
        {
            $provider_id = $attributes['sub'];
        }

        $name = "";
        if(isset($attributes['userPrincipalName']))
        {
            $name = $attributes['userPrincipalName'];
        }
        else if(isset($attributes['name']))
        {
            $name = $attributes['name'];
        }

        $email = "";
        if(isset($attributes['userPrincipalName']))
        {
            $email = $attributes['userPrincipalName'];
        }
        else if(isset($attributes['email']))
        {
            $email = $attributes['email'];
        }

        return $this->model->firstOrCreate(
            ['provider_id' => $provider_id],
            [
                'name' => $name,
                'email' => $email,
            ]
        );
    }
}
