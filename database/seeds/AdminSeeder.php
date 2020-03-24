<?php

use Illuminate\Database\Seeder;
use Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'ramadona.company.2019@gmail.com';
        $user->password = Hash::make(12345678);
        $user->save();

        if (Role::where('name','Admin')->count() > 0) {
            $user->assignRole('Admin');
        }else{
            Role::create(['name' => 'Admin']);
            $user->assignRole('Admin');
        }
    }
}
