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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://bootswatch.com/2/cosmo/bootstrap.min.css">

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        
        <div class="container">
        	<div class="row">
        		<h1>top-down view of a course</h1>
        	</div>
        </div>

        <div class="container">
        	<div class="row">
        		<div id="graph"></div>
        	</div>
        </div>	



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<!-- Latest compiled and minified Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- CanJS - an alternative to Angular - allows for interesting client side interactions-->
		<script src="http://canjs.com/release/2.2.4/can.jquery.js"></script>
		<!-- D3 is a brilliant library for data visualisations -->
		<script src="http://d3js.org/d3.v3.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script type="text/javascript">
        	var data = <?= json_encode($pages,JSON_PRETTY_PRINT) ?>;
        	var dataMap = data.reduce(function(map, node) {
			 map[node.name] = node;
			 return map;
			}, {});
			var treeData = [];
			data.forEach(function(node) {
			 // add to parent
			 var parent = dataMap[node.parent];
			 if (parent) {
			  // create child array if it doesn't exist
			  (parent.children || (parent.children = []))
			   // add node to child array
			   .push(node);
			 } else {
			  // parent is null or missing
			  treeData.push(node);
			 }
			});

			// ************** Generate the tree diagram  *****************
			var margin = {top: 20, right: 120, bottom: 20, left: 120},
			 width = 960 - margin.right - margin.left,
			 height = 500 - margin.top - margin.bottom;
			 
			var i = 0;

			var tree = d3.layout.tree()
			 .size([height, width]);

			var diagonal = d3.svg.diagonal()
			 .projection(function(d) { return [d.y, d.x]; });

			var svg = d3.select("body").append("svg")
			 .attr("width", width + margin.right + margin.left)
			 .attr("height", height + margin.top + margin.bottom)
			  .append("g")
			 .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

			root = treeData[0];
			  
			update(root);

			function update(source) {

			  // Compute the new tree layout.
			  var nodes = tree.nodes(root).reverse(),
			   links = tree.links(nodes);

			  // Normalize for fixed-depth.
			  nodes.forEach(function(d) { d.y = d.depth * 180; });

			  // Declare the nodesâ€¦
			  var node = svg.selectAll("g.node")
			   .data(nodes, function(d) { return d.id || (d.id = ++i); });

			  // Enter the nodes.
			  var nodeEnter = node.enter().append("g")
			   .attr("class", "node")
			   .attr("transform", function(d) { 
			    return "translate(" + d.y + "," + d.x + ")"; });

			  nodeEnter.append("circle")
			   .attr("r", 10)
			   .style("fill", "#fff");

			  nodeEnter.append("text")
			   .attr("x", function(d) { 
			    return d.children || d._children ? -13 : 13; })
			   .attr("dy", ".35em")
			   .attr("text-anchor", function(d) { 
			    return d.children || d._children ? "end" : "start"; })
			   .text(function(d) { return d.name; })
			   .style("fill-opacity", 1);

			  // Declare the linksâ€¦
			  var link = svg.selectAll("path.link")
			   .data(links, function(d) { return d.target.id; });

			  // Enter the links.
			  link.enter().insert("path", "g")
			   .attr("class", "link")
			   .attr("d", diagonal);

			}
        </script>


    </body>
</html>
