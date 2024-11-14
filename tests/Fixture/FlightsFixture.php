<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FlightsFixture
 */
class FlightsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'flight_name' => '',
                'departure_place' => '',
                'arrival_place' => '',
                'time' => '',
                'cap_business' => 1,
                'cap_economy' => 1,
            ],
        ];
        parent::init();
    }
}
