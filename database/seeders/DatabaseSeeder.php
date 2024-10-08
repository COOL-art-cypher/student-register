<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Notice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'SoeZayYarKyaw',
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);

        User::create([
            'name' => 'စိုးဇေယျာကျော်',
            'email' => 'student1@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၇၆၈၈၉",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'နိုင်၀င်းကို',
            'email' => 'student13@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၅၇၉၁၀",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ဟိန်းမင်းထွန်း',
            'email' => 'student2@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၃၈၆၂၁",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'သော်ဇင်ဖြိုး',
            'email' => 'student3@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၇၈၃၈၄",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'စုစု',
            'email' => 'student4@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၅၇၆၉၀",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ခင်ခင်',
            'email' => 'student5@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၈၂၇၁၆",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ဖြူဖြူ',
            'email' => 'student6@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၃၂၉၄၁",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ဇင်မင်းထွဠ်',
            'email' => 'student8@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၆၄၇၉၈",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ရဲမြတ်အောင်',
            'email' => 'student9@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၅၃၃၈၅",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ဖြိုးမင်း',
            'email' => 'student10@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၂၂၆၄၈",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ဟိန်းလင်းသန့်',
            'email' => 'student11@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၃၈၉၀၅",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ပိုင်စိုးလင်း',
            'email' => 'student12@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၄၆၃၄၇",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ထက်ဝေယံဦး',
            'email' => 'student51@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၅၈၂၄၉",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'တင်သန့်လွင်',
            'email' => 'student14@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၈၂၃၅၆",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);
        User::create([
            'name' => 'ထက်အောင်ကျော်',
            'email' => 'student15@gmail.com',
            'role'=>'user',
            //'sch_no'=>"၀၇၆၃၂၉",
            'password'=>bcrypt('password'),
            'image' => 'default.jpg'
        ]);


        AcademicYear::create([
            "name"=>"ပထမနှစ်",
            "enrollment"=>35000

        ]);

        AcademicYear::create([
            "name"=>"ဒုတိယနှစ်",
            "enrollment"=>38000

        ]);
        AcademicYear::create([
            "name"=>"တတိယနှစ်",
            "enrollment"=>40000

        ]);
        AcademicYear::create([
            "name"=>"စတုတ္ထနှစ်",
            "enrollment"=>45000

        ]);
        AcademicYear::create([
            "name"=>"ပဉ္စမနှစ်",
            "enrollment"=>55000

        ]);
        Notice::create([
            "image"=>"default.jpg",
            "text"=>"ကွန်ပျူတာတက္ကသိုလ်(ဟင်္သာတ)၂၀၂၃-၂၀၂၄ ပညာသင်နှစ်ပထမနှစ်၊ ဒုတိယနှစ်၊ တတိယနှစ်၊ စတုတ္ထနှစ်နှင့် D.C.Sc.(ပထမနှစ်ဝက်နှင့် ဒုတိယနှစ်ဝက်)သင်တန်းများအားလုံးကျောင်းအပ်စတင်လက်ခံမည့်ရက်		-၂၇.၅.၂၀၂၄ (၂ပတ်အတွင်းကျောင်းအပ်ရန်)
            ကျောင်းစတင်ဖွင့်လှစ်မည့်ရက်	-၃.၆.၂၀၂၄"
        ]);
        Notice::create([
            "image"=>"default.jpg",
            "text"=>"တတိယနှစ်(ပထမနှစ်ဝက်)သင်တန်း ကျောင်းအပ်ရန်အတွက်
    လိုအပ်သောစာရွက်စာတမ်းများ
    ၁။ တက္ကသိုလ်ဝင်စာမေးပွဲအောင်လက်မှတ်မိတ္တူ (၁)စုံ
    ၂။ အိမ်ထောင်စုစာရင်းမိတ္တူ(၁)စုံ
    ၃။ (၆)လအတွင်းရိုက်ကူးထားသောပတ်စပို့ဓါတ်ပုံ(အင်္ကျီအဖြူ)	(၅)ပုံ
    ၄။ မှတ်ပုံတင်မိတ္တူ (ကျောင်းသားနှင့်မိဘ(၂)ဦး)(၁)စုံ
    ၅။ ကိုဗစ်ကာကွယ်ဆေးထိုးမှတ်တမ်းမိတ္တူ (၁)စုံ"
        ]);
        Notice::create([
            "image"=>"default.jpg",
            "text"=>"ကျောင်းအပ်ရန်အတွက်လိုအပ်သောစာရွက်စာတမ်းများ(ဒုတိယနှစ်မှ နောက်ဆုံးနှစ်ထိ)

    ၁။ သန်းခေါင်စာရင်းမိတ္တူ(၁)စုံ
    ၂။ (၆)လအတွင်းရိုက်ကူးထားသောပတ်စပို့ဓါတ်ပုံ(အင်္ကျီအဖြူ)	(၅)ပုံ
    ၃။ မှတ်ပုံတင်မိတ္တူ (ကျောင်းသားနှင့်မိဘ(၂)ဦး)(၁)စုံ
    ၄။ ကိုဗစ်ကာကွယ်ဆေးထိုးမှတ်တမ်း"
        ]);
        Notice::create([
            "image"=>"default.jpg",
            "text"=>"Web Development Training သင်တန်းအား(၁.၈.၂၀၂၄)ရက်နေ့မှစ၍ညနေ(၄း၀၀ )နာရီမှ(၅း၃၀)နာရီအထိဖွင့်လှစ်မည်ဖြစ်ပါသဖြင့်သင်တန်းရေးရာဌာနသို့( ၃၁.၇.၂၀၂၄)ရက်နေ့နောက်ဆုံးထား၍စာရင်းပေးသွင်းနိုင်ပါသည်"
        ]);


    }
}
