    
<script>

    help.functC();
  
</script>
<?php
$num="";
// var_dump($cuestionarios);

?>  
<div class="container">
  <div class="row">
    <div class="card w-100 m-t-50">

    <!--======================================-->
    <div class="card w-100">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-12  m-t-5">
                  <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="input-group">
                  <input type="text" class="form-control" placeholder="Cuestionario" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                  <button class="btn btn-primary bg-naranja" >Buscar</button>
                </div>
  
  <!------------------------------MENU EN CONJUNTO----------------------------------------------------->

                  <div class="btn-group" role="group" aria-label="First group">
                   <button class="btn btn-primary" data-toggle="modal" data-target="#msjaltac" ><i class="fas fa-plus-circle"></i></i> Alta Cuestionario</button>

                   <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-alt"></i></i> Exportar</button>  

                                         <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">  
                                           <a class="dropdown-item text2" href="<?= base_URL() ?>/admin/cvs_export?num=<?=$num ?>">CVS</a>
                      <!-- <a class="dropdown-item text2" id="exporjsongrup"  href="#">JSON</a> -->
                                       
                    </div>
                </div>
            </div>
          </div>
          
<!------------------------------------------------------------------------------------------------------>            <div class="col-12 m-t-20">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cuestionarios</a>
                </li>
              </ul>
            </div>
<!--===================================================================================================-->

            <div class="col-12 m-t-20">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-hover">
                    <thead class="thead-qval">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Emisor</th>
                        <th scope="col">Receptor</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                   <?php if($cuestionarios!==false): ?>
                      <tbody>
                        <?php 
                        $i=1;
                        foreach ($cuestionarios as $key ) {
                          ?>
                          <tr>
                            <td><?=$i?></td>
                            <td><?=$key["Nombre"]?></td>
                            <td><?=$key["Emisor"]?></td>
                            <td><?=$key["Receptor"]?></td>
                            <td>
                              <div class="btn-group" role="group"><button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>  

                                <div class="dropdown-menu accion-grupoC" aria-labelledby="btnGroupDrop1">
                                <ul>

                                  <li class="dropdown-item" lla="asigpr" llt="E" id="<?=$key["IDCuestionario"]?>"><i class="fa fa-file" aria-hidden="true"></i> Asignar Preguntas</li>

                                  <li class="dropdown-item" lla="mod" llt="E" id="<?=$key["IDCuestionario"]?>"> <i class="fa fa-wrench" aria-hidden="true"></i> Modificar</li>

                                  <li lla="del" class="dropdown-item" llt="E" id="<?=$key["IDCuestionario"]?>"><i class="fa fa-ban" aria-hidden="true"></i> Baja</li></ul></div></div>

                              </td>
                            </tr>
                            <?php
                            $i++;
                          }
                          ?>
                        </tbody>
                      <?php endif ?>  
                    </table>
                    </table>

                  </div>
                  
                                        
                <!--=========================================-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!--=======================================-->
    </div>
  </div>
</div>
<!-----------------------------alta cuestionario------------------------------->

   <div class="modal fade" id="msjaltac" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header header1">
          <h4><div class="modal-title">Alta Cuestionario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>
        </div>
      
    <div class="container text2">
      <div class="row">
        <div class="col-12 m-t-20">
          <div class="form-group">
            <label for="ncuestionario">Nombre Cuestionario</label>
            <input type="text" class="form-control" id="ncuestionario" placeholder="">
          </div>
        </div>
        <div class="col-6 m-t-20">
          <div class="form-group">
            <label for="ncuestionario">Grupo Emisor</label>
            <select class="form-control" name="" id="emisor">
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
      <div class="col-6 m-t-20">
        <div class="form-group">
          <label for="ncuestionario">Grupo Receptor</label>
          <select class="form-control" name="" id="receptor">
            
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
    <div class="col-12">
      <div class="tbpreguntas">
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
                   
         <?php

             if(($preguntast)!==false):
            $i=1;
            foreach ($preguntast as $value) {
              ?> 
              <tr>
                <td><?=$i?></td>
                <td><input type="checkbox" name="preg" value="<?=$value->Nomenclatura?>"></td>
                <td><?=$value->Pregunta?></td>
                <td><?=$value->Peso?></td>
              </tr>
              <?php
              $i++;
            }
            ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-12 m-t-20 m-b-20">
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
  <div class="col-12 text-right m-t-20 m-b-20">
        <button type="button" class="btn btn-secondary bg-naranja"  data-toggle="modal" data-target="#msjaltap" >Agregar Pregunta</button>
    <button type="button" class="btn btn-primary bg-verde" onclick="help.addcuest('+')"  id="btn-cues">Guardar</button>
    <button type="button" class="btn btn-danger bg-gris" data-dismiss="modal">Cancelar</button>
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

<!------------------------------modal alta pregunta----------------------------------------------->

<div class="modal fade" id="msjaltap">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header header1">
          <h4><div class="modal-title">Nueva Pregunta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>
        </div>
        <!----Contenido de la ventana---------->
        <div class="modal-body text2">
      <div class="col-12 m-t-20">
        <div class="form-group">
          <label for="pregunta">Pregunta</label>
          <input type="email" class="form-control" id="pregunta" aria-describedby="emailHelp" placeholder="">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="">Forma de Pregunta</label>
          <select name="" onchange="help.crp(this.value)" class="form-control" id="formpr">
            <option value="0">Selecciona</option>
            <option value="SI/NO">SI/NO</option>
            <option value="SI/NO/NA">SI/NO/NA</option>
            <option value="AB">ABIERTA</option>
            <option value="DIAS">DIAS</option>
            <option value="MESES">MESES</option>
            <option value="HORAS">HORAS</option>
            <option value="NUMERO">NÚMERO</option>
          </select>
        </div>
      </div>
      <div class="col-12 rp">
        <div class="form-group">
          <label for="rp">Respuesta Positiva</label>
          <div class="continp">
            <select name="" class="form-control" id="rp"></select>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="rp">Frecuencia</label>
          <select name="" class="form-control" id="frecuencia">
            <option value="0">Selecciona</option>
            <option value="1V">Cada Visita</option>
            <option value="1M">Cada Mes</option>
            <option value="1B">Cada Dos Meses</option>
            <option value="1T">Cada Tres Meses</option>
            <option value="1S">Semestral</option>
            <option value="115">Primeros 15 dias(1 a 15)</option>
            <option value="215">Segundos 15 dias(16 a 30)</option>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="puntaje">Puntaje</label>
          <input type="number" class="form-control" id="puntaje">
        </div>
      </div>
      <div class="col-12 text-right m-b-20">
        <button type="button" class="btn btn-secondary bg-naranja"  data-toggle="modal" data-target="#msjlistpregp" >Selecciona del Listado</button>
        <button type="button" class="btn btn-primary bg-verde" id="savepreg">Guardar</button>
        <button type="button" class="btn btn-danger bg-gris" data-dismiss="modal">Cancelar</button>
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
<!----=========================================================================-->
<!----------------------------------modal listado de preguntas----------------------------->
<div class="modal fade" id="msjlistpregp">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header header1">
          <h4><div class="modal-title">Preguntas Qval</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>
        </div>
      <div class="container text2">
      <div class="row">
      <div class="col-12">
        <form action="">
          <table class="table table-hover">
            <thead>
              <tr>
                <th></th>
                <th>Pregunta</th>
                <th>Forma</th>
                <th>Respuesta</th>
                <th>Puntos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach ($preguntasqval as $key) {
                ?>
                <tr>
                  <td><input type="radio" name="preg" value="<?= $key->IDPregunta;?>"></td>
                  <td><?= $key->Pregunta;?></td>
                  <td><?= $key->Forma;?></td>
                  <td><?= $key->Respuesta;?></td>
                  <td><?= $key->Puntos;?></td>
                </tr>
                <?php
              }
              ?>

            </tbody>
          </table>
        </form>
      </div>
      <div class="col-12 text-right m-b-20">
        <button type="button" class="btn btn-primary bg-verde" id="gent-preg">Aceptar</button>
        <button type="button" class="btn btn-danger bg-gris" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>  



<div class="modal fade" id="mslistpr">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header header1">
          <h4><div class="modal-title">Listado de Pregunta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div class="text0" aria-hidden="true">x</div>
          </button>
        </div>


  <div class="container text2">
    <div class="row">
      <div class="col-12 ">
        <div class="listprg">
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
            <?php if($preguntas!==false):
            $i=1;
            foreach ($preguntas as $value) {
              ?>
              <tr>
                <td><?=$i?></td>
                <td><input type="checkbox" name="preg" value="<?=$value->Nomenclatura?>"></td>
                <td><?=$value->Pregunta?></td>
                <td><?=$value->Forma?></td>
                <td><?=$value->Peso?></td>
              </tr>
              <?php
              $i++;
            }
            ?>
          <?php endif ?>
        </tbody>
      </table>
        </div>
    </div>
    <div class="col-12  text-right m-t-20 m-b-20">
      <button type="button" class="btn btn-primary bg-verde" id="add-cuesM">Aceptar</button>
      <button type="button" class="btn btn-danger bg-gris" data-dismiss="modal">Cancelar</button>
    </div>
  </div>
</div>
</div>

<div class="izimodal" id="msjlistp" data-title="Listado de Preguntas Qval">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="">
          <table class="table table-hover">
            <thead>
              <tr>
                <th></th>
                <th>Pregunta</th>
                <th>Forma</th>
                <th>Respuesta</th>
                <th>Puntos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach ($preguntasqval as $key) {
                ?>
                <tr>
                  <td><input type="radio" name="preg" value="<?= $key->IDPregunta;?>"></td>
                  <td><?= $key->Pregunta;?></td>
                  <td><?= $key->Forma;?></td>
                  <td><?= $key->Respuesta;?></td>
                  <td><?= $key->Puntos;?></td>
                </tr>
                <?php
              }
              ?>

            </tbody>
          </table>
        </form>
      </div>
      <div class="col-12 text-right m-b-20">
        <button type="button" class="btn btn-primary" id="gent-preg">Aceptar</button>
        <button type="button" class="btn btn-danger" onclick="$('#msjlistpregp').iziModal('close')">Cancelar</button>
      </div>
    </div>
  </div>
</div>  
