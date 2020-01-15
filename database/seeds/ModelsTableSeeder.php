<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([

            //Планшеты

            [
                'name' => 'Mi Pad 4 4/64GB LTE Black',
                'brand_id' => 11,
                'device_id' => 2
            ],
            [
                'name' => 'iPad 2018 32GB Wi-Fi Space Gray (MR7F2)',
                'brand_id' => 1,
                'device_id' => 2
            ],
            [
                'name' => 'Mi Pad 4 4/64GB Wi-Fi Black',
                'brand_id' => 11,
                'device_id' => 2
            ],
            [
                'name' => 'MediaPad T5 10 3/32GB LTE Black (53010DHM)',
                'brand_id' => 4,
                'device_id' => 2
            ],
            [
                'name' => 'iPad Pro 11 2018 Wi-Fi 64GB Space Gray (MTXN2)',
                'brand_id' => 1,
                'device_id' => 2
            ],
            [
                'name' => 'Galaxy Tab S4 10.5 64GB LTE Black (SM-T835NZKA)',
                'brand_id' => 2,
                'device_id' => 2
            ],
            [
                'name' => 'Galaxy Tab A 10.1 (SM-T580NZKA) Black',
                'brand_id' => 2,
                'device_id' => 2
            ],
            [
                'name' => 'ZenPad 10 2/32GB WiFi Grey (Z301M-1H033A)',
                'brand_id' => 7,
                'device_id' => 2
            ],
            [
                'name' => 'MeMO Pad FHD 10 16GB LTE Dark Blue (ME302KL-K005)',
                'brand_id' => 7,
                'device_id' => 2
            ],
            [
                'name' => 'TB-X605L (ZA490005UA)',
                'brand_id' => 9,
                'device_id' => 2
            ],
            [
                'name' => 'Tab E10 TB-X104F 16GB Slate Black (ZA470000UA)',
                'brand_id' => 9,
                'device_id' => 2
            ],
            [
                'name' => 'Tab 3 Plus TB-8703X 16GB LTE Deep Blue (ZA230002UA)',
                'brand_id' => 9,
                'device_id' => 2
            ],
            [
                'name' => 'ZenPad M 8 16GB (Z380M-6A035A) Dark Gray',
                'brand_id' => 7,
                'device_id' => 2
            ],
            [
                'name' => 'iPad Pro 9.7 Wi-FI 128GB Space Gray (MLMV2)',
                'brand_id' => 1,
                'device_id' => 2
            ],
            [
                'name' => 'Tablet 10 10.1 FHD Black (20L3000KRT)',
                'brand_id' => 9,
                'device_id' => 2
            ],
            [
                'name' => 'Trek 2 HD LTE',
                'brand_id' => 5,
                'device_id' => 2
            ],
            [
                'name' => 'DROID XYBOARD 8.2 (MZ609)',
                'brand_id' => 8,
                'device_id' => 2
            ],
            [
                'name' => 'V55',
                'brand_id' => 5,
                'device_id' => 2
            ],


            //Смартфоны
            [
                'name' => 'iPhone X 64GB Space Gray (MQAC2)',
                'brand_id' => 1,
                'device_id' => 1
            ],
            [
                'name' => 'iPhone 7 32GB Black (MN8X2)',
                'brand_id' => 1,
                'device_id' => 1
            ],
            [
                'name' => 'iPhone 7 Plus 128GB Black (MN4M2)',
                'brand_id' => 1,
                'device_id' => 1
            ],
            [
                'name' => 'iPhone XR 128GB Black (MRY92)',
                'brand_id' => 1,
                'device_id' => 1
            ],
            [
                'name' => 'iPhone 6 32GB Gold (MQ3E2)',
                'brand_id' => 1,
                'device_id' => 1
            ],
            [
                'name' => 'iPhone 6 Plus 64GB (Silver)',
                'brand_id' => 1,
                'device_id' => 1
            ],
            [
                'name' => 'P smart 2019 3/64GB Aurora Blue (51093FTA)',
                'brand_id' => 4,
                'device_id' => 1
            ],
            [
                'name' => 'P20 4/128GB Pink Gold (51092FFC)',
                'brand_id' => 4,
                'device_id' => 1
            ],
            [
                'name' => 'P10 64GB Gold',
                'brand_id' => 4,
                'device_id' => 1
            ],
            [
                'name' => 'Mate 20 DS 6/64GB Black',
                'brand_id' => 4,
                'device_id' => 1
            ],
            [
                'name' => 'Ascend P6-U06 (Black)',
                'brand_id' => 4,
                'device_id' => 1
            ],
            [
                'name' => 'K5 Pro 4/64GB Black',
                'brand_id' => 9,
                'device_id' => 1
            ],
            [
                'name' => 'K6 Gold (PA530181UA)',
                'brand_id' => 9,
                'device_id' => 1
            ],
            [
                'name' => 'A916 (Black)',
                'brand_id' => 9,
                'device_id' => 1
            ],
            [
                'name' => 'Vibe Shot Z90-7 (Graphite Gray)',
                'brand_id' => 9,
                'device_id' => 1
            ],
            [
                'name' => 'A628T (White)',
                'brand_id' => 9,
                'device_id' => 1
            ],
            [
                'name' => 'M6 Note 3/32GB Silver',
                'brand_id' => 12,
                'device_id' => 1
            ],
            [
                'name' => 'M8c 2/16GB Black',
                'brand_id' => 12,
                'device_id' => 1
            ],
            [
                'name' => '15 4/64GB Black',
                'brand_id' => 12,
                'device_id' => 1
            ],
            [
                'name' => 'Note 8 4/64GB Blue',
                'brand_id' => 12,
                'device_id' => 1
            ],
            [
                'name' => 'M6s 3/64GB Silver',
                'brand_id' => 12,
                'device_id' => 1
            ],
            [
                'name' => 'Galaxy S8 64GB Black (SM-G950FZKD)',
                'brand_id' => 2,
                'device_id' => 1
            ],
            [
                'name' => 'Galaxy A7 2018 4/64GB Gold (SM-A750FZDU)',
                'brand_id' => 2,
                'device_id' => 1
            ],
            [
                'name' => 'Galaxy Note 9 N9600 6/128GB Alpine White',
                'brand_id' => 2,
                'device_id' => 1
            ],
            [
                'name' => 'Galaxy J5 2016 Black (SM-J510HZKD)',
                'brand_id' => 2,
                'device_id' => 1
            ],
            [
                'name' => 'Galaxy A7 2018 4/128GB Black',
                'brand_id' => 2,
                'device_id' => 1
            ],
            [
                'name' => 'Xperia XZ1 Compact Black',
                'brand_id' => 6,
                'device_id' => 1
            ],
            [
                'name' => 'Xperia XA2 Ultra H4213 Black',
                'brand_id' => 6,
                'device_id' => 1
            ],
            [
                'name' => 'Xperia X Dual F5122 (White)',
                'brand_id' => 6,
                'device_id' => 1
            ],
            [
                'name' => 'Xperia XZ1 Compact Silver',
                'brand_id' => 6,
                'device_id' => 1
            ],
            [
                'name' => 'Xperia Z3 D6603 (Copper)',
                'brand_id' => 6,
                'device_id' => 1
            ],
            [
                'name' => 'Redmi Note 7 4/64GB Black',
                'brand_id' => 11,
                'device_id' => 1
            ],
            [
                'name' => 'Mi 8 Lite 4/64GB Blue',
                'brand_id' => 11,
                'device_id' => 1
            ],
            [
                'name' => 'Mi Note 3 6/64GB Black',
                'brand_id' => 11,
                'device_id' => 1
            ],
            [
                'name' => 'Mi Mix 2 8/128GB Special Edition White',
                'brand_id' => 11,
                'device_id' => 1
            ],
            [
                'name' => 'Redmi 5 3/32GB Gold',
                'brand_id' => 11,
                'device_id' => 1
            ],
            [
                'name' => 'Blade A522 2/16GB Black',
                'brand_id' => 5,
                'device_id' => 1
            ],
            [
                'name' => 'Blade A6 Gold',
                'brand_id' => 5,
                'device_id' => 1
            ],
            [
                'name' => 'Nubia M2 Lite 4/64GB Black/Gold',
                'brand_id' => 5,
                'device_id' => 1
            ],
            [
                'name' => 'Blade L110 Yellow',
                'brand_id' => 5,
                'device_id' => 1
            ],
            [
                'name' => 'Nubia N1 Lite 2/16GB Black/Gold',
                'brand_id' => 5,
                'device_id' => 1
            ],


            //Ноутбуки
            [
                'name' => 'MacBook Air 13" Space Gray 2018 (MRE82)',
                'brand_id' => 1,
                'device_id' => 3
            ],
            [
                'name' => 'MacBook Pro 13" Space Gray (MLL42) 2016',
                'brand_id' => 1,
                'device_id' => 3
            ],
            [
                'name' => 'MacBook Pro 15" with Retina display (MGXC2) 2014',
                'brand_id' => 1,
                'device_id' => 3
            ],
            [
                'name' => 'MacBook Air 13" (MQD52) 2017',
                'brand_id' => 1,
                'device_id' => 3
            ],
            [
                'name' => 'MacBook Pro 13" Silver (Z0UQ00006) 2017',
                'brand_id' => 1,
                'device_id' => 3
            ],
            [
                'name' => 'ROG Strix Scar Edition GL703GE (GL703GE-IS74)',
                'brand_id' => 7,
                'device_id' => 3
            ],
            [
                'name' => 'R414UV (R414UV-FA266D)',
                'brand_id' => 7,
                'device_id' => 3
            ],
            [
                'name' => 'VivoBook S14 S410UN (S410UN-NS74)',
                'brand_id' => 7,
                'device_id' => 3
            ],
            [
                'name' => 'TUF Gaming FX705GM (FX705GM-EW126)',
                'brand_id' => 7,
                'device_id' => 3
            ],
            [
                'name' => 'FX73VE (FX73VE-WH71)',
                'brand_id' => 7,
                'device_id' => 3
            ],
            [
                'name' => 'IdeaPad 330-15IKBR (81DE019FRA)',
                'brand_id' => 9,
                'device_id' => 3
            ],
            [
                'name' => 'Flex 5 15 (81CA000HUS)',
                'brand_id' => 9,
                'device_id' => 3
            ],
            [
                'name' => 'Yoga 730-15IKB (81CU000UUS)',
                'brand_id' => 9,
                'device_id' => 3
            ],
            [
                'name' => 'Legion Y720-15 (80VR00J0US)',
                'brand_id' => 9,
                'device_id' => 3
            ],
            [
                'name' => 'IdeaPad 530S-14ARR Liquid Blue (81H1004KRA)',
                'brand_id' => 9,
                'device_id' => 3
            ],
            [
                'name' => 'Mi Gaming Laptop 15.6 (JYU4088CN)',
                'brand_id' => 11,
                'device_id' => 3
            ],
            [
                'name' => 'Mi Gaming Laptop 15.6 (i5 8GB 1T+256GB 1060 6G)',
                'brand_id' => 11,
                'device_id' => 3
            ],
            [
                'name' => 'Mi Notebook Air 12" Silver (JYU4047CN)',
                'brand_id' => 11,
                'device_id' => 3
            ],
            [
                'name' => 'Mi Notebook Air 13.3 i5 8/256 2017 Dark Grey',
                'brand_id' => 11,
                'device_id' => 3
            ],
            [
                'name' => 'Mi Gaming Laptop 15.6 (i7 8GB 1T+128GB 1060 6G)',
                'brand_id' => 11,
                'device_id' => 3
            ],



            //Моноблок


            [
                'name' => 'iMac 21.5" Retina 4K Middle 2017 (MNDY2)',
                'brand_id' => 1,
                'device_id' => 4
            ],
            [
                'name' => 'iMac 27" with Retina 5K display 2017 (MNE925)',
                'brand_id' => 1,
                'device_id' => 4
            ],
            [
                'name' => 'Mac mini Late 2018 (MRTR37/Z0W2002JQ)',
                'brand_id' => 1,
                'device_id' => 4
            ],
            [
                'name' => 'iMac 27" Retina 5K Middle 2017 (MNEA26)',
                'brand_id' => 1,
                'device_id' => 4
            ],
            [
                'name' => 'Mac mini Late 2018 (MRTT5/Z0W20003V)',
                'brand_id' => 1,
                'device_id' => 4
            ],
            [
                'name' => 'Vivo AiO V222GA (V222GAK-WA003D/90PT0212-M00780)',
                'brand_id' => 7,
                'device_id' => 4
            ],
            [
                'name' => 'PB40-BC063MC (90MS0191-M00630)',
                'brand_id' => 7,
                'device_id' => 4
            ],
            [
                'name' => 'Vivo AiO V272UA (V272UAK-BA001D/90PT0251-M00100)',
                'brand_id' => 7,
                'device_id' => 4
            ],
            [
                'name' => 'ZN242GDK-BA024T (90PT0232-M01210)',
                'brand_id' => 7,
                'device_id' => 4
            ],
            [
                'name' => 'V222GAK-BA001R (90PT0211-M00120)',
                'brand_id' => 7,
                'device_id' => 4
            ],
            [
                'name' => 'IdeaCentre 520-24ICB (F0DJ009CUA)',
                'brand_id' => 9,
                'device_id' => 4
            ],
            [
                'name' => 'ThinkStation P310 (30ASS3CG00)',
                'brand_id' => 9,
                'device_id' => 4
            ],
            [
                'name' => 'IdeaCentre 520-24 (F0DJ00GXUA)',
                'brand_id' => 9,
                'device_id' => 4
            ],
            [
                'name' => 'ThinkCentre M900 Tiny (10FL0024UA)',
                'brand_id' => 9,
                'device_id' => 4
            ],
            [
                'name' => 'IdeaCentre 520-24IKU (F0D200CLUA)',
                'brand_id' => 9,
                'device_id' => 4
            ],
            [
                'name' => 'IdeaCentre 520-24IKU (F0D200CLUA)',
                'brand_id' => 9,
                'device_id' => 4
            ],


            //Нетбуки
            [
                'name' => 'IdeaPad S130-11IGM (81J1007JRA) Midnight Blue',
                'brand_id' => 9,
                'device_id' => 5
            ],
            [
                'name' => 'E203MA-FD004T Star Grey',
                'brand_id' => 7,
                'device_id' => 5
            ],
            [
                'name' => 'T103HAF-GR033T Grey',
                'brand_id' => 7,
                'device_id' => 5
            ],
            [
                'name' => 'E201NA-GJ005T Dark Blue',
                'brand_id' => 7,
                'device_id' => 5
            ],
            [
                'name' => 'IdeaPad 120s-11IAP (81A400DBRA) Mineral Grey',
                'brand_id' => 9,
                'device_id' => 5
            ]


        ]);
    }
}
