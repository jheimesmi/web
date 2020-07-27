<div id="box4">
	<?php
	if($rango == 1)
	{
	?>
	<div id='cssmenu'>
		<ul>
		<li class='has-sub'><a href='./noticias'><span>Noticias</span></a>
		</li>

		<li class='has-sub'><a href='./certificacion'><span>Certificaciones</span></a>
		  <ul>
			<li class='has-sub'><a href='./certificacion?action=aprobadas'><span>Aprobadas</span></a>
			</li>
		  </ul>
		</li>

		<li class='has-sub'><a href='#'><span>Usuarios</span></a>
		<ul>
			<li class='has-sub'><a href='./usuarios'><span>Ver Usuarios</span></a>
			</li>
		</ul>
		</li>

		<li class='has-sub'><a href='#'><span>Perfiles</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Ver Perfiles</span></a>
			</li>
		</ul>
		</li>

		<li class='has-sub'><a href='#'><span>Baneos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Banear</span></a>
			</li>
		</ul>
		</li>

		<li class='has-sub'><a href='#'><span>Sanciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Condenar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Re-Condenar</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Facciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Estado</span></a>
			</li>
		</ul>
		</li>
	</ul>
	</div>
	Tienes todo esto por descubrir!
	<?php
	}
	else if($rango == 2)
	{
	?>
	<div id='cssmenu'>
	<ul>

	   <li class='has-sub'><a href='./noticias'><span>Noticias</span></a>
		<ul>
			<li class='has-sub'><a href='./noticias?action=administrar'><span>Administrar</span></a>
			</li>
		</ul>
		</li>
		
	   <li class='has-sub'><a href='./certificacion'><span>Certificaciones</span></a>
		  <ul>
			<li class='has-sub'><a href='./certificacion?action=aprobadas'><span>Aprobadas</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=pendientes'><span>Pendientes</span></a>
			</li>
		  </ul>
	   </li>
	   
		<li class='has-sub'><a href='#'><span>Usuarios</span></a>
		<ul>
			<li class='has-sub'><a href='./usuarios'><span>Ver Usuarios</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Perfiles</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Ver Perfiles</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Baneos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Banear</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Desbanear</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Sanciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Condenar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Re-Condenar</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Facciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Estado</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Vehículos</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Vehículos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Modificar</span></a>
			</li>
		</ul>
		</li>
	</ul>
	</div>
	<?php
	}
	else if($rango == 3)
	{
	?>
	<div id='cssmenu'>
	<ul>
	
	   <li class='has-sub'><a href='./noticias'><span>Noticias</span></a>
		<ul>
			<li class='has-sub'><a href='./noticias?action=administrar'><span>Administrar</span></a>
			</li>
			<li class='has-sub'><a href='./noticias?action=crear'><span>Crear Noticias</span></a>
			</li>
			<li class='has-sub'><a href='./noticias?action=log'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
	   <li class='has-sub'><a href='./certificacion'><span>Certificaciones</span></a>
		  <ul>
			<li class='has-sub'><a href='./certificacion?action=aprobadas'><span>Aprobadas</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=pendientes'><span>Pendientes</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=constancias'><span>Constancias</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=log'><span>Log</span></a>
			</li>
		  </ul>
	   </li>
	   
		<li class='has-sub'><a href='#'><span>Usuarios</span></a>
		<ul>
			<li class='has-sub'><a href='./usuarios'><span>Ver Usuarios</span></a>
			</li>
			<li class='has-sub'><a href='./usuarios?action=crear'><span>Crear Usuario</span></a>
			</li>
			<li class='has-sub'><a href='./usuarios?action=log'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Perfiles</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Ver Perfiles</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Editar Perfil</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Crear Perfil</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Baneos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Banear</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Desbanear</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Sanciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Condenar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Re-Condenar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Facciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Estado</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Vehículos</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Vehículos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Modificar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Propiedades</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Casas</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Negocios</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
	</ul>
	</div>
	<?php
	}
	else if($rango == 4)
	{
	?>
	<div id='cssmenu'>
	<ul>
	
	   <li class='has-sub'><a href='./noticias'><span>Noticias</span></a>
		<ul>
			<li class='has-sub'><a href='./noticias?action=administrar'><span>Administrar</span></a>
			</li>
			<li class='has-sub'><a href='./noticias?action=crear'><span>Crear Noticias</span></a>
			</li>
			<li class='has-sub'><a href='./noticias?action=log'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
	   <li class='has-sub'><a href='./certificacion'><span>Certificaciones</span></a>
		  <ul>
			<li class='has-sub'><a href='./certificacion?action=aprobadas'><span>Aprobadas</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=pendientes'><span>Pendientes</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=constancias'><span>Constancias</span></a>
			</li>
			<li class='has-sub'><a href='./certificacion?action=log'><span>Log</span></a>
			</li>
		  </ul>
	   </li>
	   
		<li class='has-sub'><a href='./usuarios'><span>Usuarios</span></a>
		<ul>
			<li class='has-sub'><a href='./usuarios'><span>Ver Usuarios</span></a>
			</li>
			<li class='has-sub'><a href='./usuarios?action=crear'><span>Crear Usuario</span></a>
			</li>
			<li class='has-sub'><a href='./usuarios?action=log'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Perfiles</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Ver Perfiles</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Editar Perfil</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Crear Perfil</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Baneos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Banear</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Desbanear</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Sanciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Condenar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Re-Condenar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Facciones</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Estado</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Vehículos</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Vehículos</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Modificar</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Propiedades</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Casas</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Negocios</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
		
		<li class='has-sub'><a href='#'><span>Estadísticas</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Ingresos</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Usuarios</span></a>
			</li>
			<li class='has-sub'><a href='#'><span>Log</span></a>
			</li>
		</ul>
		</li>
	</ul>
	</div>
	<?php
	}
	else
	{
		echo "Error, contacta a un administrador";
	}
	?>
</div>