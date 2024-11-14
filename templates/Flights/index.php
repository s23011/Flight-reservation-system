<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Flight> $flights
 */
?>
<div class="flights index content">
    <?= $this->Html->link(__('New Flight'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Flights') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('flight_name') ?></th>
                    <th><?= $this->Paginator->sort('departure_place') ?></th>
                    <th><?= $this->Paginator->sort('arrival_place') ?></th>
                    <th><?= $this->Paginator->sort('time') ?></th>
                    <th><?= $this->Paginator->sort('cap_business') ?></th>
                    <th><?= $this->Paginator->sort('cap_economy') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flights as $flight): ?>
                <tr>
                    <td><?= $this->Number->format($flight->id) ?></td>
                    <td><?= h($flight->flight_name) ?></td>
                    <td><?= h($flight->departure_place) ?></td>
                    <td><?= h($flight->arrival_place) ?></td>
                    <td><?= h($flight->time) ?></td>
                    <td><?= $flight->cap_business === null ? '' : $this->Number->format($flight->cap_business) ?></td>
                    <td><?= $flight->cap_economy === null ? '' : $this->Number->format($flight->cap_economy) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $flight->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flight->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
