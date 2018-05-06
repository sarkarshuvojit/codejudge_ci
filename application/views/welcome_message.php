<?php
//include '../helper/__init__.php';

?>


<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codejudge - Choose portal</title>

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
    <div class="login__block toggled" id="l-lockscreen">
        <div class="login__block__header">
            <img src="demo/img/profile-pics/1.jpg" alt="">
            Please choose portal
        </div>

        <div class="login__block__body">


            <a href="teacher/login" class="btn btn--light m-t-15">Teacher <i class="zmdi zmdi-account"></i></a>

            <a href="student/login" class="btn btn--light m-t-15">Student <i class="zmdi zmdi-accounts-alt"></i></a>
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

<!-- Bootstrap Notify -->
<script src="<?= base_url('') ?>vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

<!-- Select 2 -->
<script src="<?= base_url('') ?>vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?= base_url('ace/ace.js') ?>" type="text/javascript" charset="utf-8"></script>


</body>
</html>
