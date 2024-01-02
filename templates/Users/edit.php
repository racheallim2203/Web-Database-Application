<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
            <div class="nav-link active" style="margin-top: 8px; margin-left: 8px;">
                <?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['style' => 'text-decoration: none; color: white;' ]) ?>
            </div>
        </li>
    </ul>
</div>
<br>
<?= $this->Html->link(
    $this->Html->image('user.png'),
    '/users',
    ['escapeTitle' => false]
)
?>
<br><br>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <td class="actions">
                <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->user_serial], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_serial), 'class' =>'button']) ?>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' =>'button']) ?>
                <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' =>'button']) ?>
            </td>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <div style="background-color: #F8EBDF; padding:15px;">
                    <legend style="font-size:20px;"><?= __('User')?>: <?= h($user->user_serial) ?></legend>
                </div>
                <br>
                <table style="font-size:14px;">
                    <?php
                    echo $this->Form->control('user_serial');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    ?>
                    <!-- Password input with toggle -->
                    <div class="input password">
                        <span class="toggle-password" onclick="togglePassword()">Show password</span>
                    </div>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Update')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var toggleButton = document.querySelector(".toggle-password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.textContent = "Hide password";
        } else {
            passwordInput.type = "password";
            toggleButton.textContent = "Show password";
        }
    }
</script>



