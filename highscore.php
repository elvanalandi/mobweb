<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyek Mobweb</title>
	<link rel="stylesheet" href="bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/bootstrap-4.3.1-dist/js/bootstrap.min.js">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style>
	</style>
</head>
<body onload="load()">
	<div class="container">
		<h2 class="col-lg-12" style="text-align: center">High Score</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Nickname</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody id="highfive">
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		var high=[];

		function load(){
			if (localStorage.getItem("high")) {
				high = JSON.parse(localStorage.getItem("high"));
				calculateScores();
			}
			else{
				resetScore();
			}
		}

		function displayScores() {
			$("#highfive").html("<tr><td>1</td><td>"+high[0].nick+"</td><td>"+high[0].score+"</td></tr>"+
				"<tr><td>2</td><td>"+high[1].nick+"</td><td>"+high[1].score+"</td></tr>"+
				"<tr><td>3</td><td>"+high[2].nick+"</td><td>"+high[2].score+"</td></tr>"+
				"<tr><td>4</td><td>"+high[3].nick+"</td><td>"+high[3].score+"</td></tr>"+
				"<tr><td>5</td><td>"+high[4].nick+"</td><td>"+high[4].score+"</td></tr>");
			localStorage.removeItem("nickname");
			localStorage.removeItem("score");
		}

		function calculateScores(){
			var nick = localStorage["nickname"];
			var score =  localStorage["score"];
			high.push({"nick":nick, "score":score});
		    //high.sort(function(o1,o2){return o1.score-o2.score}); //low to high
		    high.sort(function(o1,o2){return o2.score-o1.score}); //high to low
		    //high.shift(); //removes lowest at left, for low to high
		    high.pop(); //removes lowest at right, for high to low
		    var items = JSON.stringify(high);
		    localStorage.setItem("high", items);
		    displayScores();
		}
	</script>
</body>
</html>