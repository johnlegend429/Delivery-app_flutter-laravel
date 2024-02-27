<?php
/**
 * File name: SlidesSeeder.php
 * Last modified: 2020.09.12 at 20:01:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('slides')->delete();

        factory(\App\Models\Slide::class, 5)->create();
        try {
            \DB::table('permissions')->insert(array(

                array(
                    'name' => 'slides.index',
                    'guard_name' => 'web',
                    'created_at' => '2020-08-23 14:58:02',
                    'updated_at' => '2020-08-23 14:58:02',
                    'deleted_at' => NULL,
                ),

                array(
                    'name' => 'slides.create',
                    'guard_name' => 'web',
                    'created_at' => '2020-08-23 14:58:02',
                    'updated_at' => '2020-08-23 14:58:02',
                    'deleted_at' => NULL,
                ),

                array(
                    'name' => 'slides.store',
                    'guard_name' => 'web',
                    'created_at' => '2020-08-23 14:58:02',
                    'updated_at' => '2020-08-23 14:58:02',
                    'deleted_at' => NULL,
                ),

                array(
                    'name' => 'slides.edit',
                    'guard_name' => 'web',
                    'created_at' => '2020-08-23 14:58:02',
                    'updated_at' => '2020-08-23 14:58:02',
                    'deleted_at' => NULL,
                ),

                array(
                    'name' => 'slides.update',
                    'guard_name' => 'web',
                    'created_at' => '2020-08-23 14:58:02',
                    'updated_at' => '2020-08-23 14:58:02',
                    'deleted_at' => NULL,
                ),

                array(
                    'name' => 'slides.destroy',
                    'guard_name' => 'web',
                    'created_at' => '2020-08-23 14:58:02',
                    'updated_at' => '2020-08-23 14:58:02',
                    'deleted_at' => NULL,
                ),
            ));
        } catch (Exception $exception) {
        }
        try {
            \DB::table('role_has_permissions')->insert(array(
                array(
                    'permission_id' => 189,
                    'role_id' => 2,
                ),
                array(
                    'permission_id' => 190,
                    'role_id' => 2,
                ),
                array(
                    'permission_id' => 191,
                    'role_id' => 2,
                ),
                array(
                    'permission_id' => 192,
                    'role_id' => 2,
                ),
                array(
                    'permission_id' => 193,
                    'role_id' => 2,
                ),
                array(
                    'permission_id' => 194,
                    'role_id' => 2,
                ),

            ));
        } catch (Exception $exception) {
        }
        try {
            \DB::table('app_settings')->insert(array(
                array(
                    'key' => 'home_section_1',
                    'value' => 'search',
                ),
                array(
                    'key' => 'home_section_2',
                    'value' => 'slider',
                ),
                array(
                    'key' => 'home_section_3',
                    'value' => 'top_markets_heading',
                ),
                array(
                    'key' => 'home_section_4',
                    'value' => 'top_markets',
                ),
                array(
                    'key' => 'home_section_5',
                    'value' => 'trending_week_heading',
                ),
                array(
                    'key' => 'home_section_6',
                    'value' => 'trending_week',
                ),
                array(
                    'key' => 'home_section_7',
                    'value' => 'categories_heading',
                ),
                array(
                    'key' => 'home_section_8',
                    'value' => 'categories',
                ),
                array(
                    'key' => 'home_section_9',
                    'value' => 'popular_heading',
                ),
                array(
                    'key' => 'home_section_10',
                    'value' => 'popular',
                ),
                array(
                    'key' => 'home_section_11',
                    'value' => 'recent_reviews_heading',
                ),
                array(
                    'key' => 'home_section_12',
                    'value' => 'recent_reviews',
                )
            ));
        } catch (Exception $exception) {
        }
    }
}
