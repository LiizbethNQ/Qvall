<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- ----------------------------------------------------------------- -->


<!--=========================================-->


<div class="card w-100 m-t-5">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-rigth m-b-20">
          
            
            <!--=============Menu grupos============================-->
                 <div class="col-12 m-t-20 text2">
                     <ul class="nav nav-tabs">
                         
                         <li class="nav-item">
                           <a class="nav-link active" id="Resumen-tab" data-toggle="tab" href="#Resumen" role="tab" aria-controls="Resumen" aria-selected="true">Resumen</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" id="Detalles-tab" data-toggle="tab" href="#Detalles" role="tab" aria-controls="Detalles" aria-selected="true">Detalles</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" id="Graficas-tab" data-toggle="tab" href="#Graficas" role="tab" aria-controls="Graficas" aria-selected="true">Graficas</a>
                         </li>
                    </ul> 
                </div>
           
        
      <!--============Opcion Graficas Menu =============================-->
          <div class="col-12 text2">
 <!--============Tabla Datos =============================-->
             <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="Graficas" role="tabpanel" aria-labelledby="Graficas-tab">
                  <div class="container-fluid">
                    <div class="row">
<div class="col-12">
    <table class="table table-list-search text2">
    
     <tbody>
    <tr>
 <td><div class="col-12 text2">
  <br>
      <p>Selecciona un cuestionario:</p>
     <select class="form-control">
  <option>Cuestionario</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

</div>
</td>
<td>
<div class="col-10 text2">
<p>Estado:</p>
</div>
<div class="col-10 text4">
<p>&nbsp;&nbsp;&nbsp;Activo</p>  
</div>
 <div class="col-10 text2">

<p>Fecha ultima respuesta:</p>
<div class="col-10 text4">

<p>Fecha</p>  
</div>

  </td>

  <td>
    <div class="col-10 text2">
<p>Grupo que realiza el cuestionario:</p>
</div>
  <div class="col-10 text4">
<p>&nbsp;&nbsp;&nbsp;Grupo</p>  
</div>
 <div class="col-10 text2">

<p>Grupo que responde el cuestionario:</p>
    <div class="col-10 text4">

<p>&nbsp;Grupo</p>  
</div>
</div>
</td>

<div class="container-fluid">
    <div class="row"> 
       <div class="col-12">
         <table class="table table-list-search text2">
            <thead> 
               <div class="col-12">
                 <th><i></i>Pregunta 1 </th>
               </div>
            </thead>
                    <tbody>
                      <tr>
                        <td>
                      <img src="<?= base_url() ?>/assets/img/gg1.png" width="1200" height="400" class="img-responsive" alt="">
                        </td> 
                     </tr>
                    </tbody>      
          </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row"> 
       <div class="col-12">
         <table class="table table-list-search text2">
            <thead> 
               <div class="col-12">
                 <th><i></i>Pregunta 2 </th>
               </div>
            </thead>
                    <tbody>
                      <tr>
                        <td>
                      <img src="<?= base_url() ?>/assets/img/gg2.png" width="1200" height="400" class="img-responsive" alt="">
                        </td> 
                     </tr>
                    </tbody>      
          </table>
        </div>

</div>
</div>
</div>
<!--============Opcion Resumen Menu =============================-->
 <!--============Tabla Datos =============================-->
                <div class="tab-pane fade show active in" id="Resumen" role="tabpanel" aria-labelledby="Resumen-tab">
                  <div class="container-fluid">
                    <div class="row">
<div class="col-12">
    <table class="table table-list-search text2">
    
     <tbody>
    <tr>
 <td><div class="col-12 text2">
  <br>
      <p>Selecciona un cuestionario:</p>
     <select class="form-control">
  <option>Cuestionario</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

</div>
</td>
<td>
<div class="col-10 text2">
<p>Estado:</p>
</div>
<div class="col-10 text4">
<p>&nbsp;&nbsp;&nbsp;Activo</p>  
</div>
 <div class="col-10 text2">

<p>Fecha ultima respuesta:</p>
<div class="col-10 text4">

<p>Fecha</p>  
</div>

  </td>

  <td>
    <div class="col-10 text2">
<p>Grupo que realiza el cuestionario:</p>
</div>
  <div class="col-10 text4">
<p>&nbsp;&nbsp;&nbsp;Grupo</p>  
</div>
 <div class="col-10 text2">

<p>Grupo que responde el cuestionario:</p>
    <div class="col-10 text4">

<p>&nbsp;Grupo</p>  
</div>
</div>

   </td>

<div class="container-fluid">
    <div class="row"> 
       <div class="col-12">
  <table class="table table-list-search text2">
    <thead>
    <tr> 

    <div class="col-6">
    <th><i></i></th>
    </div>
    
    <div class="col-6">
    <th><i></i></th>
    </div>
    </thead>
     <tbody>
    <tr>
 <td>
  <div class="col-10">

<span class="text2">Pregunta:<span class="text4">  Nombre</span>
</span>
</div>
<div class="col-10">

<span class="text2">Tipo de pregunta:<span class="text4">  SI/NO/NA</span>
</span>
</div>

 <div class="col-10">
  <span class="text2">Frecuencia:<span class="text4">  Frecuencia</span>
</span>

  </div> 
<div class="col-10 ">
<span class="text2">Numero de respuestas:<span class="text4">  #</span>
</span>
  </div>
  <div class="col-10">
<span class="text2">% de respuestas positivas:<span class="text4">  #</span>
</span>
  </div>
</td>

    <td>
      <img src="<?= base_url() ?>/assets/img/gg3.png" width="550" height="200" class="img-responsive" alt="">    
</td>
</tr>
<tr>
 <td>
  <div class="col-10">

<span class="text2">Pregunta:<span class="text4">  Nombre</span>
</span>
</div>
<div class="col-10">

<span class="text2">Tipo de pregunta:<span class="text4">  SI/NO/NA</span>
</span>
</div>

 <div class="col-10">
  <span class="text2">Frecuencia:<span class="text4">  Frecuencia</span>
</span>

  </div> 
<div class="col-10 ">
<span class="text2">Numero de respuestas:<span class="text4">  #</span>
</span>
  </div>
  <div class="col-10">
<span class="text2">Promedio de respuesta:<span class="text4">  #</span>
</span>
  </div>
</td>

    <td>
      <img src="<?= base_url() ?>/assets/img/gg4.png" width="550" height="200" class="img-responsive" alt="">    
</td>
</tr>
<tr>
 <td>
  <div class="col-10">

<span class="text2">Pregunta:<span class="text4">  Nombre</span>
</span>
</div>
<div class="col-10">

<span class="text2">Tipo de pregunta:<span class="text4">  SI/NO/NA</span>
</span>
</div>

 <div class="col-10">
  <span class="text2">Frecuencia:<span class="text4">  Frecuencia</span>
</span>
  </div>
  <div class="col-10">
<span class="text2">Numero de respuestas: <span class="text4">  #</span>
</span>
  </div>
</td>

    <td>
      <img src="<?= base_url() ?>/assets/img/gg5.png" width="550" height="200" class="img-responsive" alt="">    
</td>
</tr>
</tbody>
</table>
</div>


</div>
</div>
</div>



<!--============Opcion Detalles Menu =============================-->
 <!--============Tabla Datos =============================-->
                <div class="tab-pane fade" id="Detalles" role="tabpanel" aria-labelledby="Detalles-tab">
                  <div class="container-fluid">
                    <div class="row">
<div class="col-12">
    <table class="table table-list-search text2">
    
     <tbody>
    <tr>
 <td><div class="col-12 text2">
  <br>
      <p>Selecciona un cuestionario:</p>
     <select class="form-control">
  <option>Cuestionario</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>

</div>
</td>

<td>
<div class="col-10 text2">
<p>Estado:</p>
</div>
<div class="col-10 text4">
<p>&nbsp;&nbsp;&nbsp;Activo</p>  
</div>
 <div class="col-10 text2">

<p>Fecha ultima respuesta:</p>
<div class="col-10 text4">

<p>Fecha</p>  
</div>

  </td>

  <td>
    <div class="col-10 text2">
<p>Grupo que realiza el cuestionario:</p>
</div>
  <div class="col-10 text4">
<p>&nbsp;&nbsp;&nbsp;Grupo</p>  
</div>
 <div class="col-10 text2">

<p>Grupo que responde el cuestionario:</p>
    <div class="col-10 text4">

<p>&nbsp;Grupo</p>  
</div>
</div>
</td>
<tr>
<td>

<div class="row d-flex align-items-center">
<div class="col-2 text2">
         <div class="justify-content-end">
      <a href="#ventana1" class="btn btn-primary bg-naranja" data-toggle="modal"><i class="fas fa-filter"></i> Filtrar </a>
  </div>
  </div>
<!---pantalla obscura tras la ventana-->
  <div class="modal fade" id="ventana1">
    <div class="modal-dialog">
      <div class="modal-content">

<!----header de la ventana----->
    <div class="modal-header header1">
      <h4><div class="modal-title">Filtrar Cuestionario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <div class="text0" aria-hidden="true">x</div>
        </button>   
    </div>
    
<!----Contenido de la ventana---------->
   <!----Caja de texto---------->
     <div class="container-fluid">
<div class="row-fluid">
    <div class="col-12">
      <div class="form-group text2">
        <p>Nombre:</p>
        <input type="text" placeholder="Nombre del Cuestionario" class="form-control">
      </div>
    </div>
    
    <div class="container-fluid">
   <div class="row">   
    <div class="col-12 text2">
      <p>Grupo que realiza el Cuestionario:</p>
     <select class="form-control">
  <option>Nombre del Grupo</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>
</div>
</div>
<div class="container-fluid">
   <div class="row">
     <div class="col-12 text2">
      <p>Grupo que responde el Cuestionario:</p>
     <select class="form-control">
  <option>Nombre del Grupo</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>
  </div>
</div>


<div class="container-fluid">
   <div class="row">   
    <div class="col-6 text2">
      <p>Respuestas desde esta fecha:</p>
     <select class="form-control">
  <option>Fecha</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>
    <div class="col-6 text2">
      <p>Respuestas hasta esta fecha:</p>
     <select class="form-control">
  <option>Fecha</option>
  <option>x1</option>
  <option>x2</option>
  <option>x3</option>
  <option>x4</option>
</select>
</div>
</div>
</div>
    <!----Footer de la ventana----------->

    <div class="container-fluid">
    <div class="col-12 modal-footer text2">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


        <button type="button" class="btn btn-primary data bg-naranja">Aplicar</button> 
        <button type="button" class="btn btn-primary data bg-gris" data-dismiss="modal">Cancelar</button>  
</div>

</div>
</div>
</div>
</div>
</div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="row d-flex align-items-center">
<div class="col-2 text2">
         <div class="justify-content-end">

        <button id="btnGroupDrop1" type="button" class="btn btn-primary bg-naranja dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Descargar </button>        
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


</div>
</div>
</div>
</div>
</td>

  
  </tr>
  </tbody>
</table>

</div>
</div>
</div>
</td>
</tr>

<div class="container-fluid">
    <div class="row"> 
    <div class="col-12">
    <table class="table table-list-search text2">
    <thead>
    <tr> 

    <div class="col-12">
    <th><i></i>Preguntas SI/NO y SI/NO/NA</th>

    </div>
    </tr>
    <tbody>
      
    <td>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Pregunta</th>
      <th scope="col">Fecha</th>
      <th scope="col">Realiza</th>
      <th scope="col">Responde</th>
      <th scope="col">Unidad</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
          </tr>
        </table>
          </tbody>

    </td> 
    </tbody>
<tr>
    <div class="col-12">
    <th><i></i>Preguntas Numericas</th>
    </div>
    </tr>
    <tbody>
      
    <td>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Pregunta</th>
      <th scope="col">Fecha</th>
      <th scope="col">Realiza</th>
      <th scope="col">Responde</th>
      <th scope="col">Unidad</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
          </tr>
        </table>
          </tbody>

    </td> 
    </tbody>

    <tr> 

    <div class="col-12">
    <th><i></i>Preguntas Abiertas </th>
    </div>
    </tr>
    <tbody>
      
    <td>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Pregunta</th>
      <th scope="col">Fecha</th>
      <th scope="col">Realiza</th>
      <th scope="col">Responde</th>
      <th scope="col">Unidad</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
          </tr>
        </table>
          </tbody>

    </td> 
    </tbody>  </thead>
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
     </div>
</div>


