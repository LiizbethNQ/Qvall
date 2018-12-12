<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
<!-- ----------------------------------------------------------------- -->


<!--=========================================-->


<div class="card w-100 m-t-5">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-rigth m-b-20">
          <!------------------Buscador--------------------------------------->
          <div class="col-sm-8 my-1 text2">
   
          <div class="input-group mb-2">
        <div class="input-group-prepend">
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Grupo ABC">
      <a href="<?= base_URL()?>admin/gruposnr" class="btn btn-primary bg-naranja">Buscar</a>
        </div>
      </div>
    </div>
             
            <!--============Botones en conjunto=============================-->
  
                   <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                   <div class="btn-group" role="group" aria-label="First group">

            <!--============Boton alta=============================-->

                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i> Alta
                                 </button>
                                     <div class="btn-group" role="group">
                     <!--============Boton alta=============================-->

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana2"><i class="fa fa-exchange-alt"></i> Cargar Archivo 
                              <div class="btn-group" role="group"> </button>
                                <!--============Botones en Exportar=============================-->

                                
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Exportar</button>        
                        <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">  
                          <ul>
                        <li class="dropdown-item text2" lla="mod" llt="E" data-toggle="modal" data-target="#">
                        CVS</li>
                           </ul>
                           <ul>
                        <li class="dropdown-item text2" lla="mod" llt="E" data-toggle="modal" data-target="#">
                        JSON</li>
                           </ul>
                    </div>
           
                  </div>
                </div>
              </div>
            </div>
  </div>
            </div>

 <div class="col-5 text2">
                 <h4> <th><i></i>RESULTADOS DE BUSQUEDA</th></h4>
     </div>

            <!--=============Menu grupos============================-->
            <div class="col-12 m-t-20 text2">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Internos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Externos</a>
                </li>
              </ul>
            </div>
            <!--============Tablas=============================-->
            <div class="col-12 text2">

            <!--============Tabla de Grupos Internos =============================-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade  show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12 m-t-20">
                        <table class="table table-hover">
                          <thead class="thead-qval">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Tipo</th>
                              <th scope="col">Numero de usuarios</th>
                              <th scope="col">Cuestionarios</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                     <tr>
                <td>1</td>
                <td>Nombre</td>
                <td>Interno</td>
                <td>34</td>
                <td>2</td>
                <td>
               <div class="col-2 p-b-20 text2">
                    <div class="btn-group" role="group">
                          
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>        
                        <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">  
                          <ul>
                        <li class="dropdown-item" lla="mod" llt="E" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-wrench" aria-hidden="true"></i> Modificar</li>
                           </ul>
                            <ul>
                        <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#myModal2">
                         <i class="fa fa-ban" aria-hidden="true"></i> Borrar</li></ul></div>
                    </div>
                </div>
              </td>
            </tr>



</tbody>
</table>
</div>
</div>
</div>
</div>


            <!--============Tabla de Grupos Externos =============================-->

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12 m-t-20">
                        <table class="table table-hover">
                          <thead class="thead-qval">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Tipo</th>
                              <th scope="col">Numero de usuarios</th>
                              <th scope="col">Cuestionarios</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tbody>
            
                <tr>
                <td>1</td>
                <td>Nombre</td>
                <td>Externo</td>
                <td>34</td>
                <td>2</td>
                <td>
                  <div class="col-2 p-b-20 text2">
                    <div class="btn-group" role="group">
                          
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>        
                        <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">  
                          <ul>
                        <li class="dropdown-item" lla="mod" llt="E" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-wrench" aria-hidden="true"></i> Modificar</li>
                           </ul>
                            <ul>
                        <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#myModal2">
                         <i class="fa fa-ban" aria-hidden="true"></i> Borrar</li></ul></div>
                    </div>
                </div>
              </td>
            </tr>



</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

<!--------------------Opcion1 Modificar------------------------->
  <!-- Modal1 -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
   
      <!-- Modal content-->
  <!----header de la ventana----->
    <div class="modal-header header1" > 
      <h4> <div class="modal-title">Modificar Grupo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div class="text0" aria-hidden="true">x</div>
        </button>
      </div>
<!----Contenido de la ventana----->
 <!----Caja de texto---------->

<div class="modal-body text2">
      <p>Nombre:</p>
      <input type="text" class="form-control" placeholder="Grupo ABC">
      <br>
<!--------------Radio Button--------------->
    <div class="col-12">

<label class="radio-inline"><input type="radio" name="optradio" checked>Interno</label>
<label class="radio-inline"><input type="radio" name="optradio">Externo</label>
</div>
<br>
<!----Footer de la ventana----------->
      <div class="col-12">
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <button type="button" class="btn btn-primary data bg-naranja">Guardar</button>
      <button type="button" class="btn btn-primary data bg-gris" data-dismiss="modal">Cancelar</button> 
    </div>
    <br>
    <br>
         
<!----Alert----------->
<div class="justify-content-between text5">
  <div class="alert alert-info" role="alert">
<b>Llena corectamente los datos solicitados</b>
</div>
     </div>

   
   </div>
  </div>
</div> 

</div>
<!--fin-->

<!-- -----------------Opcion2 Borrar------------------------------- -->
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">

<!----header de la ventana----->
      <div class="modal-header header1">
        <h4><div class="modal-title">Borrar Grupo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div class="text0" aria-hidden="true">x</div>
        </button>       
      </div>
      
<!----Contenido de la ventana---------->
    <div class="container-fluid">
    <div class="modal-body titlemodal"> 
   <p>¿Está seguro de eliminar este Grupo?</p>
</div>
  <div class="modal-body text2">
  <ul>
<li type= disc>Todos los usuarios de este grupo no tendrán grupo asignado, por lo consiguiente no podrán usar y responder cuestionarios de QVAL.</li>
<li type= disc>Todos los usuarios de este grupo no tendrán grupo asignado, por lo consiguiente no podrán usar y responder cuestionarios de QVAL.</li>
<li type= disc>Todos los cuestionarios con este grupo pasarán a ser archivados.</li>

<li type= disc>Todos los informes especiales y preguntas de este grupo serán alterados</li>

<li type= disc>Le recomendamos los siguientes pasos previos:</li>
<ul>
<li>Reasignar los usuarios a otro grupo.</li>
<li>Reasignar cuestionarios a otro grupo.</li>
</ul>

<li type= disc>Se enviara un email a los usuarios implicados notificando los cambios.</li>
</ul>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;







        <button type="button p-r-50" class="btn btn-primary bg-naranja">Aceptar</button>    
        <button type="button" class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</button>   
    </div>
    <!----Footer de la ventana----------->
    

    </div>
  </div>

    </div>
</div>
</div>
</div>

 <!---pantalla obscura tras la ventana-->
  <div class="modal fade" id="ventana2">
    <div class="modal-dialog">
      <div class="modal-content">
  <!----header de la ventana----->
    <div class="modal-header header1">
      <h4> <div class="modal-title">Cargar Archivo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div class="text0" aria-hidden="true">x</div>
        </button>
    </div>

<!----Contenido de la ventana----->
           <div class="modal-body text2">
      
      <p>
            1.-Descarga la plantilla (csv) para guardar los registros.
            <br>
            2.-Llena las columnas correctamente.
            <br>
            3.-Guarda el archivo en el mismo formato (csv).
            <br>
            4.-Al terminar sube el archivo dando click en el botón "Subir Archivo".
            <br>
            5.-Espera a que el sistema confirme que a guardado tus datos.
            <br>
            6.-No olvides al terminar de cargar los registros, agregar un
              grupo a cada usuario.
      </p>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <!----Footer de la ventana----------->
               <button type="button" class="btn btn-info bg-naranja">Descargar CSV</button> 
               <button type="button" class="btn btn-info bg-verde">Subir Archivo</button> 
               <button type="button" class="btn btn-info bg-gris" data-dismiss="modal">Cancelar</button>  

            </div>
   </div>
 </div> 
</div> 

</div>
    <!--fin-->
  
