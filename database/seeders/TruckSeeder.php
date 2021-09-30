<?php

namespace Database\Seeders;

use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertTruck("Mitshubishi Colt Diesel", "Z 893 BC", "Solar", "colt_diesel.png");
        $this->insertTruck("Volvo FMX", "Z 4143 NR", "Solar", "volvo_FMX_3.jpg");
        $this->insertTruck("Volvo FMX", "Z 5164 YR", "Solar", "volvo_FMX_2.jpg");
        $this->insertTruck("Volvo FMX", "Z 3151 GK", "Solar", "volvo_fmx.jpeg");
        $this->insertTruck("Volvo VH-16", "Z 3134 AK", "Solar", "volvo_vh16.jpg");
        $this->insertTruck("Scania P410", "Z 4144 YY", "Solar", "scania_p410.png");
    }

    function insertTruck(
        $name,
        $nopol,
        $fuel_type,
        $photo
    )
    {
        $photo = "/razky_samples/truck/$photo";
        $truck = new Truck();
        $truck->name = $name;
        $truck->nopol = $nopol;
        $truck->fuel_type = $fuel_type;
        $truck->photo = $photo;
        $truck->save();
    }

}
