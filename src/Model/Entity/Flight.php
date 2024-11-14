<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flight Entity
 *
 * @property int $id
 * @property string|null $flight_name
 * @property string|null $departure_place
 * @property string|null $arrival_place
 * @property string|null $time
 * @property int|null $cap_business
 * @property int|null $cap_economy
 *
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Flight extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'flight_name' => true,
        'departure_place' => true,
        'arrival_place' => true,
        'time' => true,
        'cap_business' => true,
        'cap_economy' => true,
        'reservations' => true,
    ];
}
