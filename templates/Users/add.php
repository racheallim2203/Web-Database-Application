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

<div class="projects form content">
    <?= $this->Html->link(
        $this->Html->image('user.png'),
        '/users',
        ['escapeTitle' => false]
    )
    ?>

    <?= $this->Form->create($user) ?>
    <fieldset>
        <br><br>
        <?php
        echo $this->Form->control('user_serial');
        echo $this->Form->control('email');
        ?>
        <div class="input password">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            <span class="toggle-password" onclick="togglePassword()">Show password</span>
        </div>
    </fieldset>
    <div style="text-align: center; margin:15px;">
        <?= $this->Form->button(__('Add User')) ?>
    </div>
    <?= $this->Form->end() ?>
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
