<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['name' => 'Toyota Alphard 2.5 G A/T', 'brand' => 'Toyota', 'price' => 850000000, 'year' => 2022, 'status' => 'available', 'description' => 'Toyota Alphard 2022 kondisi prima, kilometer rendah, bebas banjir & tabrak. Captain Seat, panoramic roof, power door. Garansi 2 tahun dari Urban Wheels Indonesia.'],
            ['name' => 'Toyota Fortuner 2.4 VRZ A/T', 'brand' => 'Toyota', 'price' => 520000000, 'year' => 2021, 'status' => 'available', 'description' => 'Toyota Fortuner 2021 diesel VRZ, service record lengkap, surat atas nama sendiri. Warna hitam metalik.'],
            ['name' => 'Toyota Camry 2.5 V A/T', 'brand' => 'Toyota', 'price' => 380000000, 'year' => 2020, 'status' => 'available', 'description' => 'Toyota Camry 2020 V grade, interior kulit premium, sunroof, BSM, Head Up Display. Kondisi seperti baru.'],
            ['name' => 'Toyota Innova Zenix 2.0 G A/T', 'brand' => 'Toyota', 'price' => 385000000, 'year' => 2023, 'status' => 'available', 'description' => 'Innova Zenix 2023 generasi terbaru, TNGA platform. Km sangat rendah, masih dalam masa garansi resmi Toyota.'],
            ['name' => 'Toyota Rush 1.5 S A/T', 'brand' => 'Toyota', 'price' => 228000000, 'year' => 2021, 'status' => 'available', 'description' => 'Toyota Rush 2021 S TRD Sportivo, 7 seater, body kit original TRD. Kondisi mulus, AC dingin.'],
            ['name' => 'Honda CR-V 1.5 Turbo Prestige', 'brand' => 'Honda', 'price' => 420000000, 'year' => 2022, 'status' => 'available', 'description' => 'Honda CR-V 2022 Prestige, turbo bertenaga, Honda Sensing, panoramic moonroof, wireless charging. Garansi resmi masih panjang.'],
            ['name' => 'Honda HR-V 1.5 SE A/T', 'brand' => 'Honda', 'price' => 298000000, 'year' => 2023, 'status' => 'available', 'description' => 'Honda HR-V 2023 SE terbaru, turbocharged, Honda Connect, Honda Sensing, tampilan sporty. Unit baru nyaris tanpa gores.'],
            ['name' => 'Honda Odyssey 2.4 Prestige A/T', 'brand' => 'Honda', 'price' => 490000000, 'year' => 2019, 'status' => 'available', 'description' => 'Honda Odyssey Prestige 2019, minivan premium 8 seater, power sliding door, DVD entertainment rear.'],
            ['name' => 'Honda Brio RS 1.2 A/T', 'brand' => 'Honda', 'price' => 168000000, 'year' => 2022, 'status' => 'available', 'description' => 'Honda Brio RS 2022, city car sporty, touchscreen head unit, kondisi excellent, km rendah.'],
            ['name' => 'BMW 520i Luxury Line', 'brand' => 'BMW', 'price' => 980000000, 'year' => 2021, 'status' => 'available', 'description' => 'BMW 520i 2021 G30 Luxury Line, 2.0 TwinPower Turbo, interior full leather, Harman Kardon sound, Head Up Display.'],
            ['name' => 'BMW X5 xDrive40i M Sport', 'brand' => 'BMW', 'price' => 1450000000, 'year' => 2022, 'status' => 'available', 'description' => 'BMW X5 2022 xDrive40i M Sport, 340hp, panoramic roof, Massage seats, 360 camera, kondisi seperti showroom.'],
            ['name' => 'BMW 3 Series 330i M Sport', 'brand' => 'BMW', 'price' => 780000000, 'year' => 2021, 'status' => 'available', 'description' => 'BMW 330i M Sport 2021, interior sport, driving modes, kondisi sempurna dengan km rendah.'],
            ['name' => 'Mercedes-Benz E 300 Avantgarde', 'brand' => 'Mercedes-Benz', 'price' => 1200000000, 'year' => 2020, 'status' => 'available', 'description' => 'Mercedes-Benz E300 2020 W213, 2.0 turbo, Burmester surround sound, Multibeam LED, interior kayu burl walnut.'],
            ['name' => 'Mercedes-Benz GLC 300 4MATIC', 'brand' => 'Mercedes-Benz', 'price' => 1350000000, 'year' => 2022, 'status' => 'available', 'description' => 'Mercedes-Benz GLC 300 4MATIC 2022, AMG Line, panoramic roof, augmented reality navigation, warranty masih panjang.'],
            ['name' => 'Mitsubishi Pajero Sport Dakar 4x4', 'brand' => 'Mitsubishi', 'price' => 475000000, 'year' => 2021, 'status' => 'available', 'description' => 'Pajero Sport Dakar 4x4 2021, diesel 2.4 MIVEC, 7 seater premium, Super Select 4WD, kondisi prima.'],
            ['name' => 'Mitsubishi Xpander Cross A/T', 'brand' => 'Mitsubishi', 'price' => 248000000, 'year' => 2022, 'status' => 'available', 'description' => 'Xpander Cross 2022 premium MPV, Android head unit, electric folding mirror, kondisi bersih.'],
            ['name' => 'Suzuki Jimny 1.5 MT 5-Door', 'brand' => 'Suzuki', 'price' => 320000000, 'year' => 2023, 'status' => 'available', 'description' => 'Suzuki Jimny 2023 5 pintu terbaru, 4WD off-road legend, mesin 1.5L, kondisi baru belum ada 1000km.'],
            ['name' => 'Suzuki Ertiga GX A/T', 'brand' => 'Suzuki', 'price' => 195000000, 'year' => 2021, 'status' => 'available', 'description' => 'Suzuki Ertiga 2021 GX 7 seater, mesin efisien, AC double blower, kondisi baik, pajak panjang.'],
            ['name' => 'Nissan Terra VL 2.5 4x4 A/T', 'brand' => 'Nissan', 'price' => 445000000, 'year' => 2020, 'status' => 'available', 'description' => 'Nissan Terra 2020 VL 4x4, diesel bertenaga, 7 seater, leather seat, kondisi prima, surat lengkap.'],
            ['name' => 'Daihatsu Terios R A/T 7-Seater', 'brand' => 'Daihatsu', 'price' => 218000000, 'year' => 2021, 'status' => 'available', 'description' => 'Daihatsu Terios 2021 R A/T, 7 seater, mesin 1.5L DOHC, Android head unit, kondisi terawat.'],
            ['name' => 'Toyota Avanza 1.5 G A/T', 'brand' => 'Toyota', 'price' => 185000000, 'year' => 2020, 'status' => 'sold', 'description' => 'Toyota Avanza 2020 G, 7 seater, kondisi baik.'],
            ['name' => 'Honda Jazz RS 1.5 A/T', 'brand' => 'Honda', 'price' => 235000000, 'year' => 2021, 'status' => 'sold', 'description' => 'Honda Jazz RS 2021, hatchback sporty, kondisi prima.'],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
