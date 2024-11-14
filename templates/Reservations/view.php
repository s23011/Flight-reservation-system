<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations view content">
            <h3><?= h($reservation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $reservation->has('customer') ? $this->Html->link($reservation->customer->id, ['controller' => 'Customers', 'action' => 'view', $reservation->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Flight') ?></th>
                    <td><?= $reservation->has('flight') ? $this->Html->link($reservation->flight->id, ['controller' => 'Flights', 'action' => 'view', $reservation->flight->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reservation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $reservation->year === null ? '' : $this->Number->format($reservation->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Month') ?></th>
                    <td><?= $reservation->month === null ? '' : $this->Number->format($reservation->month) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day') ?></th>
                    <td><?= $reservation->day === null ? '' : $this->Number->format($reservation->day) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seat Class') ?></th>
                    <td><?= $reservation->seat_class === null ? '' : $this->Number->format($reservation->seat_class) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
