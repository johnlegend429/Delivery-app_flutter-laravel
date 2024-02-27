<?php
/**
 * File name: DatabaseSeeder.php
 * Last modified: 2020.05.03 at 13:40:04
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CouponPermission::class);
        $this->call(SlidesSeeder::class);
    }
}
