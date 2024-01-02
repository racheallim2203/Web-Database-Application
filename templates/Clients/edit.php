<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
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

<br>
<?= $this->Html->link(
    $this->Html->image('client.png'),
    '/clients',
    ['escapeTitle' => false]
)
?>
<br><br>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <td class="actions">
                <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->client_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $client->client_serial), 'class' =>'button']) ?>
                <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' =>'button']) ?>
                <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' =>'button']) ?>
            </td>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <div style="background-color: #F8EBDF; padding:15px;">
                    <legend style="font-size:20px;"><?= __('Client')?>: <?= h($client->client_serial) ?></legend>
                </div>
                <br>
                <table style="font-size:14px;">
                    <?php
                    echo $this->Form->control('client_serial');
                    echo $this->Form->control('email');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('surname');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('address');
                    ?>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Update')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
