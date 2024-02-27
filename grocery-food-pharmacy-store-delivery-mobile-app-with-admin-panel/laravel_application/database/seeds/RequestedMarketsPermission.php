<?php
/**
 * File name: RequestedMarketsPermission.php
 * Last modified: 2020.08.03 at 22:23:19
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

use Illuminate\Database\Seeder;

class RequestedMarketsPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::table('permissions')->insert(array(
                0 =>
                    array(
                        'id' => 176,
                        'name' => 'requestedMarkets.index',
                        'guard_name' => 'web',
                        'created_at' => '2020-08-13 14:58:02',
                        'updated_at' => '2020-08-13 14:58:02',
                        'deleted_at' => NULL,
                    ),
            ));
        } catch (Exception $e) {
        }
        try {
            \DB::table('role_has_permissions')->insert(array(
                238 =>
                    array(
                        'permission_id' => 176,
                        'role_id' => 2,
                    ),
                239 =>
                    array(
                        'permission_id' => 176,
                        'role_id' => 3,
                    ),
                240 =>
                    array(
                        'permission_id' => 176,
                        'role_id' => 4,
                    ),
                241 =>
                    array(
                        'permission_id' => 176,
                        'role_id' => 5,
                    ),
                242 =>
                    array(
                        'permission_id' => 3,
                        'role_id' => 5,
                    ),
                243 =>
                    array(
                        'permission_id' => 4,
                        'role_id' => 5,
                    ),
                244 =>
                    array(
                        'permission_id' => 3,
                        'role_id' => 4,
                    ),
                245 =>
                    array(
                        'permission_id' => 4,
                        'role_id' => 4,
                    ),
            ));
        } catch (Exception $e) {
        }
    }
}
