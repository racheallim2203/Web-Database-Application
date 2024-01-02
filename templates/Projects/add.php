<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="nav-container">
    <ul class="nav nav-pills nav-fill" style="font-size:14px;">
        <li class="nav-item">
            <div class="nav-link active" style="color:white; margin-top: 8px; margin-left: 8px;">
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
            <div class="nav-link" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
    </ul>
</div>

<div class="projects form content">
    <?= $this->Html->link(
        $this->Html->image('project.png'),
        '/',
        ['escapeTitle' => false]
    )
    ?>

    <?= $this->Form->create($project) ?>
    <fieldset>
        <br><br>
        <?php
        echo $this->Form->control('project_serial');
        echo $this->Form->control('client_serial', ['options' => $clientSerials]);
        echo $this->Form->control('semester', [
            'placeholder' => '"YYYYS#" (e.g., 2021S2)',
            'class' => 'custom-placeholder'
        ]);
        ?>
        <div class="input select" style="font-size: 14px; margin-bottom: 16px;">
            <label for="status">Status:</label>
            <?= $this->Form->select(
                'status',
                ['' => '==', 'Excommunicado' => 'Excommunicado', 'Postponed to future' => 'Postponed to future', 'Confirmed' => 'Confirmed', 'Shortlisted' => 'Shortlisted', 'No Response' => 'No Response', 'Too complex' => 'Too complex' ],
                ['default' => null]
            ); ?>
        </div>
        <?php
        echo $this->Form->control('last_contact', [
            'placeholder' => 'YYYY-MM-DD HH:MM:SS',
            'class' => 'custom-placeholder'
        ]);
        ?>
        <div class="input select" style="font-size: 14px; margin-bottom: 16px;">
            <label for="level_of_necessity">Level of Necessity</label>
            <?= $this->Form->select(
                'level_of_necessity',
                ['' => '==', 'Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'],
                ['default' => null]
            ); ?>
        </div>
        <?php
        echo $this->Form->control('description');
        echo $this->Form->control('internal_comments');
        ?>
        <div class="input select" style="font-size: 14px; margin-bottom: 16px;">
            <label for="meet_and_greet">Meet & Greet</label>
            <?= $this->Form->select(
                'Meet & Greet',
                ['' => '==', 'Yes' => 'Yes', 'No' => 'No'],
                ['default' => null]
            ); ?>
        </div>
        <?php
        ?>
    </fieldset>
    <div style="text-align: center; margin:15px;">
        <?= $this->Form->button(__('Submit')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
