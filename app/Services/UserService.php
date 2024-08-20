<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    public function findByData(array $data)
    {
        $query = User::query();

        foreach ($data as $key => $value)
        {
            $query->where($key, $value);
        }

        $user = $query->first();

        return $user;
    }

    public function getUsers()
    {
        return User::query()->where('is_admin', false)->paginate(10);
    }
}
