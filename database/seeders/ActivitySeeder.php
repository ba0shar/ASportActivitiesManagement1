<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $activities = [
            [
                'name' => 'كرة القدم',
                'category' => 'رياضة',
                'price' => 'مجاني',
                'description' => 'مباراة كرة قدم ترفيهية',
                'start_time' => '10:00',
                'end_time' => '12:00',
                'location' => 'الملعب الرئيسي',
                'logo' => 'activities/1m3.jpg',
            ],
            [
                'name' => 'كرة السلة',
                'category' => 'رياضة',
                'price' => '50 ريال',
                'description' => 'بطولة كرة سلة للهواة',
                'start_time' => '14:00',
                'end_time' => '16:00',
                'location' => 'الصالة الرياضية',
                'logo' => 'activities/m7.jpg',
            ],
            [
                'name' => 'ورشة رسم',
                'category' => 'فن',
                'price' => '30 ريال',
                'description' => 'ورشة تعليم الرسم بالألوان الزيتية',
                'start_time' => '15:00',
                'end_time' => '17:00',
                'location' => 'قاعة الفنون',
                'logo' => 'activities/Dhold.webp',
            ],
            [
                'name' => 'يوغا الصباح',
                'category' => 'صحة',
                'price' => 'مجاني',
                'description' => 'جلسة يوغا للاسترخاء',
                'start_time' => '06:00',
                'end_time' => '07:00',
                'location' => 'الحديقة',
                'logo' => 'activities/im1.jpg',
            ],
            [
                'name' => 'دورة برمجة',
                'category' => 'تعليم',
                'price' => '100 ريال',
                'description' => 'دورة مكثفة في برمجة الويب',
                'start_time' => '09:00',
                'end_time' => '12:00',
                'location' => 'المعمل التقني',
                'logo' => 'activities/logo.jpg',
            ],
            [
                'name' => 'ورشة تصوير',
                'category' => 'فن',
                'price' => '40 ريال',
                'description' => 'أساسيات التصوير الفوتوغرافي',
                'start_time' => '13:00',
                'end_time' => '15:00',
                'location' => 'الاستوديو',
                'logo' => 'activities/m4.jpg',
            ],
            [
                'name' => 'تدريب سباحة',
                'category' => 'رياضة',
                'price' => '60 ريال',
                'description' => 'تعلم السباحة للمبتدئين',
                'start_time' => '08:00',
                'end_time' => '10:00',
                'location' => 'المسبح الأولمبي',
                'logo' => 'activities/m9.jpg',
            ],
            [
                'name' => 'محاضرة تطوير الذات',
                'category' => 'تطوير',
                'price' => 'مجاني',
                'description' => 'نصائح لتعزيز الثقة بالنفس',
                'start_time' => '17:00',
                'end_time' => '19:00',
                'location' => 'القاعة الكبرى',
                'logo' => 'activities/mask.jpg',
            ],
            [
                'name' => 'بطولة الشطرنج',
                'category' => 'رياضة',
                'price' => '20 ريال',
                'description' => 'بطولة تنافسية لمحبي الشطرنج',
                'start_time' => '18:00',
                'end_time' => '21:00',
                'location' => 'المكتبة',
                'logo' => 'activities/3Dd.png',
            ],
            [
                'name' => 'عرض مسرحي',
                'category' => 'فن',
                'price' => '70 ريال',
                'description' => 'عرض مسرحي للأطفال',
                'start_time' => '19:00',
                'end_time' => '21:00',
                'location' => 'المسرح الرئيسي',
                'logo' => 'activities/1m2.jpg',
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create([
                'name' => $activity['name'],
                'logo' => $activity['logo'],
                'category' => $activity['category'],
                'price' => $activity['price'],
                'description' => $activity['description'],
                'start_time' => $activity['start_time'],
                'end_time' => $activity['end_time'],
                'location' => $activity['location'],
            ]);
        }
    }
}
