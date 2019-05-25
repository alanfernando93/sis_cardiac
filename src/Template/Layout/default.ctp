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
 */
$cakeDescription = 'SisCardiac';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <?=
        $this->Html->css([
          'bootstrap.min.css',
          'sb-admin-2.min.css',
          'dataTables.bootstrap4.min.css',
          'style.css'])
        ?>
        <?=
        $this->Html->script([
          'jquery.min.js',
          'highcharts.js'])
        ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <!-- Page Wrapper -->
        <div id="wrapper">

            <?= $this->element('sidebar') ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <?= $this->element('topbar') ?>

                    <?= $this->Flash->render() ?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <?= $this->fetch('content') ?>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <?= $this->element('footer') ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <?=
        $this->Html->script([
          'bootstrap.bundle.min.js',
          'jquery.easing.min.js',
          'sb-admin-2.min.js',
          'jquery.dataTables.min.js',
          'dataTables.bootstrap4.min.js',
          'datatables-demo.js',
          'jquery.steps.js'])
        ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
