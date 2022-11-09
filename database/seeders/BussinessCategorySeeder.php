<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessCategory;

class BussinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ["General","Education","Transportation","Finance","Communication"];
        BusinessCategory::query()->truncate();

        foreach($arr as $value)
        {
            $service = new BusinessCategory;
            $service->business_category_name = $value;
            $service->save();
        }
    }
}
