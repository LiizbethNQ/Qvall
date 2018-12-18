
<div class="container m-t-30">
  <div class="row">
    <div class="card w-100">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="cuestion">Cuestionarios</label>
                <select name="cuestionario" id="cuestion" class="form-control">
                 <!--  
                  <?php
              foreach ($cuestionarios as $key) {
           ?>
              <option value="<?=$key['IDCuestionario']?>"><?=$key['Nombre']?> </option>
           <?php
                $prueba= $key['IDCuestionario'];
                echo $key;
               }
               
            ?> -->
                </select>
              </div>
            </div>
         
        <!-- datos -->
        <div class="col-4 datos">
                    <div class="col-6 m-t-10 text2">
                      <div><h6><strong>Nombre: </strong><span class="nombre text4"></span></h6></div>
                    </div>  
                    <div class="col-6 m-t-10 text2">
                      <div><h6><strong>Estatus: </strong><span class="Estatus text4"></span></h6></div>
                  </div>
        </div>
      
          <div class="col-5 datos">
              <div class="col-6 m-t-10 text2">
                  <div><h6><strong>Perfil Emisor: </strong><span class="Pemisor text4"></span></h6></div>
                  </div>
                  <div class="col-6 m-t-10 text2">
                <div><h6><strong>Perfil Receptor: </strong><span class="Preceptor text4"></span></h6></div>
              </div>
          </div>
        </div>
         </div>
        <!-- fin de datos -->
      
<div class="datos">
  <div class="row">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <!================ffffff========================>
            
            <!--=============Menu grupos============================-->
            <div class="col-12 m-t-20">
              <ul class="nav nav-tabs">
                
                <li class="nav-item">
                  <a class="nav-link active" id="graficos-tab" data-toggle="tab" href="#graficos" role="tab" aria-controls="graficos" aria-selected="true">Graficos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="resumen-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">Resumen</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="detalle-tab" data-toggle="tab" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">Detalles</a>
                </li>
              </ul>
            </div><!-- butttons tabs de perfiles-->
            <div class="col-12 m-t-20">

              <div class="tab-content" id="myTabContent">
               

                <div class="tab-pane fade" id="graficos" role="tabpanel" aria-labelledby="graficos-tab">
                  <div class="row">
                    <div class="col-12">
                    </div>
                    <div class="col-12 m-t-20">
                      <span><h6 class="Numveces text4">Pregunta: </h6></span>
                    </div>

                  <div class="col-12">
                    <div class="container-fluid">
                      <div class="row" id="graficos2">
                        
                      </div>
                    </div>
                  </div>
                  </div>
                  
                </div>
                <div class="tab-pane fade" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">
                  <div class="row">
                       <div class="col-12">
                      <table class="table table-hover table-responsive">
                        <thead class="thead-qval">
                          <tr>
                            <th>Pregunta</th>
                            <th>Respuesta Positiva</th>
                            <th>No.Respuestas</th>
                            <th>Respuestas Positivas</th>

                          </tr>
                        </thead>
                        <tbody id="tbresumenbody">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12">
                       <a  id="cvs-resumen" target="_blank" i class="btn btn-primary bg-naranja">Descargar Resumen(CVS)</a>
                    </div>
                  </div>
                  

                </div>
                <div class="tab-pane fade" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
                  <div class="row">
                        <div class="col-12">
                      <table class="table table-hover table-responsive">
                        <thead class="thead-qval">
                          <tr>
                            <th>Pregunta</th>
                            <th>Fecha</th>
                            <th>Califica</th>
                            <th>Calificado</th>
                            <th>Respuesta</th>
                            <th>Puntos</th>
                          </tr>
                        </thead>
                        <tbody id="tbdetallebody">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12">
                       <a  href="<?= base_URL(); ?>/resultados/detalles_cvs?num=9" target="_blank" id="cvs-detalles"  class="btn btn-primary bg-naranja">Descargar Detalle(CVS)</a>
                    </div>
                  </div>
                  
                </div>
              </div>
              <!========================================>
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
