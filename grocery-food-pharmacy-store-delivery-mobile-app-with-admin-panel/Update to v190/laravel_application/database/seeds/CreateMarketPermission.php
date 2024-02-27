<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CreateMarketPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::table('role_has_permissions')->insert(array(
                240 =>
                    array(
                        'permission_id' => 31,
                        'role_id' => 3,
                    ),
                241 =>
                    array(
                        'permission_id' => 32,
                        'role_id' => 3,
                    ),
                242 =>
                    array(
                        'permission_id' => 31,
                        'role_id' => 4,
                    ),
                243 =>
                    array(
                        'permission_id' => 32,
                        'role_id' => 4,
                    ),
            ));

        }catch (Exception $exception){ }
    }
}
