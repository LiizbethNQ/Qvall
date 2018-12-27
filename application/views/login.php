<!-------------script login/cookie------------------------>
 <script>
  $(function(){

    if(help.getcokie("datacceso")!=false){
      var datos=help.getcokie("datacceso");
      $("#user").val(datos.user);
       $("#pas").val(datos.pas);
      $('input[id="recordarusuario"]').attr("checked","checked")
    }
  })
</script>
 <!--------------------------------------------------------->

<body background="<?= base_URL()?>/assets/img/fondo-cuentas1.jpg"/>


<div class="container m-t-10">
  <div class="row m-t-20">
    <div class="col-5 centrar-h">
      <div class="card w-100" style="width: 18rem;">
          <div class="cad-body m-t-20 centrar-h">
            <div class="col-12">
                <img src="<?= base_URL()?>/assets/img/qval.png"/>
                    
                   <div class="form-group font-weight-bold text1-1 m-t-30">
                   <h5><label for=""> Usuario</label></h5>
                    <div class="input-group mb-1">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fa fa-user fa-2x fa-lg"></i></span>&nbsp;&nbsp;
                    </div>
                    <input type="text" id="user" class="form-control">
                    </div>
                    </div> 

                    <div class="form-group font-weight-bold text1-1 m-t-20">
                    <h5><label for=""> Contraseña</label></h5>
                    <div class="input-group mb-1">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fa fa-key fa-2x fa-lg" aria-hidden="true"></i></span>&nbsp;&nbsp;
                    </div>
                    <input type="password"  id="pas" class="form-control">
                    </div>
                     </div>

                <div class="m-t-50 m-r-20">
                   <input type="checkbox" id="recordarusuario" value="recordar">
                  <span class="checkboxtext">Recordar Contraseña
                 </span>
                 <style>
                   input[type=checkbox] {
                     transform: scale(1.5);
                     }
                 </style>
                </div>
                   <button id="btn-login" class="col-12 btn btn-primary bg-azul m-t-30">
                    <h5><span class="font-weight-bold">Aceptar</span></h5></button>

                    <a class="nav-link col-12 text-right m-t-20" data-toggle="modal" data-target="#olvide" href="#"><p class="font-weight-bold">¿Olvido su contraseña?</p></a>
                <div class="alert alert-info">
                   Bienvenido a Qval
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="pie">
<div class="m-t-20">
<div class="row text2">
<div class="copyright guest font-weight-bold"><span>&nbsp;&nbsp;&nbsp;&nbsp;Admyo Corporation</span><em> © 2018</em> 
</div>
<div class="col text-center align-middle"><a href="https://twitter.com/infoadmyo">
<i class="fab fa-twitter"></i></a>
</div>
<div class="col text-center align-middle"><a href="https://www.facebook.com/infoadmyo"><i class="fab fa-facebook-f"></i></a>
</div>
    
        <a class="col text-center align-middle"><span class="link" href="<?= base_URL()?>Condiciones">Términos y Condiciones</span></a>
                  
        <a class="col text-center align-middle"><span class="link" href="<?= base_URL()?>Políticap">Política de privacidad</span></a>
        
        <a class="col text-center align-middle"><span class="link" href="<?= base_URL()?>Políticac">Política de cookies</span></a> 
</div>
</div>
</div>

  <!--Modal Recuperar Contraseña-------->
        

     <!---pantalla obscura tras la ventana-->
     <!-- Modal -->
      <div class="modal fade" id="olvide" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">

    <!----header de la ventana----->
          <div class="modal-header header1">
            <h4><div class="modal-title">Recuperar Contraseña</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <div class="text0" aria-hidden="true">x</div>
            </button>       
          </div>
    <!----Contenido de la ventana---------->
    <!----Caja de texto---------->
  
  <div class="container m-t-30">
  <div class="panel panel-default">
    <div class="panel-body text1-1 ">
      <div class="form-group">

           <h5><label for="email"> Escribe el email asociado a tu cuenta para recuperar tu contraseña </label></h5>
            <input type="email" class="form-control" id="correo" placeholder="e-mail">
       </div>
       <br>
       <div class="container col-12">
           <button id="btn-rec" class="col-5 btn btn-primary bg-naranja m-l-20">Aceptar</button>
           <button id="btn-rec" class="col-5 btn btn-primary bg-gris m-l-10" data-dismiss="modal">Cancelar</button>
           </div>
<div class="alert alert2 alert-info m-t-30">
<b>Llena corectamente los datos solicitados</b>
</div>
  
  </div>
  </div>
</div>
<div id="mensaje"></div>
</div>
</div>
</div>

