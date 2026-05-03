<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::query()->updateOrCreate(
            ['name' => 'PT Jasanya Teknologi Indonesia'],
            [
                'logo' => null,
                'email' => 'jasanya.id@gmail.com',
                'whatsapp_number' => '085891514812',
                'tax_rate' => 11.00,
                'nib' => 210250002332,
                'address' => 'Jl Raya Daan Mogot KM 15, Cengkareng Jakarta Barat',
                'description' => null,
                'active' => true,
            ],
        );
    }
}
