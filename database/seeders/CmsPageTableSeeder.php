<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cmsPageRecord =[
            ['id'=>1, 'title'=>'About Us', 'description'=>'Content is coming soon', 'url'=>'about-us', 'meta_title'=>'About Us', 'meta_description'=>'About US Content', 'meta_keywords'=>'about us, about', 'status'=>1],

            ['id'=>2, 'title'=>'Term and Condition', 'description'=>'Content is coming soon', 'url'=>'term-condition', 'meta_title'=>'Term and condition', 'meta_description'=>'Term and condition Content', 'meta_keywords'=>'term and condition, term, condition,', 'status'=>1],

            ['id'=>3, 'title'=>'Privacy policy', 'description'=>'Content is coming soon', 'url'=>'privacy-policy', 'meta_title'=>'About Us', 'meta_description'=>'Privacy policy content Content', 'meta_keywords'=>'privacy policy', 'status'=>1]
        ];
        CmsPage::insert($cmsPageRecord);
    }
}
