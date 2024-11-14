<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int|null $year
 * @property int|null $month
 * @property int|null $day
 * @property int|null $customer_id
 * @property int|null $flight_id
 * @property int|null $seat_class
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Flight $flight
 */
class Reservation extends Entity
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
        'year' => true,
        'month' => true,
        'day' => true,
        'customer_id' => true,
        'flight_id' => true,
        'seat_class' => true,
        'customer' => true,
        'flight' => true,
    ];
}
