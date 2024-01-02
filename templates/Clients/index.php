<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
 */
?>
<div class="nav-container">
    <ul class="nav nav-pills nav-fill" style="font-size:14px;">
        <li class="nav-item">
            <div class="nav-link" style="color:white; margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Projects'), ['controller' => 'Projects', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;']) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link active" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Clients'), ['controller' => 'Clients', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Questionnaires'), ['controller' => 'Questionnaires', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
    </ul>
</div>

<div class="projects index content">
    <?= $this->Html->link(
        $this->Html->image('client.png'),
        '/clients',
        ['escapeTitle' => false]
    )
    ?>
    <br><br>

    <div class="search-form">
        <div class="border-filter">
            <div class="container-filter">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Clients', 'action' => 'index'], 'type' => 'get']) ?>
                <div class="form-group">
                    <div class="left">
                        <?= $this->Form->control('first_name', [
                            'label' => 'Filter by First Name',
                            'placeholder' => 'e.g., Kibo',
                            'class' => 'custom-placeholder'
                        ]) ?>
                    </div>
                    <div class="right">
                        <?= $this->Form->control('surname', [
                            'label' => 'Filter by Surname',
                            'placeholder' => 'e.g., Collins',
                            'class' => 'custom-placeholder'
                        ]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="right" style="margin-top: 20px;">
                        <?= $this->Form->control('address', [
                            'label' => 'Filter by Address',
                            'placeholder' => 'e.g., 285-9455 Nunc St.',
                            'class' => 'custom-placeholder'
                        ]) ?>
                    </div>
                    <div class="left-mg">
                        <div class="right-button">
                            <?= $this->Form->button(__('Search'), ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                            <?= $this->Html->link(__('Refresh'), ['controller' => 'Clients', 'action' => 'index'], ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                            <?= $this->Html->link(__('Add New Client'), ['controller' => 'Clients', 'action' => 'add'], ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                        </div>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="font-size:14px;">
                <th class="custom-header"><?= __('Client Serial') ?></th>
                <th class="custom-header"><?= __('Email') ?></th>
                <th class="custom-header"><?= __('First Name') ?></th>
                <th class="custom-header"><?= __('Surname') ?></th>
                <th class="custom-header"><?= __('Phone Number') ?></th>
                <th class="custom-header"><?= __('Address') ?></th>
                <th class="custom-header actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client) : ?>
                <tr style="font-size:14px;">
                    <th><?= h($client->client_serial) ?></th>
                    <td><?= h($client->email) ?></td>
                    <td><?= h($client->first_name) ?></td>
                    <td><?= h($client->surname) ?></td>
                    <td><?= h($client->phone_number) ?></td>
                    <td><?= h($client->address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $client->client_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $client->client_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->client_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $client->client_serial), 'class' => 'button', 'style' => 'width:50px;']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin:15px;">
        <?= $this->Html->link(__('Add New Client'), ['controller' => 'Clients', 'action' => 'add'], ['class' => 'button']) ?>
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

