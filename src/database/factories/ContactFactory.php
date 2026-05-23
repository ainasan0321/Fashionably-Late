<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use Faker\Factory as FakerFactory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create('ja_JP');

        return [
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'gender' => $faker->randomElement([
                '男性',
                '女性',
                'その他'
            ]),
            'email' => $faker->unique()->safeEmail(),
            'tel' => '090-' . mt_rand(1000, 9999) . '-' . mt_rand(1000, 9999),
            'address' => mb_substr($faker->address(), 0, 100),
            'building' => $faker->randomElement([
                'サンプルマンション',
                'コーポおやま',
                '東京ハイツ',
            ])
            . mt_rand(101,1101)
            . '号室',
            'category_id' => $faker->numberBetween(1, 5),
            'detail' => $faker->randomElement([
                'お問い合わせのサンプルです',
            ]),
        ];
    }
}
