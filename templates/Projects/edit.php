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
                <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->project_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $project->project_serial), 'class' =>'button']) ?>
                <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' =>'button']) ?>
                <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' =>'button']) ?>
            </td>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <div style="background-color: #F8EBDF; padding:15px;">
                    <legend style="font-size:20px;"><?= __('Project')?>: <?= h($project->project_serial) ?></legend>
                </div>
                <br>
                <table style="font-size:14px;">
                    <?php
                    echo $this->Form->control('project_serial');
                    echo $this->Form->control('client_serial');
                    echo $this->Form->control('semester');
                    ?>
                    <tr>
                        <th>
                            <div style="font-size: 15px; font-weight: bold; margin-bottom: -20px;"><?= __('Status') ?></div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?= $this->Form->select('status',['Excommunicado' => 'Excommunicado', 'Postponed to future' => 'Postponed to future', 'Confirmed' => 'Confirmed', 'Shortlisted' => 'Shortlisted', 'No Response' => 'No Response', 'Too complex' => 'Too complex'], ['default' => $project->status]) ?>
                        </td>
                    </tr>
                    <?php
                    echo $this->Form->control('last_contact');
                    ?>
                    <tr>
                        <th>
                            <div style="font-size: 15px; font-weight: bold; margin-bottom: -20px;"><?= __('Level of Necessity') ?></div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?= $this->Form->select('level_of_necessity', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], ['default' => $project->level_of_necessity]) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <?= $this->Form->control('description', [
                                    'style' => 'width: 100%; height: 150px; word-wrap: break-word;',
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <?= $this->Form->control('internal_comments', [
                                    'style' => 'width: 100%; height: 150px; word-wrap: break-word;',
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div style="font-size: 15px; font-weight: bold; margin-bottom: -20px;"><?= __('Meet & Greet') ?></div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?= $this->Form->select('meet_and_greet', ['Yes' => 'Yes', 'No' => 'No'], ['default' => $project->meet_and_greet]) ?>
                        </td>
                    </tr>
                    <tr>


                </table>
            </fieldset>
            <?= $this->Form->button(__('Update')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>



