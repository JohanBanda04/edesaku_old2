<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name'=>'Developer'],
            ['name'=>'Administrator'],
            ['name'=>'Village'],
        ];
        $roles = Role::get()->pluck('name')->toArray();
        $init_size = count($data);
        for ($i=0; $i < $init_size; $i++) { 
            if (in_array($data[$i]['name'], $roles)) {
                unset($data[$i]);
            }
        }
        Role::insert($data);
    }
}
