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
                <?= $this->Form->postLink(__('Delete Questionnaire'), ['action' => 'delete', $questionnaire->ques_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->ques_serial), 'class' =>'button']) ?>
                <?= $this->Html->link(__('List Questionnaires'), ['action' => 'index'], ['class' =>'button']) ?>
                <?= $this->Html->link(__('New Questionnaire'), ['action' => 'add'], ['class' =>'button']) ?>
            </td>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($questionnaire) ?>
            <fieldset>
                <div style="background-color: #F8EBDF; padding:15px;">
                    <legend style="font-size:20px;"><?= __('Questionnaire')?>: <?= h($questionnaire->ques_serial) ?></legend>
                </div>
                <br>
                <table style="font-size:14px;">
                    <?php
                    echo $this->Form->control('ques_serial');
                    echo $this->Form->control('project_serial');
                    echo $this->Form->control('business_name');
                    echo $this->Form->control('website');
                    echo $this->Form->control('technology');
                    echo $this->Form->control('industry');
                    echo $this->Form->control('project_proposal');
                    echo $this->Form->control('completion_time');
                    ?>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Update')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


