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

<br>
<?= $this->Html->link(
    $this->Html->image('questionnaire.png'),
    '/questionnaires',
    ['escapeTitle' => false]
)
?>
<br><br>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <td class="actions">
                <?= $this->Html->link(__('Edit Questionnaire'), ['action' => 'edit', $questionnaire->ques_serial], ['class' =>'button']) ?>
                <?= $this->Form->postLink(__('Delete Questionnaire'), ['action' => 'delete', $questionnaire->ques_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->ques_serial), 'class' =>'button']) ?>
                <?= $this->Html->link(__('List Questionnaire'), ['action' => 'index'], ['class' =>'button']) ?>
                <?= $this->Html->link(__('New Questionnaire'), ['action' => 'add'], ['class' =>'button']) ?>
            </td>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <div style="background-color: #F8EBDF; padding:15px;">
                <legend style="font-size:20px;"><?= __('Questionnaire')?>: <?= h($questionnaire->ques_serial) ?></legend>
            </div>
            <table style="font-size:14px;">
                <tr>
                    <th><?= __('Questionnaire Serial') ?></th>
                    <td><?= h($questionnaire->ques_serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Serial') ?></th>
                    <td><?= h($questionnaire->project_serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business Name') ?></th>
                    <td><?= h($questionnaire->business_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($questionnaire->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Technology') ?></th>
                    <td><?= h($questionnaire->technology) ?></td>
                </tr>
                <tr>
                    <th><?= __('Industry') ?></th>
                    <td><?= h($questionnaire->industry) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Proposal') ?></th>
                    <td><?= h($questionnaire->project_proposal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completion Time') ?></th>
                    <td><?= h($questionnaire->completion_time) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
