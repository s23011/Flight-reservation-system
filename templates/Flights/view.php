<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight $flight
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Flight'), ['action' => 'edit', $flight->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Flight'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Flights'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Flight'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="flights view content">
            <h3><?= h($flight->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Flight Name') ?></th>
                    <td><?= h($flight->flight_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Place') ?></th>
                    <td><?= h($flight->departure_place) ?></td>
                </tr>
                <tr>
                    <th><?= __('Arrival Place') ?></th>
                    <td><?= h($flight->arrival_place) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time') ?></th>
                    <td><?= h($flight->time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($flight->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cap Business') ?></th>
                    <td><?= $flight->cap_business === null ? '' : $this->Number->format($flight->cap_business) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cap Economy') ?></th>
                    <td><?= $flight->cap_economy === null ? '' : $this->Number->format($flight->cap_economy) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reservations') ?></h4>
                <?php if (!empty($flight->reservations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Year') ?></th>
                            <th><?= __('Month') ?></th>
                            <th><?= __('Day') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Flight Id') ?></th>
                            <th><?= __('Seat Class') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($flight->reservations as $reservations) : ?>
                        <tr>
                            <td><?= h($reservations->id) ?></td>
                            <td><?= h($reservations->year) ?></td>
                            <td><?= h($reservations->month) ?></td>
                            <td><?= h($reservations->day) ?></td>
                            <td><?= h($reservations->customer_id) ?></td>
                            <td><?= h($reservations->flight_id) ?></td>
                            <td><?= h($reservations->seat_class) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
