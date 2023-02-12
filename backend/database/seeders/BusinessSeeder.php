<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;
use App\Models\BusinessImage;
use App\Models\Review;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_getBusinessList() as $data) {
            $business = Business::firstOrNew([
                "name" => $data["name"]
            ]);
            if (!$business->exists) $business->fill($data)->save();
        }
        foreach ($this->_getImageList() as $data) {
            $image = BusinessImage::firstOrNew([
                "business_id" => $data["business_id"],
                "image" => $data["image"]
            ]);
            if (!$image->exists) $image->fill($data)->save();
        }
        foreach ($this->_getReviewsList() as $data) {
            $review = Review::firstOrNew([
                "reviewable_type" => $data["reviewable_type"],
                "reviewable_id" => $data["reviewable_id"],
                "body" => $data["body"]
            ]);
            if (!$review->exists) $review->fill($data)->save();
        }
    }
    
    private function _getBusinessList()
    {
        return [
            [
                "name"      => "Cilandak Town Square",
                "address"   => "Cilandak Bar., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta",
                "locale"    => "id_ID",
                "latitude"  => "-6.291430231213968",
                "longitude" => "106.79935688096405",
                "limit"     => 3,
            ],
            [
                "name"      => "Margo City",
                "address"   => "Jl. Margonda Raya No.358, Kemiri Muka, Kecamatan Beji, Kota Depok, Jawa Barat 16423",
                "locale"    => "id_ID",
                "latitude"  => "-6.373073695383154",
                "longitude" => "106.83487460145467",
                "limit"     => 4,
            ],
            [
                "name"      => "AEON Mall Tanjung Barat",
                "address"   => "Jl. Raya Tj. Barat No.163, RW.4, Tj. Bar., Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12530",
                "locale"    => "id_ID",
                "latitude"  => "-6.305635695431214",
                "longitude" => "106.84042670940639",
                "limit"     => 5,
            ],
            [
                "name"      => "Pondok Indah Mall 1",
                "address"   => "PQMM+XWV, Jalan Metro Pondok Indah Kav. IV, Pd. Pinang, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta",
                "locale"    => "id_ID",
                "latitude"  => "-6.265073084021859",
                "longitude" => "106.7849650591247",
                "limit"     => 6,
            ],
        ];
    }
    
    private function _getImageList()
    {
        return [
            [
                "business_id" => 1,
                "image"       => "public/business/business_1.png",
            ],
            [
                "business_id" => 1,
                "image"       => "public/business/business_2.png",
            ],
            [
                "business_id" => 1,
                "image"       => "public/business/business_3.png",
            ],
            [
                "business_id" => 2,
                "image"       => "public/business/business_2.png",
            ],
            [
                "business_id" => 2,
                "image"       => "public/business/business_3.png",
            ],
            [
                "business_id" => 3,
                "image"       => "public/business/business_1.png",
            ],
            [
                "business_id" => 4,
                "image"       => "public/business/business_3.png",
            ],
        ];
    }
    
    private function _getReviewsList()
    {
        return [
            [
                "reviewable_type" => "App\Models\Business",
                "reviewable_id"   => 1,
                "body"            => "tempat nya bagus recomended",
                "rates"           => 4,
            ],
            [
                "reviewable_type" => "App\Models\Business",
                "reviewable_id"   => 1,
                "body"            => "bagus banget",
                "rates"           => 5,
            ],
            [
                "reviewable_type" => "App\Models\Business",
                "reviewable_id"   => 1,
                "body"            => "nyaman banget",
                "rates"           => 3,
            ],
            [
                "reviewable_type" => "App\Models\Business",
                "reviewable_id"   => 2,
                "body"            => "tempatnya bagus, view nya ok",
                "rates"           => 4,
            ],
            [
                "reviewable_type" => "App\Models\Business",
                "reviewable_id"   => 2,
                "body"            => "kozy banget",
                "rates"           => 3,
            ],
            [
                "reviewable_type" => "App\Models\Business",
                "reviewable_id"   => 3,
                "body"            => "Nice lah",
                "rates"           => 2,
            ],
        ];
    }
}
