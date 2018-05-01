<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codejudge</title>

	<?php $this->load->view('sub-views/head.php') ?>

    <style>
        #editor {
            height: 200px;
            font-size: 1em;
        }
    </style>

</head>

<body>

<div class="login">

    <!-- Login -->
    <div class="login__block toggled" id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Teacher Sign in

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a data-block="#l-register" href="">Create an account</a></li>
                        <li><a data-block="#l-forget-password" href="">Forgot password?</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <form action="<?= base_url('teacher/login_do')?>" method="post">

            <div class="login__block__body">
                <div class="form-group form-group--float form-group--centered form-group--centered">
                    <input type="email" class="form-control" name="email" required>
                    <label>Email Address</label>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group--float form-group--centered form-group--centered">
                    <input type="password" class="form-control" name="password" required>
                    <label>Password</label>
                    <i class="form-group__bar"></i>
                </div>

                <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-long-arrow-right"></i></button>
            </div>

        </form>


    </div>

    <!-- Register -->
    <div class="login__block" id="l-register">
        <div class="login__block__header palette-Blue bg">
            <i class="zmdi zmdi-account-circle"></i>
            Create an account

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a data-block="#l-login" href="">Already have an account?</a></li>
                        <li><a data-block="#l-forget-password" href="">Forgot password?</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <form action="<?=base_url('teacher/register_do')?>" method="post">

            <div class="login__block__body">
                <div class="form-group form-group--float form-group--centered">
                    <input type="text" class="form-control" name="name" required>
                    <label>Name</label>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group--float form-group--centered">
                    <input type="email" class="form-control" name="email" required>
                    <label>Email Address</label>
                    <i class="form-group__bar"></i>
                </div>

                <div class="form-group form-group--float form-group--centered">
                    <input type="password" class="form-control" name="password" required>
                    <label>Password</label>
                    <i class="form-group__bar"></i>
                </div>

                <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-plus"></i></button>
            </div>

        </form>

    </div>

    <!-- Forgot Password -->
    <div class="login__block" id="l-forget-password">
        <div class="login__block__header palette-Purple bg">
            <i class="zmdi zmdi-account-circle"></i>
            Forgot Password?

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a data-block="#l-login" href="">Already have an account?</a></li>
                        <li><a data-block="#l-register" href="">Create an account</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <p class="m-t-30">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

            <div class="form-group form-group--float form-group--centered">
                <input type="text" class="form-control">
                <label>Email Address</label>
                <i class="form-group__bar"></i>
            </div>

            <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-check"></i></button>
        </div>
    </div>
</div>

<!-- Older IE Warning -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="ie-warning__container">
        <ul class="ie-warning__download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="img/browsers/chrome.png" alt="">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="img/browsers/firefox.png" alt="">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="img/browsers/opera.png" alt="">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="img/browsers/safari.png" alt="">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="img/browsers/ie.png" alt="">
                    <div>IE (New)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript Libraries -->

<!-- jQuery -->
<script src="<?= base_url('') ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= base_url('') ?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Malihu ScrollBar -->
<script src="<?= base_url('') ?>vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Site Functions & Actions -->
<script src="<?= base_url('') ?>js/app.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url('') ?>vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

<!-- Select 2 -->
<script src="<?= base_url('') ?>vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>

    <?php if(isset($fail)) {?>
    alert('<?=$fail?>');
    <?php } ?>


</script>

</body>
</html>
