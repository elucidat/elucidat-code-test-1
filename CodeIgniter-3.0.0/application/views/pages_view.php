<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
	        <div class="jumbotron">
	  			<h1>Hello developer!</h1>
	  			<p>This data represents the structure of an Elucidat e-learning course. Your task, if you choose to accept it, is to show this in an interesting, and useful way.</p>
	  		
	  			<ul>
		  			<li>We've included some useful libraries to get you going. Feel free to use these, or use your own. Up to you.</li>
		  			<li>The data represents a set of pages. The Learner will progress through the pages in order, following the links within the pages.</li>
		  			<li>There are often multiple links within a page, so the Learner may not progress in a linear order - these are shown in the 'other links' variables - and (hint) are the most interesting bit of this test.</li>
		  			<li>This display is intended for the author of the course, who is wanting to understand how a Learner might progress through the course.</li>
		  			<li>You must display the structure in an interesting way.</li>
		  			<li>Feel free to add to the data if you want - if you think an extra bit of page data would be useful to a content author - add it. Extra data could be related to the editing process, or to how Learners are interacting with the page.</li>
		  			<li>What it looks like is important.</li>
		  			<li>You must make it interactive (for example implement a filter).</li>
		  			<li>Please make sure that your filter is implemented server-side (to force you to demonstrate your PHP).</li>
		  			<li>Documentation is important. So are Unit tests.</li>
	  			</ul>
	  		</div>

	  		<h2>Course data:</h2>
  			<pre><code><?php echo json_encode( $pages, JSON_PRETTY_PRINT ); ?></code></pre>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<!-- Latest compiled and minified Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- CanJS - an alternative to Angular - allows for interesting client side interactions-->
		<script src="http://canjs.com/release/2.2.4/can.jquery.js"></script>
		<!-- D3 is a brilliant library for data visualisations -->
		<script src="http://d3js.org/d3.v3.min.js"></script>
		<!-- Now over to you - have fun! -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
