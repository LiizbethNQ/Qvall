
  
  <!-------------Encabezado----------------------------------->
 <header>
<div class="container-fluid margin-top-20 card-body1">
		<div class="row">
			<div class="col-12">
				<table class="float-right">
					<tr>
						
						<td>
						
	<a class="nav-link col-12 text-right m-t-20" href="<?= base_URL()?>Welcome"><p class="font-weight-bold text2">Cerrar Sesiòn</p></a>

                		</td>
					</tr>
				</table>
			</div>
	</div>
</div>
<div class="container-fluid card-body1">
	<div class="row">
		<div class="col-12 text-center">
			<img src="<?= base_URL()?>/assets/img/qval.png" class="img-fluid" alt="">
		</div>
	</div>
</div>
<nav class="menu-pc div-invisible-sm wsmenu clearfix  margin-top-20">
				
				<div class="col-9 text-right float-right wsmenulist">
					<ul class="mobile-sub wsmenu-list float-right">
<!----------------------------Home----------------------------------------->
						
						<li><a href="<?= base_URL()?>admin">Home</a>
							
				       </li>
<!----------------------------Grupos----------------------------------------->
					   <li><a href="<?= base_URL()?>Grupos">Grupos</a>
				       </li>		
<!----------------------------Usuarios----------------------------------------->
					   <li><a href="<?= base_URL()?>Usuarios">Usuarios</a>
				       </li>		
<!----------------------------Clientes/Proveedores----------------------------------------->
					   <li><a href="<?= base_URL()?>Clientesp">Clientes/Proveedores</a>
				       </li>		
					   				   
<!----------------------------Cuestionarios----------------------------------------->
							
						<li><a href="<?= base_URL()?>Cuestionarios">Cuestionarios</a>
						
				       </li>		
					   
<!----------------------------Preguntas----------------------------------------->
						<li><a href="<?= base_URL()?>Preguntas">Preguntas</a>
							
				       </li>
					   
<!----------------------------Resultados----------------------------------------->
							
					   <li><a href="<?= base_URL()?>Resultados">Resultados</a>
							
				       </li>
<!----------------------------Resultados----------------------------------------->
							
					   <li><a href="<?= base_URL()?>Cargae">Carga Express</a>
							
				       </li>

<!----------------------------Descarga App----------------------------------------->
		
		             <li><a class="item-menu" href="https://admyo.com/qval/assets/apk/android/qval.apk" target="_blank">Descargar App</a>		       
				       </li>

<!----------------------------Admyo----------------------------------------->
	
					   <li><a href="http://admyo.com">Admyo</a>
							
				       </li>
				   </ul>
               </div>
		  </nav>

</header>
<!---------------------------------------------------------------------------------------------->

<!--------------------------------body datos---------------------------------------------------->

		<div class="col-12 no-float" id="carga">
			
		</div>
		
<!-------------------------Modals--------------------------------------------------------------------->

<div class="izimodal" id="borrargrupo" data-zindex="1031" data-width="40%">
	<div class="container">
		<div class="row">
			<div class="col-12 p-l-20 p-r-20">
				<h3>¿Está seguro de eliminar este Grupo?</h3>
			</div>
			<div class="col-12 p-l-20 p-r-20">
				
				<ul>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> Todos los usuarios de este grupo no tendrán grupo asignado, por lo consiguiente no podran usar y responder cuestionarios de QVAL.</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> Todos los cuestionarios con este grupo pasarán a ser archivados.</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> Todos los informes especiales y preguntas de este grupo seran alterados</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> Le recomendamos los siguientes pasos previos:
						<ul>
							<li> <i class="fa fa-angle-double-right" aria-hidden="true"></i> Reasignar los usuarios a otro grupo.</li>
							<li><i class="fa fa-angle-double-right" aria-hidden="true"></i> Reasigbar cuestionarios a otro grupo.</li>
						</ul>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> Se enviara un email a los usuarios implicados notificando los cambios</li>
				</ul>
			</div>
			<div class="col-12 m-t-10 m-b-10 text-right">
				<button class="btn btn-danger m-r-20" onclick="help.borrargrup(this.id)" id="">Borrar</button>
				<button class="btn btn-secondary" data-izimodal-close>Cancelar</button>
			</div>
		</div>
	</div>
</div>
<div class="izimodal" id="msgerror" data-header-color="#B20000" data-width="40%">
	<div class="container bodyerror">
		<div class="row">
			<div class="col-12">
				<h4></h4>
			</div>
		</div>
	</div>
</div>
<div class="izimodal" id="sncuest"  data-header-color="#B20000" data-width="40%">
	<div class="container bodyerror">
		<div class="row">
			<div class="col-12">
				<p class="text-center"><h5>No hay cuestionarios!</h5></p>
				<div class="col-12 m-t-10 m-b-10 text-right">
				<button class="btn btn-success m-r-20 p-cues">Agregar Cuestionario</button>
				<button class="btn btn-secondary" data-izimodal-close>Cancelar</button>
			</div>
			</div>
		</div>
	</div>
</div>