	<script src="assets/js/appclie.js" ></script>


<?php
$num="";
// var_dump($pais);

?> 

<div class="container m-t-30">
	<div class="row">
		<div class="card w-100">
			<div class="card-body">
				<div class="container">
					<div class="row">
						<div class="col-12 text-rigth m-b-20">

							<!---->
								<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups" ng-controller="listadoCtrl">
                <div class="input-group" id="content-search">

                <input type="text" class="search form-control" placeholder=" Cliente/Proveedor">
                <button id="search-btn" class="btn btn-primary bg-naranja" ><i class="fa fa-search"></i></button>
                </div>
            <span class="counter pull-right"></span>
              

								<div class="btn-group" role="group" aria-label="First group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Add-cliente"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</button>

									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalexpresclie"><i class="fa fa-exchange-alt"></i> Cargar Archivo</button>

									 <div class="btn-group" role="group"> </div>
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Exportar</button>    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="assets/plantillas/plantillasnuev/clientes.csv">CVS</a>
					<a class="dropdown-item" id="exporjsonclie">JSON</a>

                    </div>
                </div>
                </div>
            </div>
          </div>
          <!--section button-->
						<div class="col-12">
            <table class="table table-hover table-bordered results">
								<thead class="thead-qval">
									<tr>
										<th cope="col">#</th>
										<th cope="col">Razon Social</th>
										<th cope="col">Nombre Comercial</th>
										<th cope="col"></th>
									</tr>
									<tr class="warning no-result">
                                           <td colspan="12"><i class="fas fa-exclamation-circle"></i> No se encuentran resultdos...</td>
                                        </tr>
								</thead>
								<tbody>
									<?php
									if($listclie)
									{
										foreach ($listclie as $cliente) {
											?>
											<tr>
												<td></td>
												<td><?=$cliente->Nombre?></td>
												<td><?=$cliente->NombreComercial?></td>
												<td>
													<div class="btn-group" role="group"><button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>			
														<div class="dropdown-menu accion-funCl" aria-labelledby="btnGroupDrop1">
															<ul>
																
																<li lla="mod-funC" class="dropdown-item" llt="E" llc="<?=$cliente->IDCliente?>">
																	<i class="fa fa-wrench" aria-hidden="true"></i> Modificar</li>
																<li lla="del-funC" class="dropdown-item" llt="E" llc="<?=$cliente->IDCliente?>"><i class="fa fa-ban"  aria-hidden="true"></i> Borrar</li>
																<li lla="qr-funC"  class="dropdown-item"  id="E|<?=$cliente->Usuario?>"><i class="fa fa-qrcode" aria-hidden="true"></i> Código QR</li></ul>
														</div></div>

												</td>
											</tr>
											<?php
										}
									}
									?>

								</tbody>
							</table>
							<nav aria-label="Page navigation example">
							  
							    <?= $links ?>
							</nav>
							 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!----------------------Modals----------------------------------------->
<div class="modal fade" id="Add-cliente">
	<div class="modal-dialog modal-lg">
		<div class="modal-content text2">
			<div class="modal-header header1">
				<h4 class="modal-title">Datos Clientes</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="rz">Razon Social</label>
								<div class="input-group">
									<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input required type="text" name="RZ" class="form-control" id="rz" lln="RazonSocial">
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cm">Nombre Comercial</label>
								<div class="input-group">
									<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-star" aria-hidden="true"></i></span>
									<input required type="text" name="NC" class="form-control" id="cm" lln="NombreComercial">
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="tp">Tipo Contribuyente</label>
								<div class="input-group">
									<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-male" aria-hidden="true"></i></span>
									<select required name="TPersona"  class="form-control" id="tp" lln="Tipocontribuyente">
										<option value="PM">Persona Moral</option>
										<option value="PMF">Persona Física Act. Empresarial </option>
										<option value="PF">Persona Física </option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="rfc">RFC</label>
								<input  type="text"  name="RFC" class="form-control" id="rfc" lln="RFC">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="pais">Pais</label>
								<div class="input-group">
									<span class="input-group-addon succes" id="pais"><i class="fa fa-globe" aria-hidden="true"></i></span>
									<select  name="Pais" class="form-control" id="pais" lln="Pais">
										<?php if($pais!==false):
            foreach ($pais as $key) {
              ?>
              <option value="<?=$key->id?>"><?= $key->paisnombre?></option>
              <?php
            }
            ?>

          <?php endif ?>
			</select>
              
		
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="estado">Estado</label>
								<div class="input-group">
									<span class="input-group-addon succes" ><i class="fa fa-building" aria-hidden="true"></i></span>
									<select  name="Estado" id="estados" class="form-control" id="estado" lln="Estado">
										<option value="">Selecciona</option>
										<?php
											foreach ($muni as $mun) {
												?>
												<option value="<?= $mun->id?>"><?= $mun->estadonombre?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="municipio">Municipo</label>
								<div class="input-group">
									<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-building-o" aria-hidden="true"></i></span>
									<input  name="Municipio"  class="form-control" id="municipio" lln="Municipio">
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="cn">Colonia, Calle y Numero</label>
								<input name="Direccion"  class="form-control" id="cn" lln="Calle">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="grupo">Grupo</label>
								<div class="input-group">
									<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-users" aria-hidden="true"></i></span>
									<select required  name="Grupo" class="form-control" id="grupo" lln="Grupo">
										<option value="0">Selecciona..</option>
            <?php if($perfiles!==false):
            foreach ($perfiles as $key) {
              ?>
              <option value="<?= $key->IDGrupo?>-<?=$key->Tipo?>"><?= $key->Nombre."->".$key->Tipo?></option>
              <?php
            }
            ?>

          <?php endif ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Datos de Contacto</h4>
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="apellido">Apellidos</label>
												<input  name="Apellidos"  class="form-control" id="apellido" lln="Apellido">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="puesto">Puesto</label>
												<input name="Puesto"  class="form-control" id="puesto" lln="Puesto">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label required for="email">Correo Electrónico</label>
												<div class="input-group">
													<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-building-o" aria-hidden="true"></i></span>
													<input required name="Email" type="email"  class="form-control" id="email" lln="Email">
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="tel">Teléfono</label>
												<div required class="input-group">
													<span class="input-group-addon succes" id="basic-addon2"><i class="fa fa-phone" aria-hidden="true"></i></span>
													<input  name="Tel" class="form-control tel" type="text" id="tel" lln="Telefono">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 m-t-10">
							<div class="alert alert-info" role="alert">
							  Se enviara la contraseña al correo electronico proporcionado para confirmar que es valido el Email.
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button  id="btnadd-clie" class="btn btn-primary" >Guardar</button>
					<button type="button" class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</button>
				</div>
			
			</div>
		</div>
	</div>
<div class="modal fade "  id="qr-funct" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content text2">
							<div class="modal-header header1">
								<h4 class="modal-title">Código QR</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-12 text-center" >
										<img src='' class="img-fluid" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<div class="modal" id="exporjson" tabindex="-1" role="dialog">
	 <div class="modal-dialog" role="document">
	 	 <div class="modal-content text2">
		 	 	<div class="modal-header header1">
		        <h4 class="modal-title">Clientes Qval</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="card">
				  <div class="card-body">
				    This is some text within a card body.
				  </div>
				</div>
		      </div>
	 	 </div>
	 </div>
</div>
<div class="modal fade" id="modalexpresclie" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text2">
      <div class="modal-header header1">
        <h4 class="modal-title">Alta Express Clientes/Proveedores</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div class="container">
       		<div class="row ">
       			<ol class="p-l-20 p-r-20">
		       		<li>Descarga la plantilla (csv) para guardar los registros.</li>
		       		<li>Llena las columnas correctamente.</li>
		       		<li>Guarda el archivo en el mismo formato (csv).</li>
		       		<li>Al terminar sube el archivo dando click en el boton "Subir Archivo".</li>
		       		<li>Espera a que el sistema confirme que a guardado los datos.</li>
		       		<li>No olvides al terminar de cargar los registros, agregar un grupo a cada Cliente o Proveedor.</li>
		       		<li>En la columna "Tipo Persona", copia el prefijo que esta dentro del parentesis según sea el caso:
		       			<ul class="p-l-20 p-r-20">
		       				<li>Persona Física ( PF )</li>
		       				<li>Persona Física con actividad empresarial ( PFE )</li>
		       				<li>Persona Moral ( PM )</li>
		       			</ul>
		       		</li>
		       		<li>Los campos Apellidos,Correo Electrónico,Puesto y Teléfono son de la persona representante de la empresa.</li>
		       	</ol>
		   
       	<div class=" col-12 alert alert-primary" role="alert">
			Esperando datos...
		</div>
       </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a   target="_blank" href="assets/plantillas/plantillasnuev/clientes.csv"><label class="btn btn-primary bg-naranja" for="">Descargar Plantilla</label></a>
        <label  class="btn btn-primary bg-verde">Subir Archivo
        	<form id="frmchang" enctype="multipart/form-data" >
			 	<input type="file" style="display: none;" name="usuexpres" accept=".csv" id="altaexpresclie">
			</form>
        </label>

        <label  class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</label>
           	
       		</div>
       	</div>
      </div>
    </div>
  </div>
</div>