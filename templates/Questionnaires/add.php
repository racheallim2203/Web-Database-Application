<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
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
            <div class="nav-link" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Clients'), ['controller' => 'Clients', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link active" style="margin-top: 8px; margin-left: 8px;">
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
        $this->Html->image('questionnaire.png'),
        '/questionnaires',
        ['escapeTitle' => false]
    )
    ?>

    <?= $this->Form->create($questionnaire) ?>
    <fieldset>
        <br><br>
        <?php
        echo $this->Form->control('ques_serial');
        echo $this->Form->control('project_serial', ['options' => $projectSerials]);
        echo $this->Form->control('business_name');
        echo $this->Form->control('website');
        echo $this->Form->control('technology');
        echo $this->Form->control('industry');
        echo $this->Form->control('project_proposal');
        echo $this->Form->control('completion_time', [
            'placeholder' => 'YYYY-MM-DD HH:MM:SS',
            'class' => 'custom-placeholder'
        ]);
        ?>
    </fieldset>
    <div style="text-align: center; margin:15px;">
        <?= $this->Form->button(__('Add')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

