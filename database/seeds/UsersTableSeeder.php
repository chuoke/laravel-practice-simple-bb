<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)
                    ->times(10)
                    ->make();

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::first();

        $user->name = 'Chuoke';
        $user->email = 'chuoke@example.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
