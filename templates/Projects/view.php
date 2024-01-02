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

<br>
<?= $this->Html->link(
    $this->Html->image('project.png'),
    '/',
    ['escapeTitle' => false]
)
?>
<br><br>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <td class="actions">
                <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->project_serial], ['class' =>'button']) ?>
                <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->project_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $project->project_serial), 'class' =>'button']) ?>
                <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' =>'button']) ?>
                <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' =>'button']) ?>
            </td>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <div style="background-color: #F8EBDF; padding:15px;">
                <legend style="font-size:20px;"><?= __('Project')?>: <?= h($project->project_serial) ?></legend>
            </div>
            <table style="font-size:14px;">
                <tr>
                    <th><?= __('Project Serial') ?></th>
                    <td><?= h($project->project_serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Serial') ?></th>
                    <td><?= h($project->client_serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Semester') ?></th>
                    <td><?= h($project->semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($project->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Contact') ?></th>
                    <td><?= h($project->last_contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level of Necessity') ?></th>
                    <td><?= h($project->level_of_necessity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($project->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Internal Comments') ?></th>
                    <td><?= h($project->internal_comments) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meet?') ?></th>
                    <td><?= h($project->meet_and_greet) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>


