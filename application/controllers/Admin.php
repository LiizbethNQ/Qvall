<?php 
/**
* 
*/
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Perfiles");
        $this->load->model("Model_Usuarios");
        $this->load->model("Model_Empresa");
        //$this->load->model("Model_Correo");
    
        $this->load->helper("ayuda");
        $this->load->helper(array('form', 'url','ayuda','security'));
        $this->load->library('form_validation');
    }
    // Qval-------------------------------------------------------------------------
    public function index (){
        if($this->session->userdata('logueado')){
            $this->load->view('assets'); 
            $this->load->view('base');
            $IDEmpresa=$this->session->userdata('IDEmpresa');
            $IDUsuario=$this->session->userdata('IDUsuario');
            $data["empresa"]=$this->Model_Empresa->GetdatsEmpresa($IDEmpresa);
            $data["usuario"]=$this->Model_Usuarios->DatosUsuario($IDUsuario);
            $data["tipoempresa"]=$this->Model_Empresa->gettiposEmpresa();
            $data["tipofacturacion"]=$this->Model_Empresa->gettipoFacturacion();
            $data["tiponempleados"]=$this->Model_Empresa->gettipoNempleados();
            $data["tipoestado"]=$this->Model_Empresa->gettipoEstado();
            


            $this->load->view('inicio',$data);
        }else{
            redirect('');
        }
      } 

   public function datsempresa(){
        $datos=json_decode($_POST["datos"]);
        $data["empresa"]=$this->Model_Empresa->GetdatsEmpresa($IDEmpresa);
        $data["usuario"]=$this->Model_Usuarios->DatosUsuario($IDUsuario);
        $data["perfiles"]=$this->Model_Empresa->GetdatsEmpresa($IDEmpresa);
    }


   public function updateGen(){
        if($this->input->is_ajax_request()){
            $rz=$this->input->post("razonsocial");
            $nc=$this->input->post("nombrecomercial");
            $rfc=$this->input->post("RFC");
            $te=$this->input->post("tiposempresa");
            $noe=$this->input->post("noempleados");
            $fac=$this->input->post("facturacion");
            $descr=$this->input->post("descripcion");
            $empresa=$this->input->post("empresa");
            $this->form_validation->set_rules('razonsocial','Razon Social', 'required|min_length[3]');
            $this->form_validation->set_rules('RFC','RFC', 'required|min_length[10]');
            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
            $this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
            $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
            if($this->form_validation->run()==True){ //Si la validación es correcta
                $rec=$this->Model_Empresa->updategen($rz,$nc,$rfc,$te,$noe,$fac,$descr,$empresa);
                if($rec!=true){
                    $datos["pass"]=0;
                    $datos["mensaje"]=$rec;
                }else{
                    $datos["pass"]=1;
                }
            }
            else{
                $datos["pass"]=0;
                $datos["mensaje"]= validation_errors();
            }
        }
        echo json_encode($datos);
    }

    public function updatecont(){
        if($this->input->is_ajax_request()){
            $pagina=$this->input->post("pagina");
            $direc=$this->input->post("direc");
            $colonia=$this->input->post("colonia");
            $municipio=$this->input->post("municipio");
            $cp=$this->input->post("cp");
            $estado=$this->input->post("estado");
            $tel=$this->input->post("tel");
            $empresa=$this->input->post("empresa");

            $rec=$this->Model_Empresa->updatecontac($pagina,$direc,$colonia,$municipio,$cp,$estado,$tel,$empresa);
            if($rec!=true){
                $datos["pass"]=0;
                $datos["mensaje"]=$rec;
            }else{
                $datos["pass"]=1;
            }
            echo json_encode($datos);
        }else{
            exit();
        }

    }

    public function updateus(){
        if($this->input->is_ajax_request()){
            $Nombre=$this->input->post("nombre");
            $Apellidos=$this->input->post("apellido");
            $puesto=$this->input->post("puesto");
            $correo=$this->input->post("correo");
            $usuario=$this->input->post("usuario");
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('correo','Correo Electronico', 'required|valid_email|trim|min_length[3]|is_unique[usuario.correo]');
            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
            $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
            $this->form_validation->set_message('is_unique', 'El campo %s ya esta registrado');
            $this->form_validation->set_message('valid_email','El campo %s no es una dirección de correo eléctronico valido');
            if($this->form_validation->run()==True){ //Si la validación es correcta
                $rec=$this->Model_Usuarios->UpdateUssg($usuario,$Nombre,$Apellidos,$puesto,$correo);
                if($rec!=true){
                    $datos["pass"]=0;
                    $datos["mensaje"]=$rec;
                }else{
                    $datos["pass"]=1;
                }

            }else{
                $datos["pass"]=0;
                $datos["mensaje"]= validation_errors();
            }
            echo json_encode($datos);
        }
    }

     public function updatecl(){
        if($this->input->is_ajax_request()){
            $c=$this->input->post("c");
            $c1=$this->input->post("c1");
            $c2=$this->input->post("c2");
            $usuario=$this->input->post("usuario");
            $this->form_validation->set_rules('c','Contraseña Actual', 'required|xss_clean');
            $this->form_validation->set_rules('c1','Contraseña Nueva', 'required|min_length[6]|xss_clean');
            $this->form_validation->set_rules('c2','Confirmar Contraseña', 'required|min_length[6]|matches[c1]|xss_clean');
            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
            $this->form_validation->set_message('min_length','El campo %s debe tener más de %d caracteres');
            $this->form_validation->set_message('matches','Las contraseñas no son iguales');
            if($this->form_validation->run()==True){ //Si la validación es correcta
                //verificos si la clave es correca si no mando un error
                $rec=$this->Model_Usuarios->updateclave($c,$c1,$usuario);
                if($rec!=true){
                    $datos["pass"]=0;
                    $datos["mensaje"]="La contraseña actual no coincide con los registros.";
                }else{
                    $datos["pass"]=1;
                }
                
            }else{
                $datos["pass"]=0;
                $datos["mensaje"]= validation_errors();
            }
            echo json_encode($datos);
        }
    }

   
 //funcion para obtner los perfiles de una empresa
    public function grupos(){
      $datos=json_decode($_POST["datos"]);
      $data["perfiles"]=$this->Model_Perfiles->GetPerfiles($datos->empresa,1);
      $this->load->view("grupos",$data);
    }
    
    public function AddGrupo(){
      $datos=json_decode($_POST["datos"]);
    //primero reviso que no exista ese nombre
      $pas=$this->Model_Perfiles->GetPerfileN($datos->Nombre,$datos->Empresa);
      if($pas==false){
        $data["Mensaje"]=$this->Model_Perfiles->AddPerfil($datos->Empresa,$datos->Nombre,$datos->Tipo);
        $data["pass"]=1;
      }else{
        $data["pass"]=0;
        $data["Mensaje"]="Este nombre ya se encuentra registrado";
      }
      echo json_encode($data);
    }

    public function datgrupos(){
      $datos=json_decode($_POST["datos"]);
      $data["Perfildatos"]=$this->Model_Perfiles->GetPerfileI($datos->num);
      echo json_encode($data);
    }

    public function ModGrupo(){
      $datos=json_decode($_POST["datos"]);
      $data["pass"]=1;
      $data["Mensaje"]=$this->Model_Perfiles->ModPerfil($datos->Nombre,$datos->Tipo,$datos->num);
      echo json_encode($data);
    }

    public function delGrupo(){
      $datos=json_decode($_POST["datos"]);
      $data["pass"]=1;
      $data["Mensaje"]=$this->Model_Perfiles->DelPerfil($datos->num);
      echo json_encode($data);
    }
  //funcion para exportar grupos
    public function cvs_export(){
      $datos=$_GET["num"];
      $array=$this->Model_Perfiles->GetPerfiles($datos,1);
      $datos=[];
      foreach ($array as $dato) {
        if($dato->Tipo==="I"){
          $tipo="INTERNO";
        }else{
          $tipo="EXTERNO";
        }
        array_push($datos,array("Nombre"=>$dato->Nombre,"Tipo"=>$tipo));
      }
      $titulos=array("Nombre","Tipo");
      converter_cvs($datos,"GruposQval",$titulos);
    }

  //function para exportar en JSON
    public function JSon_export(){
      $datos=json_decode($_POST["datos"]);
      $array=$this->Model_Perfiles->GetPerfiles($datos->num,1);
      $datos=[];
      foreach ($array as $dato) {
        if($dato->Tipo==="I"){
          $tipo="INTERNO";
        }else{
          $tipo="EXTERNO";
        }
        array_push($datos,array("Nombre"=>$dato->Nombre,"Tipo"=>$tipo));
      }
      $titulos=array("Nombre","Tipo");
      $data["Grupos"]=$datos;
    }

//----------------------------------login--------------------------->
    public function login(){ 
        $datos=json_decode($_POST["datos"]);
        // var_dump($datos);
        // exit();
  
        if($datos->user===""){
            $data["pass"]=0;
            $data["Mensaje"]="El usuario no existe";
        }else if($datos->pas===""){
            $data["pass"]=0;
            $data["Mensaje"]="La contraseña no existe";
        }else{
            //ahora con el usuario y la contraseña checo los datos 
            $ret=$this->Model_Usuarios->login($datos->user,$datos->pas);
            
            if($ret===false){
                $data["pass"]=0;
                $data["Mensaje"]="Usuario y/o contraseña no validos" ;
            }else{
                $data["pass"]=1;
                $data["Mensaje"]=$ret ;
                $usuario_data=array(
                    "IDUsuario"=>$ret->IDUsuario,
                    "IDEmpresa"=>$ret->IDEmpresa,
                    'logueado'=>TRUE
                );
                $this->session->set_userdata($usuario_data);
                    //abrir cvs para power script.
            }

        }
        echo json_encode($data);
    }
//--------------------------------------------------------------------------------------->

//-----------------obtener clave con correo electronico----------------------------------->

public function rec(){
$datos=json_decode($_POST["datos"]);


     if($datos->correo===""){
            $data["pass"]=0;
            $data["Mensaje"]="El campo esta vacio...";
        }else{
            //ahora con el usuario y la contraseña checo los datos 
            $tp=$this->Model_Usuarios->DatosUsuarioCorreo($datos->correo);

            if($tp===false){
                $data["pass"]=0;
                $data["Mensaje"]="Correo no valido..." ;
            }else{

                $data["pass"]=1;
                $data["Mensaje"]="Mensaje Enviado!";
                $tp=$this->Model_Correos->correoprueba($datos->correo);

                $this->session->set_userdata($usuario_data);

                    //abrir cvs para power script.
            }
           //   if($tp!=false){

           // //  ResetPassword($datos->correo,$res);



        }
        echo json_encode($data);
    }
    //     $datos=json_decode($_POST["datos"]);
      
    //     $tp=$this->Model_Usuarios->DatosUsuarioCorreo($datos->correo);

    //     if($tp!=false){

    //        $tp=$this->Model_Usuarios->Restablecercontra($datos->correo);
    //         ResetPassword($datos->correo,$res);



    //         $data["correo"]=0;
    //         $data["mensaje"]="Correo electronico no encontrado";
    //         }else{
    //         $data["correo"]=1;
    //         $data["mensaje"]="Se ha enviado un E-Mail";

    //               }
    //     echo json_encode($data);

    
    
//--------------------------------------------------------------------------------------->
    public function openstreet(){
        $regitros=array();
        $fichero="";
        if(($fichero=fopen("assets/street/DetalleQval.csv", "r"))!=false){
            $nombres_campos=fgetcsv($fichero,0,",","\"","\"");
            $num_campos=count($nombres_campos);
            while (($datos=fgetcsv($fichero,0,",","\"","\""))!==false) {
                for($icampo=0;$icampo<$num_campos;$icampo++){
                    $regitro[$nombres_campos[$icampo]]=$datos[$icampo];
                }
                $regitros[]=$regitro;
            }
            fclose($fichero);
            //var_dump($regitros);
            foreach ($regitros as $registro) {
                var_dump($registro)."<br>";
            }
        }
    }
     public function cerrar_session(){

        $data["token"]=$this->session->userdata("token");
        $this->Model_Usuarios->cierraSession($IDEmpresa);
        $usuario_data=array('logueado'=>FALSE);
        $this->session->set_userdata($usuario_data);
        $this->session->sess_destroy();
        $datos["pass"]=1;
        echo json_encode($datos);
    }

    public function gen(){
        $datos=json_decode($_POST["datos"]);   
        $num=$this->Model_Empresa->datsempresa($datos->razonsocial,$datos->nombrecomercial,$datos->RFC,$datos->tiposempresa,$datos->noempleados,$datos->facturacion,$datos->descripcion,$datos->empresa);
    
        $token=$this->Model_Usuarios->Preusuario($datos->EMAIL,$num);
        if($token!=false){
            mail_invitarUsu($datos->EMAIL,$datos->Razon_Social,$token,'PGEG243%');  

        }
$data["num"]=$num;
        echo json_encode($data);
    }
    public function addEmpresa(){
        //primero recibo los datos 
        if(isset($_POST["datos"])){
            $datos=json_decode($_POST["datos"]);
            if($datos->persona=="pf"){
                //verifico que las contraseñas sean validas si no mando un error
                if($datos->clave!=$datos->clave2){
                    $dat["pass"]=0;
                    $dat["mensaje"]="Las contraseñas no coinciden.";
                }else if($this->Model_Usuarios->verificaCorreo($datos->email)==false){
                    $dat["pass"]=0;
                    $dat["mensaje"]="El correo que trata de usar ya esta en uso";
                }else if($this->Model_Empresa->verificaRFC($datos->rfc)==false){
                    $dat["pass"]=0;
                    $dat["mensaje"]="El RFC que trata de usar ya esta en uso";
                }else if($this->Model_Empresa->verificarazon($datos->rz)==false){
                    $dat["pass"]=0;
                    $dat["mensaje"]="La Razon Social que trata de usar ya esta en uso";
                }else{
                    if($datos->plan->plan=="basic"){
                        $resp=$this->Model_Empresa->
                        Empresa($datos->persona,$datos->rz,$datos->nc,$datos->rfc,$datos->sector,$datos->subsector,$datos->rama,$datos->estado,$datos->plan->plan,"1");
                        $token=$this->Model_Usuarios->AddUsuario($resp,'','','',$datos->email,$datos->clave,$datos->clave2,'1',"Master");
                        mail_activarus($datos->email,$datos->rz,$token,$datos->clave);
                        $tp=$this->Model_Usuarios->DatosUsuarioCorreo($datos->email);
                        $this->Model_Empresa->RegPago($resp,'Efectivo',md5($resp.$datos->nc),$tp->IDUsuario,'Pagado','0','Basic');
                    }else{
                        $resp=$this->Model_Empresa->AddEmpresa($datos->persona,$datos->rz,$datos->nc,$datos->rfc,$datos->sector,$datos->subsector,$datos->rama,$datos->estado,$datos->plan->plan,"3");
                        $token = $this->Model_Usuarios->AddUsuario($resp,'','','',$datos->email,$datos->clave,$datos->clave2,'1',"Master");
                        mail_activarus($datos->email,$datos->rz,$token,$datos->clave);
                    }
                    $dat["num"]=$resp;
                    $dat["pass"]=1;
                    $dat["mensaje"]="ok";
                }
                
                echo json_encode($dat);
            
            }else if($datos->persona=="pm"){
                //verifico que las contraseñas sean validas si no mando un error
                if($datos->clave!=$datos->clave2){
                    $dat["pass"]=0;
                    $dat["mensaje"]="Las contraseñas no coinciden.";
                }else if($this->Model_Usuarios->verificaCorreo($datos->email)==false){
                    $dat["pass"]=0;
                    $dat["mensaje"]="El correo que trata de usar ya esta en uso";
                }else if($this->Model_Empresa->verificaRFC($datos->rfc)==false){
                    $dat["pass"]=0;
                    $dat["mensaje"]="El RFC que trata de usar ya esta en uso";
                }else if($this->Model_Empresa->verificarazon($datos->nombre)==false){
                    $dat["pass"]=0;
                    $dat["mensaje"]="El RFC que trata de usar ya esta en uso";
                }else{
                    if($datos->plan->plan=="basic"){
                        $resp=$this->Model_Empresa->AddEmpresa($datos->persona,$datos->nombre,$datos->nc,$datos->rfc,$datos->sector,$datos->subsector,$datos->rama,$datos->estado,$datos->plan->plan,"1");
                        $token=$this->Model_Usuarios->AddUsuario($resp,'','','',$datos->email,$datos->clave,$datos->clave2,'1',"Master");
                        mail_activarus($datos->email,$datos->nombre,$token,$datos->clave);
                        $tp=$this->Model_Usuarios->DatosUsuarioCorreo($datos->email);
                        $this->Model_Empresa->RegPago($resp,'Efectivo',md5($resp.$datos->nc),$tp->IDUsuario,'Pagado','0','Basic');
                    }else{
                        $resp=$this->Model_Empresa->AddEmpresa($datos->persona,$datos->nombre,$datos->nc,$datos->rfc,$datos->sector,$datos->subsector,$datos->rama,$datos->estado,$datos->plan->plan,"3");
                        $token=$this->Model_Usuarios->AddUsuario($resp,$datos->nombre,'','',$datos->email,$datos->clave,$datos->clave2,'1',"Master");
                        mail_activarus($datos->email,$datos->rz,$token,$datos->clave);
                    }
                    $dat["pass"]=1;
                    $dat["mensaje"]="ok";
                }
                echo json_encode($dat);
            }else{
                exit();
            }
        }else{
            exit();
        }
    }


}

