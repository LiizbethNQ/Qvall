<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>


<div class="card w-100 m-t-5">
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-12 text-rigth m-b-20">
          <!------------------Buscador--------------------------------------->
          <div class="col-sm-8 my-1 text2">

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cuestionario">
                <a href="<?= base_URL()?>admin/cuestionariosnr" class="btn btn-success">Buscar</a>
              </div>
            </div>
          </div>


          <!--============Botones en conjunto=============================-->

          <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
           <div class="btn-group" role="group" aria-label="First group">

            <!--============Boton alta=============================-->

            <button type="button" class="btn btn-primary text2" data-toggle="modal" data-target="#newcues"><i class="fa fa-user-plus"></i> Nuevo Cuestionario <div class="btn-group" role="group">
            </button>

            <!--============Botones en Exportar=============================-->

            <button id="btnGroupDrop1" type="button" class="btn btn-primary text2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Exportar</button>        
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

<!--section button-->
<!--=========================================-->
<div class="col-12 m-t-20 text2">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cuestionarios</a>
    </li>

  </ul>
</div>

<!-- butttons tabs de perfiles-->
<div class="col-12 m-t-20 text2">
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
      <table class="table table-hover">
       <thead class="thead-qval">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Emisor</th>
          <th scope="col">Receptor</th>
          <th scope="col">Cantidad de cuestionarios respondidos</th>
          <th scope="col">Status</th>
          <th scope="col">Acciones</th>

        </tr>
      </thead>
      <tbody>

        <tr>
          <td>1</td>
          <td>Nombre</td>
          <td>Emisor</td>
          <td>Receptor</td>
          <td>#</td>
          <td>Activo</td>
          <td>
           <div class="btn-group" role="group">

            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>

            <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">
              <ul>
                <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#asigpreg">

                  <i class="" aria-hidden="true"></i><i class="fas fa-plus"></i> Asignar Preguntas</li>
                </ul>
                <ul>

                  <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#actcues">

                    <i class="" aria-hidden="true"></i><i class="far fa-bookmark"></i> Activar/Desactivar</li>
                  </ul>
                  <ul>

                    <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#modcues">

                      <i class="fa fa-wrench" aria-hidden="true"></i> Modificar</li>
                    </ul>
                    <ul>

                      <ul>
                        <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#borrarcues">
                         <i class="fa fa-ban" aria-hidden="true"></i> Borrar</li>
                       </ul>
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

<!-- -----------------Opcion Nuevo Cuestionario------------------------------- -->
<!-- Modal -->
<div class="modal fade" id="newcues" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!----header de la ventana----->
      <div class="modal-header header1"> 
        <h4><div class="modal-title">Nuevo Cuestionario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>
        </div>
        <!----Contenido de la ventana------->
        <div class="modal-body text2">
           <div class="container-fluid">
              <div class="row">
                <div class="col-4 m-t-20">
                  <div class="form-group text2">
                    <p>Nombre:</p>
                    <input type="text" placeholder="Cuestionario" class="form-control">
                  </div>
                </div>

                <div class="col-4 m-t-20">
                  <div class="form-group text2">
                    <p>Grupo Emisor</p>
                    <select class="form-control">
                      <option>Nombre</option>
                      <option>x1</option>
                      <option>x2</option>
                      <option>x3</option>
                      <option>x4</option>
                    </select>
                  </div>
                </div>

                <div class="col-4 m-t-20">
                  <div class="form-group">
                    <p>Grupo Receptor:</p>
                    <select class="form-control">
                      <option>Nombre</option>
                      <option>x1</option>
                      <option>x2</option>
                      <option>x3</option>
                      <option>x4</option>
                    </select>
                  </div>
                </div>

    <div class="col-12">
      <div class="tbpreguntas table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col">Pregunta</th>
              <th scope="col">Puntos</th>
            </tr>
          </thead>
          <tbody>
            
              <tr>
                <td>1</td>
                <td><input type="checkbox" name="preg" value=""></td>
                <td>...............<td>
                <td>13</td>
              </tr>
             
        </tbody>
      </table>
    </div>
  </div>
                <div class="container-fluid">
                  <div class="row">
                      <div class="col-3">
                             <div class="slideThree">  
                               <input type="checkbox" value="None" id="checemail" name="check"  />
                               <label for="checemail"></label>
                             </div>

                           </div>
                       <div class="col-3">
                             <span>Disponible en Email</span>
                           </div>
                           <div class="col-3 " >
                              <div class="slideThree">  
                               <input type="checkbox" value="None" id="checwats" name="check"  />
                               <label for="checwats"></label>
                             </div>
                           </div>
                             <div class="col-3">
                            <span>Disponible en WatsApp</span>
                          </div>
                        </div>
                    </div>
                <!----Footer de la ventana----------->
                <div class="col-12 text-right m-t-20 m-b-20 text2">
                    <a href="#asigpreg" class="btn btn-primary" data-toggle="modal">Asignar Pregunta</a>
                  <button type="button" class="btn btn-primary bg-naranja" onclick=""  id="">Guardar</button>
              <button type="button" class="btn btn-primary data bg-gris" data-dismiss="modal">Cancelar</button>  
                </div>

                <div class="col-12">
                  <div class="alert alert-primary" role="alert">
                    <strong>Llena corectamente los datos solicitados</strong>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div> 

    </div>
  </div>
</div>
<br>


<!---------fin------------->


<!---------Opcion Modificar cuestionario------------->

<!-- Modal -->
<div class="modal fade" id="modcues" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!----header de la ventana----->
      <div class="modal-header header1"> 
        <h4><div class="modal-title">Modificar Cuestionario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>
        </div>
        <!----Contenido de la ventana------->
        <div class="modal-body text2">
           <div class="container-fluid">
              <div class="row">
                <div class="col-4 m-t-20">
                  <div class="form-group text2">
                    <p>Nombre:</p>
                    <input type="text" placeholder="Cuestionario" class="form-control">
                  </div>
                </div>

                <div class="col-4 m-t-20">
                  <div class="form-group text2">
                    <p>Grupo Emisor</p>
                    <select class="form-control">
                      <option>Nombre</option>
                      <option>x1</option>
                      <option>x2</option>
                      <option>x3</option>
                      <option>x4</option>
                    </select>
                  </div>
                </div>

                <div class="col-4 m-t-20">
                  <div class="form-group">
                    <p>Grupo Receptor:</p>
                    <select class="form-control">
                      <option>Nombre</option>
                      <option>x1</option>
                      <option>x2</option>
                      <option>x3</option>
                      <option>x4</option>
                    </select>
                  </div>
                </div>

    <div class="col-12">
      <div class="tbpreguntas table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col">Pregunta</th>
              <th scope="col">Puntos</th>
            </tr>
          </thead>
          <tbody>
            
              <tr>
                <td>1</td>
                <td><input type="checkbox" name="preg" value=""></td>
                <td>...............<td>
                <td>13</td>
              </tr>
             
        </tbody>
      </table>
    </div>
  </div>
                <div class="container-fluid">
                  <div class="row">
                      <div class="col-3">
                             <div class="slideThree">  
                               <input type="checkbox" value="None" id="checemail" name="check"  />
                               <label for="checemail"></label>
                             </div>

                           </div>
                       <div class="col-3">
                             <span>Disponible en Email</span>
                           </div>
                           <div class="col-3 " >
                              <div class="slideThree">  
                               <input type="checkbox" value="None" id="checwats" name="check"  />
                               <label for="checwats"></label>
                             </div>
                           </div>
                             <div class="col-3">
                            <span>Disponible en WatsApp</span>
                          </div>
                        </div>
                    </div>


                <!----Footer de la ventana----------->
                <div class="col-12 text-right m-t-20 m-b-20 text2">
                    <a href="#asigpreg" class="btn btn-primary" data-toggle="modal">Asignar Pregunta</a>
                  <button type="button" class="btn btn-primary bg-naranja" onclick=""  id="">Guardar</button>
              <button type="button" class="btn btn-primary data bg-gris" data-dismiss="modal">Cancelar</button>  
                </div>

                <div class="col-12">
                  <div class="alert alert-primary" role="alert">
                    <strong>Llena corectamente los datos solicitados</strong>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div> 

    </div>
  </div>
</div>



<!---------fin------------->

<!-- -----------------Opcion Borrar Cuestionario-------------------------------->
<!-- Modal -->
<div class="modal fade" id="borrarcues" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!----header de la ventana desactivar----->
      <div class="modal-header header1">
        <h4><div class="modal-title">Borrar Cuestionario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>       
        </div>

        <!----Contenido de la ventana---------->
        <div class="modal-body text3">

         <p>¿Está seguro de eliminar este Cuestionario?</p>
       </div>
       <div class="modal-body text2">

         <p><li>Todos los datos en nuestra base de datos de este cuestionario se borrarán</li>
          <li>SI quieres borrar el cuestionario, te recomendamos descargar los datos en tu computadora.</li>
          <li>Recuerda que los cuestionarios se pueden desactivar</li>
        </p>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!----Footer de la ventana----------->
        <button type="button" class="btn btn-primary bg-naranja text2" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary bg-gris text2">Borrar</button>    

      </div>
    </div>
  </div>
</div>
</div>

<!---------fin------------->



<!--------------------Opcion1 Asignar Preguntas------------------------->
<!-- Modal1 -->
<div class="modal fade" id="asigpreg" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!----header de la ventana----->
      <div class="modal-header header1">
        <h4><div class="modal-title">Asignar Preguntas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>       
        </div>

        <div class="modal-body text2">
         <table class="table table-hover">
          <thead class="thead-qval">
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col">Pregunta</th>
              <th scope="col">Forma</th>
              <th scope="col">Puntos</th>

            </tr>
          </thead>
          <tbody>
                          <tr>
                <td>1</td>
                <td><input type="checkbox" name="preg" value="A"></td>
                <td>El Proveedor entrega el Producto y/o realiza el Servicio</td>
                <td>SI/NO</td>
                <td>10</td>
              </tr>
                            <tr>
                <td>2</td>
                <td><input type="checkbox" name="preg" value="B"></td>
                <td>El Proveedor realiza el Servicio</td>
                <td class="__web-inspector-hide-shortcut__">SI/NO</td>
                <td>10</td>
              </tr>
                            <tr>
                <td>3</td>
                <td><input type="checkbox" name="preg" value="C"></td>
                <td>¿Pregunta prueba 1?</td>
                <td>AB</td>
                <td>10</td>
              </tr>
                            <tr>
                <td>4</td>
                <td><input type="checkbox" name="preg" value="D"></td>
                <td>¿Pregunta 2?</td>
                <td>DIAS</td>
                <td>10</td>
              </tr>
                            <tr>
                <td>5</td>
                <td><input type="checkbox" name="preg" value="E"></td>
                <td>Va uniformado el vigilante</td>
                <td>SI/NO</td>
                <td>34</td>
              </tr>
                                </tbody>
      </table>
    </div>

<div class="col-12  text-right m-t-20 m-b-20">
      <button type="button" class="btn btn-primary bg-naranja" id="add-cuesM">Aceptar</button>
        <button type="button" class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</button>   
    </div>

</div>
</div>
</div>   

   
<!-- -----------------Opcion Activar Cuestionario------------------------------- -->
<!-- Modal -->
<div class="modal fade" id="actcues" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!----header de la ventana----->
      <div class="modal-header header1">
        <h4><div class="modal-title">Activar Cuestionario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>       
        </div>

        <!----Contenido de la ventana---------->
        <div class="modal-body text2">

          <p><li>SI Activa el cuestionario los usuarios en la APP móvil podrán acceder a
          el.</li>
          <li>No puede haber más de un cuestionario asignado al mismo grupo de
          usuarios.</li>
        </p>
        <br>
        <!----Footer de la ventana----------->

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <button type="button" class="btn btn-primary bg-naranja">Activar</button>    
        <button type="button" class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</button>   
        <br>
        <br>
        <div class="justify-content-between text2">
         <div class="alert alert-danger" role="alert">
          Este grupo de usuarios ya tiene asignado un cuestionario. Si quiere activarlo,
          necesitará desactivar el que ya existe!
        </div>
      </div>


    </div>
  </div>

</div>
<!-- -----------------Opcion Desactivar Cuestionario------------------------------- -->
<!-- Modal -->
<div class="modal fade" id="descues" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!----header de la ventana----->
      <div class="modal-header header1">
        <h4><div class="modal-title">Desactivar Cuestionario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>       
        </div>

        <!----Contenido de la ventana---------->
        <div class="modal-body text2">

          <p><li>SI desactiva el cuestionario los usuarios en la APP móvil no podrán
          acceder a el.</li>

          <li>Podrá poner un nuevo cuestionario a este mismo grupo de usuarios
          </p>
          <br>
          <!----Footer de la ventana----------->

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <button type="button" class="btn btn-primary bg-naranja">Desactivar</button>    
          <button type="button" class="btn btn-primary bg-gris" data-dismiss="modal">Cancelar</button>   
          <br>
          <br>


        </div>
      </div>

    </div>