<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code Judge</title>

	<?php $this->load->view('sub-views/head.php') ?>

</head>

<body>

<?php $this->load->view('sub-views/header.php') ?>

<section id="main">

	<?php $this->load->view('sub-views/sidebar.php') ?>

    <div class="card">
        <div class="card__header">
            <h2>Add Problem
                <small>Add problem title, describe the problem properly and provide a test case and it's answer.
                </small>
            </h2>
        </div>
        <div class="card__body">
            <div class="row">
                <div class="col-sm-12">

                    <form action="add.do" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your name" name="creator" id="creator"
                                   required>
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title" id="title"
                                   required>
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Description" name="description"
                                      required></textarea>
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Test Input" name="testin"
                                      required></textarea>
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Test Output" name="testout"
                                      required></textarea>
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <select class="select2" data-minimum-results-for-search="Infinity"
                                    data-placeholder="Difficulty" name="difficulty" id="difficulty" required>
                                <option></option>
                                <option value="Easy">Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard">Hard</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--light btn-block">Add Problem!</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</section>

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


</body>
</html>