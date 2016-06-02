
<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="#">sistema de gestión de clientes</a></h1>
		</li>
		<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>

	<section class="top-bar-section">
		<!-- Right Nav Section -->
		<ul class="right">
			<li class="active"><a href="#">salir</a></li>
		</ul>

		<!-- Left Nav Section -->
		<ul class="left">
			<li><a href="#">menu 1</a></li>
			<li><a href="#">menu 2</a></li>
			<li><a href="#">menu 3</a></li>
		</ul>
	</section>
</nav>

<div id="ajax_main_container"></div>


	<script>

		$.get( "dashboard/test", function( data ) {
			$( "#ajax_main_container" ).html( data );
		});
		
		
		/*$.get( "view/datagridtest.php", function( data ) {
		    $( "#datagridcontainer" ).html( data );
		});*/


	</script>

	<!---HASTA ACA-->

<!--</body>-->
<!--</html>-->