
<!---------------------Agrega registros nuevos a la tabla-------------------------------------------->
<?php
$num="";
if($perfiles!=false){
  $internos="";
  $externos="";
  $int=1;
  $ext=1;
  if($perfiles){
    foreach ($perfiles as $key) {
    if($key->Tipo=="I"){
      $internos.="<tr><td>".$int."</td><td>".$key->Nombre.'</td><td>Interno</td><td>

      <div class="btn-group" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
      <div class="dropdown-menu accion-grupoI" aria-labelledby="btnGroupDrop1">
      <ul>

      <li class="dropdown-item" lla="mod" llt="I" id="'.$key->IDGrupo.'">
      <i class="fa fa-wrench" aria-hidden="true">
            </i>Modificar</li>


            <li lla="del" class="dropdown-item" llt="I" id="'.$key->IDGrupo.'">
            <i class="fa fa-ban" aria-hidden="true">
            </i> Borrar</li>
            </ul>
            </div>
            </div>
      </td>
      </tr>';
      $int++;

    }else{
      $externos.="<tr><td>".$ext."</td><td>".$key->Nombre.'</td><td>Externo</td><td>

      <div class="btn-group" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
      <div class="dropdown-menu accion-grupoI" aria-labelledby="btnGroupDrop1">
      <ul>

      <li class="dropdown-item" lla="mod" llt="E" id="'.$key->IDGrupo.'">
      <i class="fa fa-wrench" aria-hidden="true">
            </i>Modificar</li>


     <li  class="dropdown-item" lla="del" llt="E" id="'.$key->IDGrupo.'">
      <i class="fa fa-ban" aria-hidden="true">
      </i> Borrar</li>
      </ul>
      </div>
      </div>
      </td>
      </tr>';
      $ext++;
    }
  }
  }
  
  $num=$key->IDEmpresa;
}
?>


<div class="container">
  <div class="row">

    <div class="card w-100 m-t-50">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-rigth m-b-20">

<!------------------------------BUSCADOR----------------------------------------------------------------->
              <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups" ng-controller="listadoCtrl">
                <div class="input-group">
                  <input type="text" placeholder="  Grupo ABC" name="caja_busqueda" id="caja_busqueda">
                  <button class="btn btn-primary bg-naranja" ><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            
                <div id="datos">
                  

                </div>
                <script src="jquery.min.js"></script>
                <script src="js/main.js"></script>



<!------------------------------------------------------------------------------------------------------->
<!------------------------------MENU EN CONJUNTO--------------------------------------------------------->


                <div class="btn-group" role="group" aria-label="First group">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-grupo"><i class="fa fa-user-plus"></i> Alta</button>


                <div class="btn-group" role="group"></div>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana2"><i class="fa fa-exchange-alt"></i>Cargar Archivo </button>


                                <div class="btn-group" role="group"> </div>
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Exportar</button>    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="<?= base_URL() ?>/admin/cvs_export?num=<?=$num ?>">CVS</a>
                         <!-- <a class="dropdown-item" href="<?= base_URL() ?>/admin/JSon_export?num=<?=$num ?>">JSON</a -->

                    </div>
                </div>
            </div>
          </div>
<!-----------------------------------------------------------------------------------------------------

  
<!---------------------------MENU GRUPOS----------------------------------------------------------------->

            <div class="col-12 m-t-20">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfiles Internos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Perfiles Externos</a>
                </li>
              </ul>
            </div>

            <!--------------------------------TABLAS DE GRUPOS------------------------------------------------------->
            <div class="col-12">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12 m-t-20">
                        <table class="table table-hover">
                          <thead class="thead-qval">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Tipo</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                            if($internos){
                              echo $internos; 
                            }
                            
                            ?>
                   </tbody>
                       
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12 m-t-20">
                        <table class="table table-hover">
                          <thead class="thead-qval">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Tipo</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if($externos){
                              echo $externos; 
                            }
                            
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--close tab conteni-->
          </div><!--close rowcard-->
        </div><!---close contacard-->
      </div><!--close body card-->
    </div><!--close card-->
  </div><!--close row-->
</div><!---close conta-->

<!----------------------------Modals--------------------------------------------------------------------->

<div class="modal fade" id="add-grupo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content text2">
      <div class="modal-header header1">
        <h4 class="modal-title">Alta Grupo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <div class="custom-controls-stacked">
                  <div class="container-fluid">
                    <form id="frmtipo">
                      <div class="row">
                        <div class="col-4">
                          <label class="custom-control custom-radio">
                            <input id="I" name="tipo" value="I" type="radio" checked class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Interno</span>
                          </label>
                        </div>
                        <div class="col-4">
                          <label class="custom-control custom-radio">
                            <input value="E" id="E" name="tipo" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Externo</span>
                          </label>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="alert alert-primary" id="alertadd" role="alert">
                <span>Ingresa un nombre para un grupo</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnadd-grupo" class="btn btn-primary bg-verde">Guardar</button>
        <button type="button" class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------------------->


<div class="modal" id="exporjson" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Grupos</h4>
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

<!------------------------------------------------------------------------------------------------->


<!---pantalla obscura tras la ventana-->
    <div class="modal fade" id="ventana2">
      <div class="modal-dialog" role="document">
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!----Footer de la ventana----------->
                  <a class="btn btn-info bg-naranja" href="<?= base_URL() ?>/admin/cvs_export?num=<?=$num ?>">Descargar CSV</a> 

                 <label  class="btn btn-info bg-verde">Subir Archivo
          <form id="frmchang" enctype="multipart/form-data">
        <input type="file" style="display: none;" name="usuexpres" accept=".csv" id="altausexpfiel">
      </form>
        </label>
                 <label class="btn btn-info bg-gris" data-dismiss="modal">Cancelar</label>  

              </label>
     </div>
   </div> 
  </div> 

  </div>      <!--fin-->
<!---pantalla obscura tras la ventana-->
<div class="modal fade" id="borrargrupo">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
    <!----header de la ventana----->
      <div class="modal-header header1">
        <h4> <div class="modal-title">¿Está seguro de eliminar este Grupo?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <div class="text0" aria-hidden="true">x</div>
          </button>
      </div>

  <!----Contenido de la ventana----->
             <div class="modal-body text2">
                
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
        <div class="col-12 m-t-10 m-b-10 text-right">
        <button class="btn btn-danger m-r-20" onclick="help.borrargrup(this.id)" id="">Borrar</button>
        <button class="btn btn-secondary" data-izimodal-close>Cancelar</button>
      </div>
      </div>
      
            </div>
               </div> 
</div> 
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
<div class="izimodal" id="sncuest"  data-he
er-color="#B20000" data-width="40%">
  <div class="container bodyerror">
    <div class="row">
      <div class="col-12">
        <p class="text-center"><h4>No hay cuestionarios!</h4></p>
        <div class="col-12 m-t-10 m-b-10 text-right">
        <button class="btn btn-success m-r-20 p-cues">Agregar Cuestionario</button>
        <button class="btn btn-secondary" data-izimodal-close>Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>