<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
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

<div class="projects form content">
    <?= $this->Html->link(
        $this->Html->image('client.png'),
        '/clients',
        ['escapeTitle' => false]
    )
    ?>

    <?= $this->Form->create($client) ?>
    <fieldset>
        <br><br>
        <?php
        echo $this->Form->control('client_serial');
        echo $this->Form->control('email');
        echo $this->Form->control('first_name');
        echo $this->Form->control('surname');
        echo $this->Form->control('phone_number', [
            'placeholder' => '826093760',
            'class' => 'custom-placeholder'
        ]);
        echo $this->Form->control('address');
        ?>
    </fieldset>
    <div style="text-align: center; margin:15px;">
        <?= $this->Form->button(__('Add')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
