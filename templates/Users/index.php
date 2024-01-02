<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="nav-container">
    <ul class="nav nav-pills nav-fill" style="font-size:14px;">
        <li class="nav-item">
            <div class="nav-link " style="color:white; margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Projects'), ['controller' => 'Projects', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;']) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Clients'), ['controller' => 'Clients', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Questionnaires'), ['controller' => 'Questionnaires', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link active" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
    </ul>
</div>

<div class="projects index content">
    <?= $this->Html->link(
        $this->Html->image('user.png'),
        '/users',
        ['escapeTitle' => false]
    )
    ?>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="font-size:14px;">
                <th class="custom-header"><?= __('User Serial') ?></th>
                <th class="custom-header"><?= __('Email') ?></th>
                <th class="custom-header"><?= __('Password') ?></th>
                <th class="custom-header actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr style="font-size:14px;">
                    <th><?= h($user->user_serial) ?></th>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->password) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->user_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->user_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_serial), 'class' => 'button', 'style' => 'width:50px;']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin:15px;">
        <?= $this->Html->link(__('Add New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'button']) ?>
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
