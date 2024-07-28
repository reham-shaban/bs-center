<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaSeeder extends Seeder
{
    public function run()
    {
        $metas = [
            [
                'section' => 'Home Page',
                'meta_title_en' => 'Welcome to Our Home Page',
                'meta_description_en' => 'Discover the best content on our home page.',
                'meta_keywords_en' => 'home, welcome, content',
                'meta_robots_en' => 'index, follow',
                'meta_type_en' => 'website',
                'meta_site_name_en' => 'SiteName',
                'meta_site_en' => 'https://www.sitename.com',
                'meta_local_en' => 'en_US',
                'meta_card_en' => 'Summary of Home Page',

                'meta_title_ar' => 'مرحبا بكم في صفحتنا الرئيسية',
                'meta_description_ar' => 'اكتشف أفضل المحتويات في صفحتنا الرئيسية.',
                'meta_keywords_ar' => 'الصفحة الرئيسية, مرحبا, محتوى',
                'meta_robots_ar' => 'index, follow',
                'meta_type_ar' => 'website',
                'meta_site_name_ar' => 'اسم الموقع',
                'meta_site_ar' => 'https://www.sitename.com',
                'meta_local_ar' => 'ar_SA',
                'meta_card_ar' => 'ملخص الصفحة الرئيسية',
            ],
            [
                'section' => 'Categories',
                'meta_title_en' => 'Explore Our Categories',
                'meta_description_en' => 'Find a variety of categories to suit your needs.',
                'meta_keywords_en' => 'categories, explore, variety',
                'meta_robots_en' => 'index, follow',
                'meta_type_en' => 'website',
                'meta_site_name_en' => 'SiteName',
                'meta_site_en' => 'https://www.sitename.com',
                'meta_local_en' => 'en_US',
                'meta_card_en' => 'Summary of Categories',

                'meta_title_ar' => 'استكشاف فئاتنا',
                'meta_description_ar' => 'اكتشف مجموعة متنوعة من الفئات لتناسب احتياجاتك.',
                'meta_keywords_ar' => 'فئات, استكشاف, تنوع',
                'meta_robots_ar' => 'index, follow',
                'meta_type_ar' => 'website',
                'meta_site_name_ar' => 'اسم الموقع',
                'meta_site_ar' => 'https://www.sitename.com',
                'meta_local_ar' => 'ar_SA',
                'meta_card_ar' => 'ملخص الفئات',
            ],
        ];

        DB::table('metas')->insert($metas);
    }
}
