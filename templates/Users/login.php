<div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter admin email and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
        <!-- Password input with toggle -->
        <div class="input password">
            <span class="toggle-password" onclick="togglePassword()">Show password</span>
        </div>
        <br>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
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

