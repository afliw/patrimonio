<div style="min-height: 100vh; display: flex; align-items: center;">
	<div class="row" >
		<div class="medium-6 medium-centered large-4 large-centered columns">

			<form>
				<div class="row column log-in-form"  id="box">
					<h4 class="text-center">Ingreso al sistema de gestión de clientes</h4>
					<label>Usuario
						<input type="text" placeholder="usuario@sistema" id="user">
					</label>
					<label>Contraseña
						<input type="text" placeholder="Contraseña" id="pass">
					</label>
					<input id="show-password" type="checkbox"><label for="show-password">Mostrar contraseña</label>
					<p><a type="submit" class="button expanded radius" id="btnLogin">ingresar</a></p>
					<p class="text-center"><a href="#">Ovidó su usuario?</a></p>
				</div>
			</form>

		</div>
	</div>
</div>
<!--
<div class="vertical-centered">

		<div class="small-3 medium-4 large-5 columns"></div>

			<div id="box" class="small-6 medium-4 large-2 columns">
				<span id="message" class="subheader"><strong>sistema de gestión de usuarios</strong></span>
				<br/>
				<br/>
				<input type="text" class="" id="user" placeholder="usuario">
				<br>
				<input type="password" class="" id="pass" placeholder="contraseña">

					<a href="#" class="button" id="btnLogin" role="button">éntrale!</a>
				<br/>
				<a class="subheader" href="https://es.wikipedia.org/wiki/Kyary_Pamyu_Pamyu">losvagos.com</a>
			</div>
		<div class="small-3 medium-4 large-5 columns"></div>


</div>
-->

<script type="text/javascript">

	// Cuando vas a usar una funcion directamente, sin mandarle parametros ni hacer acciones extras, podes settear el evento de esta forma:
	 $( "#btnLogin" ).click(checkData);
	
	function checkData(){
		var user = $("#user").val();
		var pass = $("#pass").val();
		
					
		var userVerification = user.search(/^[a-zA-Z]{1}|[a-zA-Z0-9_\.\-]{4,19}$/);
		var passVerification = 0;//pass.search(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/);
		
		if(userVerification == 0 && passVerification == 0){

			postData(user,pass);
			
		}else throwError("el usuario o contraseña no tiene los parámetros adecuados")
	}
	
	function throwError(message){


		$(".log-in-form").animateCss('shake');

		
	}
	

	function postData(user,pass){
		  	$.post("user/doLogin",{user:user,pass:pass}, function(result){
  			
  			if(!result){
  				throwError("error de autenticación")
  			}else{
  				//acá entra
  				window.location = "dashboard"; //aca te cambié para que use el controlador. joya, después repaso como era, mepa que lo entendí mal
  			}
  		});
	}
	
	$(document).keypress(function(e) {
	  if(e.which == 13) {
	    checkData();
	  }
	});
	

	
</script>