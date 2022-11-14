<?php

namespace Database\Seeders;

use App\Models\EmploymentLocation;
use App\Models\Profession;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            NationalitiesTableSeeder::class,
            ProvincesTableSeeder::class,
            CitiesTableSeeder::class,
            GendersTableSeeder::class,
            TitlesTableSeeder::class,
            QualificationCategoriesTableSeeder::class,
            RequirementsTableSeeder::class,
            RequirementsCategoriesTableSeeder::class,
            ProfessionsTableSeeder::class,
            QualificationTableSeeder::class,
            RegisterCategoriesTableSeeder::class,
            IdentificationCategoriesTableSeeder::class,
            InstitutionsTableSeeder::class,
            AccreditedInstitutionsTableSeeder::class,

            RenewalStatusesTableSeeder::class,
            OperationalStatusesTableSeeder::class,
            PaymentStatusesTableSeeder::class,
            ComplianceTableSeeder::class,
            ApplicationStatusTableSeeder::class,

            PaymentItemsCategoryTableSeeder::class,
            PaymentItemsTableSeeder::class,
            PaymentChannelTableSeeder::class,
            PaymentMethodsTableSeeder::class,

            RenewalCategoriesTableSeeder::class,

            EmploymentLocationTableSeeder::class,
            EmploymentStatusTableSeeder::class,

        ]);
    }
}
