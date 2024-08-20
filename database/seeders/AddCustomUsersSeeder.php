<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddCustomUsersSeeder extends Seeder
{
    const USERS_COUNT = 10;
    const SECRET_KEY_LENGTH = 10;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(self::USERS_COUNT)->create();

        $secretKeys = [];

        for ($i = 0; $i < self::USERS_COUNT; $i++) {
            $secretKeys[] = Str::random(self::SECRET_KEY_LENGTH);
        }

        $users = User::query()->where('is_admin', false)->get();

        foreach ($users as $key => $user)
        {
            /**
             * @var User $user
            */
            $user->secret_key = $secretKeys[$key];
            $user->password = Hash::make('password');
            $user->save();
        }
    }
}
