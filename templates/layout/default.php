<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Nathan Web System';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'bootstrap.min.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div class="container mt-3">
    <div class="top-nav-title">
        <?= $this->Html->link(
            $this->Html->image('logo.png', ['alt' => 'Nathan Web System', 'class' => 'logo-class']),
            '/',
            ['escapeTitle' => false]
        ) ?>
        <div style="float: right; margin-top: 50px;">
            <?php
            if ($this->getRequest()->getAttribute('identity')) {
                echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'button']);
            }
            ?>
        </div>
    </div>
</div>


<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>

<footer>
    <?= $this->Html->link(
        $this->Html->image('footer.png', ['alt' => 'Nathan Web System', 'class' => 'footer-class']),
        '/',
        ['escapeTitle' => false]
    ) ?>
</footer>
</body>
</html>


