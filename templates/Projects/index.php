<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
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

<div class="projects index content">
    <?= $this->Html->link(
        $this->Html->image('project.png'),
        '/',
        ['escapeTitle' => false]
    )
    ?>
    <br><br>
    <div class="search-form">
        <div class="border-filter">
            <div class="container-filter">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Projects', 'action' => 'index'], 'type' => 'get']) ?>
                <div class="form-group">
                    <div class="left">
                        <?= $this->Form->control('semester', [
                            'label' => 'Filter by Semester',
                            'placeholder' => 'e.g., 2020S1',
                            'class' => 'custom-placeholder'
                        ]) ?>
                    </div>
                    <div class="right">
                        <label for="status"> Filter By Status:</label>
                        <?= $this->Form->select(
                            'status',
                            ['' => '==', 'Excommunicado' => 'Excommunicado', 'Postponed to future' => 'Postponed to future', 'Confirmed' => 'Confirmed', 'Shortlisted' => 'Shortlisted', 'No Response' => 'No Response', 'Too complex' => 'Too complex' ],
                            ['default' => '']
                        ); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="right" style="margin-top: 20px;">
                        <label for="level_of_necessity"> Filter By Level of Necessity:</label>
                        <?= $this->Form->select(
                            'level_of_necessity',
                            ['' => '==', 'Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'],
                            ['default' => '']
                        ); ?>
                    </div>
                    <div class="left-mg">
                        <label for="meet_and_greet">Meet & Greet</label>
                        <?= $this->Form->select(
                            'Meet & Greet',
                            ['' => '==', 'Yes' => 'Yes', 'No' => 'No'],
                            ['default' => '']
                        ); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->button(__('Search'), ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                    <?= $this->Html->link(__('Refresh'), ['controller' => 'Projects', 'action' => 'index'], ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                    <?= $this->Html->link(__('Add New Project'), ['controller' => 'Projects', 'action' => 'add'], ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="font-size:14px;">
                <th class="custom-header"><?= __('Project Serial') ?></th>
                <th class="custom-header"><?= __('Client Serial') ?></th>
                <th class="custom-header"><?= __('Semester') ?></th>
                <th class="custom-header"><?= __('Status') ?></th>
                <th class="custom-header"><?= __('Last Contact') ?></th>
                <th class="custom-header"><?= __('Level of Necessity') ?></th>
                <th class="custom-header"><?= __('Description') ?></th>
                <th class="custom-header"><?= __('Internal Comments') ?></th>
                <th class="custom-header"><?= __('Meet?') ?></th>
                <th class="custom-header actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $project) : ?>
                <tr style="font-size:14px;">
                    <th><?= h($project->project_serial) ?></th>
                    <td>
                        <?= $this->Html->link(
                            h($project->client_serial),
                            ['controller' => 'Clients', 'action' => 'view', $project->client_serial],
                            ['class' => 'client-link']
                        ) ?>
                    </td>
                    <td><?= h($project->semester) ?></td>
                    <td><?= h($project->status) ?></td>
                    <td><?= h($project->last_contact) ?></td>
                    <td><?= h($project->level_of_necessity) ?></td>
                    <td><?= h($project->description) ?></td>
                    <td><?= h($project->internal_comments) ?></td>
                    <td><?= h($project->meet_and_greet) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->project_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->project_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->project_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $project->project_serial), 'class' => 'button', 'style' => 'width:50px;']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin:15px;">
        <?= $this->Html->link(__('Add New Project'), ['controller' => 'Projects', 'action' => 'add'], ['class' => 'button']) ?>
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
