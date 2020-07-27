<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Probando | GranRol</title>
	<script src="./js/jquery-2.0.2.min.js"></script>
	<script>
	$(document).on("ready", function()
	{
		$(".search").keyup( function()
		{
			var correo = $(this).val();
			var funbuscar = 'email='+ correo;
			if(correo != '')
			{
				$.ajax({
					type: "POST",
					url: "buscar.php",
					data: funbuscar,
					cache: false,
					success: function(html)
					{
					$("#divResult").html(html).show();
					}
				});
			}
			if(correo == '')
			{
				$("#divResult").empty();
			}
			//return false;
		});
		/*$("#divResult").on("click",function(e)
		{ 
			var $clicked = $(e.target);
			var $name = $clicked.find('.name').html();
			var decoded = $("<div/>").html($name).text();
			$('#inputSearch').val(decoded);
		});
		
		$(document).on("click", function(e)
		{ 
			var $clicked = $(e.target);
			if (! $clicked.hasClass("search"))
			{
				$("#divResult").fadeOut(); 
			}
		});
		$('#inputSearch').on(function()
		{
			$("#divResult").fadeIn();
		});*/
	});
	</script>
</head>
<body>
	<div class="contentArea">
		<input type="text" class="search" id="inputSearch" />Ingrese un email<br /> 
		<div id="divResult">
		</div>
	</div>
</body>
</html>