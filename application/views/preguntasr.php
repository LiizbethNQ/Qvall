
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
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pregunta">
      <a href="<?= base_URL()?>admin/preguntasnr" class="btn btn-success">Buscar</a>
        </div>
      </div>
    </div>

             
            <!--============Botones en conjunto=============================-->
  
                   <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                   <div class="btn-group" role="group" aria-label="First group">

            <!--============Boton alta=============================-->

                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newpreg"><i class="fa fa-user-plus"></i> Nueva Pregunta <div class="btn-group" role="group">
                                 </button>

              <!--============Botones en Exportar=============================-->
                               
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Exportar</button>        
                        <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">  
                          <ul>
                        <li class="dropdown-item text2 " lla="mod" llt="E" data-toggle="modal" data-target="#">
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
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Preguntas</a>
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
              <th scope="col">Tipo</th>
              <th scope="col">Numero de Cuestionarios en los que aparece</th>
              <th scope="col">Frecuencia</th>
              <th scope="col">Acciones</th>

            </tr>
          </thead>
          <tbody>
            
              <tr>
                               <td scope="col">1</td>
               <td scope="col">Nombre</td>              <td scope="col">Tipo</td>
              <td scope="col">13</td>
              <td scope="col">Frecuencia</td>
              <td scope="col">
  <div class="btn-group" role="group">
                          
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>        
                                <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">
                              
                              <ul>

                                <li class="dropdown-item" lla="mod" llt="E" data-toggle="modal" data-target="#modpreg">
                              <i class="fa fa-wrench" aria-hidden="true"></i> Modificar</li>
                            </ul>
                            <ul>
                              <li lla="del" class="dropdown-item" llt="E" data-toggle="modal" data-target="#borrarpreg">
                             <i class="fa fa-ban" aria-hidden="true"></i> Baja</li></ul></div></div>
                            </ul>
                         </div>
                      </td>
                   </tr>
              </tbody>
         </table>
   </div>
                 

                 
    <!--------------------Opcion Nueva pregunta----------------->

<!---pantalla obscura tras la ventana-->
  <div class="modal fade" id="newpreg">
    <div class="modal-dialog">
      <div class="modal-content">
<!----header de la ventana----->
    <div class="modal-header header1">
      <h4><div class="modal-title">Nueva Pregunta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <h3>          <div class="text0" aria-hidden="true">x</div>
        </button>   
    </div>
    
<!----Contenido de la ventana---------->
   <!----Caja de texto---------->
     <div class="container-fluid">
<div class="row-fluid">
    <div class="col-9">
      <div class="form-group text2">
        <br>
        <p>Pregunta:</p>
        <input type="text" placeholder="Pregunta" class="form-control">
      </div>
    </div>
    <div class="container-fluid">
   <div class="row">   
    <div class="col-7 text2">
      <p>Forma de la Pregunta:</p>
     <select class="form-control">
  <option>Forma</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

     <div class="col-5 text2">
      <p>Respuesta Positiva:</p>
     <select class="form-control">
  <option>Positiva</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

  </div>
</div>
<br>
<div class="container-fluid">
   <div class="row">   
    <div class="col-7 text2">
      <p>Frecuencia:</p>
     <select class="form-control">
  <option>Frecuencia</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>
<div class="col-5">
      <div class="form-group text2">
        <p>Puntaje:</p>
        <input type="text" placeholder="Asignar Puntos" class="form-control">
      </div>
    </div>
     </div>
</div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="button" class="btn btn-info data bg-naranja text2">Guardar</button> 
        <button type="button" class="btn btn-info data bg-gris text2" data-dismiss="modal">Cancelar</button>  
        <br>   
        <br>
        

<!----Alert----------->

<div class="justify-content-between text5">
  <div class="alert alert-info" role="alert">
<b>Llena corectamente los datos solicitados</b>
</div>
     </div>


    <!----Footer de la ventana----------->
  
      </div>
     </div> 

</div>
</div>
</div>

 <!--------------------Opcion Modificar pregunta----------------->

<!---pantalla obscura tras la ventana-->
  <div class="modal fade" id="modpreg">
    <div class="modal-dialog">
      <div class="modal-content">
<!----header de la ventana----->
    <div class="modal-header header1">
      <h4><div class="modal-title">Modificar Pregunta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <h3>          <div class="text0" aria-hidden="true">x</div>
        </button>   
    </div>
    
<!----Contenido de la ventana---------->
   <!----Caja de texto---------->
     <div class="container-fluid">
<div class="row-fluid">
    <div class="col-9">
      <div class="form-group text2">
        <br>
        <p>Pregunta:</p>
        <input type="text" placeholder="Pregunta" class="form-control">
      </div>
    </div>
    <div class="container-fluid">
   <div class="row">   
    <div class="col-7 text2">
      <p>Forma de la Pregunta:</p>
     <select class="form-control">
  <option>Forma</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

     <div class="col-5 text2">
      <p>Respuesta Positiva:</p>
     <select class="form-control">
  <option>Positiva</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

  </div>
</div>
<br>
<div class="container-fluid">
   <div class="row">   
    <div class="col-7 text2">
      <p>Frecuencia:</p>
     <select class="form-control">
  <option>Frecuencia</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>
<div class="col-5">
      <div class="form-group text2">
        <p>Puntaje:</p>
        <input type="text" placeholder="Asignar Puntos" class="form-control">
      </div>
    </div>
     </div>
</div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="button" class="btn btn-info data bg-naranja text2">Guardar</button> 
        <button type="button" class="btn btn-info data bg-gris text2" data-dismiss="modal">Cancelar</button>  
        <br>   
        <br>
        

<!----Alert----------->
<div class="justify-content-between text5">
  <div class="alert alert-info" role="alert">
<b>Llena corectamente los datos solicitados</b>
</div>
     </div>


    <!----Footer de la ventana----------->

      </div>
     </div> 

</div>
</div>
</div>
<!-- -----------------Opcion Borrar Pregunta-------------------------------->
  <!-- Modal -->
  <div class="modal fade" id="borrarpreg" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
<!----header de la ventana desactivar----->
      <div class="modal-header header1">
        <h4><div class="modal-title">Borrar Pregunta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div class="text0" aria-hidden="true">x</div>
        </button>       
      </div>
      
<!----Contenido de la ventana---------->
        <div class="modal-body text3">
   <p>¿Está seguro de eliminar esta pregunta?</p>
   </div>
        <div class="modal-body text2">

   <p><li>Todos los datos en nuestra base de datos de este cuestionario se borrarán</li>
<li>SI quieres borrar esta pregunta, te recomendamos descargar los datos en tu computadora.</li>
<li>Todos los cuestionarios que tienen esta pregunta se modificarán de
forma automática.</li>
</p>
<br>
<br>

 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-info bg-naranja text2" data-dismiss="modal">Cancelar</button>
<button type="button" class="btn btn-info bg-gris text2">Borrar</button>    
    <!----Footer de la ventana----------->
    </div>
     </div>
 &nbsp  
