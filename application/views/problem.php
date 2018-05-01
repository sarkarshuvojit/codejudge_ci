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
    <title>Problem - <?= $problem['title'] ?></title>

	<?php $this->load->view('sub-views/head.php') ?>

    <style>
        #editor {
            height: 200px;
            font-size: 1em;
        }
    </style>

</head>

<body>

<?php $this->load->view('sub-views/header.php') ?>

<section id="main">

	<?php $this->load->view('sub-views/sidebar.php') ?>
    <form action="/solution.do" method="post" id="code_form">
        <div class="card">
            <div class="card__header">
                <div class="col-sm-4">
                    <h2><?= $problem['title'] ?>
                        <small><?= $problem['difficulty'] ?></small>
                    </h2>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your name" name="solver" id="solver"
                               required>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <select class="select2" data-minimum-results-for-search="Infinity"
                                data-placeholder="Language" name="language" id="language" required>
                            <option></option>
                            <option value="c_cpp">C</option>
                            <option value="c_cpp">C++</option>
                            <option value="java" selected>Java</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card__body">
                <div class="row">
                    <div class="col-sm-12">
                        <pre style="background: rgba(255, 255, 255, 0.1);color: white;border: none;"><?= $problem['description'] ?></pre>
                    </div>
                    <div class="col-sm-12">
					<pre id="editor">import java.io.*;
import java.util.*;


class Solution {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

    }

}
</pre>

                        <textarea id="code" name="code" style="display: none;">import java.io.*;
import java.util.*;


class Solution {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

    }

}</textarea>
                        <input type="hidden" name="problemid" value="<?= $problem['id'] ?>">

                        <div class="form-group">
                            <button type="submit" class="btn btn--light btn-block">Submit Solution!</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--
    TODO: Faq
    1: When using java, class cannot be public and classname should be Solution
    2: C/C++ users do not use TurboC logic and use getch(), conio.h is a non standard library is deprecated now.
    3: While taking input do not print stuff like "Enter a Number:" and while outputting data don't output text like "Answer:", output whatever is specified in the question.

    -->

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

<script src="<?= base_url('ace/ace.js') ?>" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/github");
    editor.session.setMode("ace/mode/java");
    editor.setOptions({
        maxLines: editor.session.getLength() + 10
    });


    editor.getSession().on('change', function (e) {
        editor.setOptions({
            maxLines: editor.session.getLength() + 10
        });
        $("#code").val(editor.getValue());
    });

    $("#language").change(function (e) {
        editor.setValue("");
        editor.session.setMode("ace/mode/" + $(this).val());
    });
</script>

</body>
</html>
