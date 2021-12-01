<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crea un rol
        $role = Role::create(['name' => 'root','description'=>'Rol Root Administrador']);
        //crea permisos para administrar usuarios
        Permission::create(['name' => 'user_read','description'=>'Permite leer Usuarios']);
        Permission::create(['name' => 'user_create','description'=>'Permite crear Usuarios']);
        Permission::create(['name' => 'user_update','description'=>'Permite actualizar Usuarios']);
        Permission::create(['name' => 'user_delete','description'=>'Permite eliminar usuarios']);

        $role->givePermissionTo(['user_create','user_read','user_update','user_delete']);

        $user = User::create([
            'name' => 'Osvaldo Alvarado',
            'email' => 'programador2@gmail.com',
            'password' => bcrypt('password')
        ]);

        //$user->assignRole('root');

        $user = User::create([
            'name' => 'Roberto Sierra',
            'email' => 'programador1@gmail.com',
            'password' => bcrypt('password')
        ]);

        //$user->assignRole('root');
    }
}
