<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php printf("%s: %s", $cakeDescription, $this->fetch('title')); ?></title>

    <?php echo $this->Html->meta('icon'); ?>
    <?php echo $this->Html->charset('utf-8'); ?>

    <?php echo $this->Html->meta('keywords', $cakeDescription); ?>
    <?php echo $this->Html->meta('description', $cakeDescription); ?>

    <?php echo $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge')); ?>
    <?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>

    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('bootstrap-theme.min'); ?>
    <?php echo $this->Html->css('font-awesome.min'); ?>
    <?php echo $this->Html->css('jquery.bxslider'); ?>
    <?php echo $this->Html->css('styles'); ?>

    <?php echo $this->Html->script('jquery-2.1.3.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('jquery.bxslider.min'); ?>

    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>
</head>
<body>
<div class="container-fluid wp">
<!--    <nav class="navbar navbar-default navbar-fixed-top section">-->
<!--        <div class="container">-->
<!--            <div class="navbar-header">-->
<!--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">-->
<!--                    <span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
<!--                <a class="navbar-brand" href="#">Project name</a>-->
<!--            </div>-->
<!--            <div id="navbar" class="navbar-collapse collapse">-->
<!--                <ul class="nav navbar-nav">-->
<!--                    <li class="active"><a href="#">Home</a></li>-->
<!--                    <li><a href="#about">About</a></li>-->
<!--                    <li><a href="#contact">Contact</a></li>-->
<!--                    <li class="dropdown">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                        <ul class="dropdown-menu" role="menu">-->
<!--                            <li><a href="#">Action</a></li>-->
<!--                            <li><a href="#">Another action</a></li>-->
<!--                            <li><a href="#">Something else here</a></li>-->
<!--                            <li class="divider"></li>-->
<!--                            <li class="dropdown-header">Nav header</li>-->
<!--                            <li><a href="#">Separated link</a></li>-->
<!--                            <li><a href="#">One more separated link</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--                <ul class="nav navbar-nav navbar-right">-->
<!--                    <li><a href="#">Default</a></li>-->
<!--                    <li><a href="#">Static top</a></li>-->
<!--                    <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
    <header class="section ss_header">
    </header>
    <div class="section ss_content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <div class="section">
        <?php echo $this->Html->link(
            $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
            'http://www.cakephp.org/',
            array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
        );
        ?>
        <p>
            <?php echo $cakeVersion; ?>
        </p>
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Html->script('scripts'); ?>
</body>
</html>
