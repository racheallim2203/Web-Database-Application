<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Questionnaire> $questionnaires
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

<div class="projects index content">
    <?= $this->Html->link(
        $this->Html->image('questionnaire.png'),
        '/questionnaires',
        ['escapeTitle' => false]
    )
    ?>
    <br><br>
    <div class="search-form">
        <div class="border-filter">
            <div class="container-filter">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Questionnaires', 'action' => 'index'], 'type' => 'get']) ?>
                <div class="form-group">
                    <div class="left">
                        <?= $this->Form->control('business_name', [
                            'label' => 'Filter by Business Name',
                            'placeholder' => 'e.g., Lorem Limited',
                            'class' => 'custom-placeholder'
                        ]) ?>
                    </div>
                    <div class="right">
                        <?= $this->Form->control('completion_time', [
                            'label' => 'Filter by Completion Time',
                            'placeholder' => 'YYYY-MM-DD HH:MM:SS',
                            'class' => 'custom-placeholder'
                        ]) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= $this->Form->button(__('Search'), ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                    <?= $this->Html->link(__('Refresh'), ['controller' => 'Questionnaires', 'action' => 'index'], ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                    <?= $this->Html->link(__('Add New Questionnaire'), ['controller' => 'Questionnaires', 'action' => 'add'], ['class' => 'button', 'style' => 'margin-top: 18px;']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="font-size:14px;">
                <th class="custom-header"><?= __('Questionnaire Serial') ?></th>
                <th class="custom-header"><?= __('Project Serial') ?></th>
                <th class="custom-header"><?= __('Business Name') ?></th>
                <th class="custom-header"><?= __('Website') ?></th>
                <th class="custom-header"><?= __('Technology') ?></th>
                <th class="custom-header"><?= __('Industry') ?></th>
                <th class="custom-header"><?= __('Project Proposal') ?></th>
                <th class="custom-header"><?= __('Completion Time') ?></th>
                <th class="custom-header actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($questionnaires as $questionnaire) : ?>
                <tr style="font-size:14px;">
                    <th><?= h($questionnaire->ques_serial) ?></th>
                    <td>
                        <?= $this->Html->link(
                            h($questionnaire->project_serial),
                            ['controller' => 'Projects', 'action' => 'view', $questionnaire->project_serial],
                            ['class' => 'client-link']
                        ) ?>
                    </td>
                    <td><?= h($questionnaire->business_name) ?></td>
                    <td><?= h($questionnaire->website) ?></td>
                    <td><?= h($questionnaire->technology) ?></td>
                    <td><?= h($questionnaire->industry) ?></td>
                    <td><?= h($questionnaire->project_proposal) ?></td>
                    <td><?= h($questionnaire->completion_time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Questionnaires', 'action' => 'view', $questionnaire->ques_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Questionnaires', 'action' => 'edit', $questionnaire->ques_serial], ['class' => 'button', 'style' => 'width:50px;']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionnaire->ques_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->ques_serial), 'class' => 'button', 'style' => 'width:50px;']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin:15px;">
        <?= $this->Html->link(__('Add New Questionnaire'), ['controller' => 'Questionnaires', 'action' => 'add'], ['class' => 'button']) ?>
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

