<?php

namespace App\DataFixtures;

use App\Entity\Currency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * @package App\DataFixtures
 */
class CurrencyFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $items = [
            [
                'nameFrom' => 'Euro',
                'nameTo' => 'US Dollar',
                'slug' => 'euro-us-dollar',
                'ratio' => 1.3764,
            ],
            [
                'nameFrom' => 'Euro',
                'nameTo' => 'Swiss Franc',
                'slug' => 'euro-swiss-franc',
                'ratio' => 1.2079,
            ],
            [
                'nameFrom' => 'Euro',
                'nameTo' => 'British Pound',
                'slug' => 'euro-british-pound',
                'ratio' => 0.8731,
            ],
            [
                'nameFrom' => 'US Dollar',
                'nameTo' => 'JPY',
                'slug' => 'us-dollar-jpy',
                'ratio' => 76.7200,
            ],
            [
                'nameFrom' => 'Swiss Franc',
                'nameTo' => 'US Dollar',
                'slug' => 'swiss-franc-us-dollar',
                'ratio' => 1.1379,
            ],
            [
                'nameFrom' => 'British Pound',
                'nameTo' => 'CAD',
                'slug' => 'british-pound-cad',
                'ratio' => 1.5648,
            ]
        ];

        foreach ($items as $item) {
            $currency = new Currency();
            $currency->setNameFrom($item['nameFrom']);
            $currency->setNameTo($item['nameTo']);
            $currency->setSlug($item['slug']);
            $currency->setRatio($item['ratio']);

            $manager->persist($currency);
        }

        $manager->flush();
    }
}
