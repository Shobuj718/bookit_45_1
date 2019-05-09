<?php

use Illuminate\Database\Seeder;

class IndustryProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industryProfessionList = [
            "Web & Marketing" => [
                "Web Development",
                "Web Design",
                "Marketing & Social Media",
                "Advertising",
                "Consulting",
                "Web Hosting",
                "Consumer Servie / Support",
                "IT Services",
                "Other"
            ],
            "Financial & Legal" => [
                "Accounting",
                "Tax Services",
                "Law Firm",
                "Legal Services",
                "Financial Advisor",
                "Investment Manager",
                "Mortgage Broker",
                "Insurance",
                "Other"
            ],
            "Healthcare" => [
                "Doctor",
                "Medical Center",
                "Dentist",
                "Veterinarian",
                "Optometrist",
                "Nutritionist",
                "Chiropractor",
                "Therapist",
                "Surgeon",
                "Naturopathic",
                "Reflexology",
                "Counseling & Mental Health",
                "Alternative Medicine",
                "Other"
            ]
        ];

        foreach($industryProfessionList as $industry => $professions){
            $ind = new \App\Models\Industry;
            $ind->name = $industry;
            $ind->save();

            foreach($professions as $profession){
                $prof = new \App\Models\Profession;
                $prof->name = $profession;
                $prof->industry_id = $ind->id;
                $prof->save();
            }
        }

    }
}
