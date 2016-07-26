<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pokemons</title>
</head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function()
		{
			var output = "";
			for(var i = 1; i < 156; i++)
			{
				output += "<img id='" + i + "' src='http://pokeapi.co/media/img/" + i + ".png'>";
			}	
			$('#pokemon').html(output);
			$(document).on("click", "img", function()
			{
				var num = $(this).attr("id");
				$.get("http://pokeapi.co/api/v1/pokemon/" + num + "/", function(data)
				{
					var description = "";
					var types = "";
					for (var j = 0; j < data.types.length; j++)
					{
						types += "<li>" + data.types[j].name + "</li>";

					}
					description += "<h2>" + data.name + "</h2>" + "<img src='http://pokeapi.co/media/img/" + num + ".png'>" + "<h3>Types</h3><ul>" + types + "</ul><h3>Height</h3><p>" + data.height + "</p><h3>Weight</h3><p>" + data.weight + "</p>"
				
					$('#info').html(description);
				},"json");	
			})
		});

	</script>
	<link rel="stylesheet" href="style.css">
<body>
	<div id="pokemon"></div>
	<div id="info"></div>
</body>
</html>