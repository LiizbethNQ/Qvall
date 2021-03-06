var empresa="";
function helper(){
	var that=this;
	var config={
		carga:"carga",
		urldata:"./",
		views:"./application/views/"
	}
	that.prevviewimg=function(ech,div){
		var files=$(ech)[0].files[0];
		if(files.type.match("'image,*'")){
			$(".alert").html("Archivo no valido").addClass("alert-danger").removeClass("alert-primary");
			return ;
		}else{
			var reader=new FileReader();
			reader.onload=(function(theFile){
				return function(e){
					$(div).attr("src",e.target.result);
				}
			})(files);
			reader.readAsDataURL(files);
			$(".alert").html("En espera de guardar los cambios")
		}
		
	}

	that.sendfile=function(url,datau,alert,callback){
		$.ajax({
			type:"POST",
			data:datau,
			cache:false,
			contentType:false, 
			processData: false,
			url:config.urldata+url,
			beforeSend :function()
			{
				$(alert).html("cargando...").addClass("alert-info").removeClass("alert-primary");
			},
			success:function(dat){
				callback(JSON.parse(dat));
			},
			error: function (r) {
                 console.log(r)
            }
		});
	}


//-----------------------------funcion para validar form-----------------------------------
	that.validardor=function(form,alert){
		var inpt={};
		var paso=false;
		$(form+" input").removeClass("is-invalid")
		$(alert).removeClass("alert-danger").addClass("alert-info").html('<strong>Procesando Datos...</strong> <i class="fa fa-spinner fa-pulse  fa-fw"></i>');
		$(form+" input").each(function(index){
			var input=$(this);
			if(input.attr("required")){
				switch(input.attr("type")){
					case"text":
						if(input.val()===""){
							$(alert).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+input.attr("lln")+" esta esta vacío.");
							input.addClass("is-invalid").focus();
							paso=false;
						}else{
							inpt[input.attr("lln")]=input.val();
							paso=true;
						}
						break;
					case"number":
						if(input.val()<=0){
							$(alert).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+input.attr("lln")+" debe ser mayor a 0.");
							input.addClass("is-invalid").focus();
							paso=false;
						}else{
							inpt[input.attr("lln")]=input.val();
							paso=true;
						}
						break;
					case"email":
						 var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
						if(emailRegex.test(input.val())){
							inpt[input.attr("lln")]=input.val();
							paso=true;
						}else{
							$(alert).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+input.attr("lln")+" no cumple con lo requerido.");
							input.addClass("is-invalid").focus();
							paso=false;
							
						}
						break;
					case "telephone":
							if(input.val()<=7){
								$(alert).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+input.attr("lln")+" no cumple con lo requerido.");
								input.addClass("is-invalid").focus();
								paso=false;

							}else{
								inpt[input.attr("lln")]=input.val();
								paso=true;
							}

						break;

				}
			}else{
				inpt[input.attr("lln")]=input.val();
			}
		})
		if(paso==false){
			return false;
		}
		$(form+" select").each(function(index){
				var input=$(this);
				if(input.attr("required")){
					if(input.val()===""){
							$(alert).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+input.attr("lln")+" esta esta vacío.");
							input.addClass("is-invalid").focus();
							return false;
						}else{
								inpt[input.attr("lln")]=input.val();
						}
				}else if(input.val()===null){
					inpt[input.attr("lln")]="";
				}else{
					inpt[input.attr("lln")]=input.val();
				}
		})
		if(Object.keys(inpt).length<$(form+" input[required]").length){
			return false;
		}else{
			return inpt;
		}
		
	}

//---------------------------------------------cookie----------------------------------------------------------------------------------->

	
that.getcokie=function(key){
		if($.cookie(key)!=undefined){
           return JSON.parse($.cookie(key));

		}else{

			return false;
		}

}

that.removecokie=function(key){
		$.removeCookie(key);
	}


that.addcokie=function(key,tip){
		$.cookie(key, JSON.stringify(tip));
	}
//-------------------------------------------------------------------------------------------------------------------------------->

	that.addlocal=function(key,tip){
		if(sessionStorage.getItem(key)){
			sessionStorage.removeItem(key);
		}
		sessionStorage.setItem(key,JSON.stringify(tip));
	}
	that.dellocal=function(key){

		sessionStorage.removeItem(key);
	}
	that.getlocal=function(key){
		return JSON.parse(sessionStorage.getItem(key));
	}
	that.loadview=function(pagina,obj){
		if(obj!=""){
			$("#"+config.carga).load(config.urldata+pagina,{datos:JSON.stringify(obj)});
		}else{
			$("#"+config.carga).load(config.urldata+pagina);
		}
		return false;
	}
	that.senddata=function(obt,url){
		console.log(JSON.stringify(obt)+'----- DATOS QUE ENVIA AL SERVIDOR')
		console.log(config.urldata+url)
		$.post(config.urldata+url,{datos:JSON.stringify(obt)},function(respuesta){
			// console.log(config.urldata+url + 'ESTA ES LA RUTA A LA QUE SE VA')
			// console.log(JSON.stringify(respuesta)+'----RESPUESTA DEL SERVIDOR');
			// console.log(respuesta.length+'LONGITUD DE RESPUESTA')
			// if(respuesta== null)
			//   location.reload();

			// var datos=JSON.parse(respuesta);
			// callback(datos);
			// console.log(datos + "si esta");
		})
	} 
	that.senddataa=function(obt,url,callback){
		$.post(config.urldata+url,{datos:JSON.stringify(obt)},function(respuesta){
			console.log(respuesta);
			var datos=JSON.parse(respuesta);
			callback(datos);
			console.log(datos + "si esta");
		})
	} 
//---------------borrar grupo----------------------------------------------
	that.borrargrup=function(num){

		obj={"num":num};
		that.senddata(obj,"Admin/delGrupo",function(){
			$("#borrargrupo").iziModal("close");
			var obj={
				"empresa":empresa
			}
			help.loadview("Admin/grupos",obj);	
		});
	}
//---------------mensaje error----------------------------------------------

	that.msjerror=function(error){
		$("#msgerror .iziModal-content h4").html(error);
		$("#msgerror").iziModal("open");
	}
	that.fex=function izziFrame(e){
		$(e).addClass("iziModal").iziModal({
			title:$(e).attr("title") || $(e).data("title") || 'Mensaje de QVal',
			headerColor: $(e).data("header-color") || '#005d8f',
			width: $(e).data("width") || 600 ,
			fullscreen: $(e).data("fullscreen") || false,
			zindex: $(e).data("zindex") || 1031,
			transitionIn: 'comingIn',
			transitionOut: 'comingOut',
			timeout: $(e).data("timeclose") || false,
			timeoutProgressbar: $(e).data("bar") || false,
			closeOnEscape:$(e).attr("closekey") || $(e).data("closekey")|| true,
			closeButton: $(e).attr("closebtn") ||$(e).data("closebtn") || true,
			overlayClose:$(e).attr("over") || $(e).data("over") || true,
			iframeURL:$(e).attr("url") || $(e).data("url") || false
		})	
	}
//----------------------funcion para agregar un cuestionario-------------------------------

	that.addcuest=function(mg){
		prin="#msjaltac";
		$(prin+" .alert").removeClass("alert-danger").addClass("alert-primary");
		var nombre=$(prin+" #ncuestionario").val();
		var emisor=$(prin+" #emisor").val();
		var receptor=$(prin+" #receptor").val();
		var email=0; var wats=0;
		if(nombre==""){
			$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Escribe un nombre para el cuestionario");
			return;
		}else if(emisor==="0"){
			$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Selecciona un Grupo Emisor");
			return;
		}else if(receptor==="0"){
			$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Selecciona un Grupo Receptor");
			return;
		}else if(receptor===emisor){
			$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Los Grupos no pueden ser iguales");
			return;
		}else{
			var cues=[];
			$(prin+" .tbpreguntas input[type='checkbox']").each(function(index){
				if($(this).is(':checked')){
					cues.push($(this).val());
				}
			})
		}
		if(cues.length===0){
			$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Selecciona almenos una pregunta.");
			return;
		}
		if($(prin+" #checemail").is(':checked')){
			email=1;
			
		}
		if($(prin+" #checwats").is(':checked')){
			wats=1;
		}
		$(prin+" .alert").html("<strong>Procesando los datos</strong>")
		obt={"Nombre":nombre,"wats":wats,"email":email,"emisor":emisor,"receptor":receptor,"empresa":empresa,"cuestionario":cues,"tp":mg,"num":that.getlocal('kyCues-mod')};
		that.senddataa(obt,"cuestionarios/addcues",function(respuesta){
		location.reload();

			if(respuesta.pass==1){
				$(prin).modal('destroy');
				that.dellocal('kyCues-mod');
				var obj={

					"empresa":empresa
				}

				setTimeout(function(){

					help.loadview("cuestionarios",obj);

				},1000)
				
			}else{
				$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong>"+respuesta.Mensaje);
			}
		})
	}
//--------------------------------------------------------------------------------------------
	that.crp=function(t){
		switch(t){
			case "SI/NO":
			$("#msjaltap .continp").html('<select name="" class="form-control" id="rp"><option value="SI">SI</option><option value="NO">NO</option></select>')
			break;
			case "SI/NO/NA":
			$("#msjaltap .continp").html('<select name="" class="form-control" id="rp"><option value="SI">SI</option><option value="NO">NO</option><option value="NA">NA</option></select>')
			break;
			case "DIAS":
			case "HORAS":
			case "NUMERO":
			case "MESES":
			$("#msjaltap .continp").html('<input type="number" value="0"  class="form-control" />')
			break;
			case "AB":
			$("#msjaltap .continp").html('')
			break;

		}
	}
	//-------------------------funciones para las acciones de los cuestionarios------------------------------->
	
	that.functC=function(){
		var num,tip;
		$(".accion-grupoC .dropdown-item").on({
			click:function(){
				var tip=$(this).attr("lla");
				var num=$(this).attr("id");
				that.addlocal("kyCues-mod",num);
				obj={"num":num,"tip":tip}
				that.senddataa(obj,"cuestionarios/OprCues",function(respuesta){
					var datos=respuesta.Mensaje[0];
					if(tip=="asigpr"){
						var cues=datos.Cuestionarios.split(",");
						$("#msjlistpregp .table tbody input[type='checkbox']").each(function(index){
							for(preg in cues){
								if($(this).val()===cues[preg]){
									$(this).prop('checked', true)	
								}
							}

						})
						$("#msjlistpregp").Modal("toggle");
					}else{
						$("#msjaltac #ncuestionario").val(datos.Nombre)
						$("#msjaltac #emisor").val(datos.PerfilCalifica+"-"+datos.TPEmisor)
						$("#msjaltac #receptor").val(datos.PerfilCalificado+"-"+datos.TPReceptor)
						if(datos.Wats==1){
							$("#msjaltac #checwats").prop('checked', true)
						}
						if(datos.Email==1){
							$("#msjaltac #checemail").prop('checked', true)
						}
						var cues=datos.Cuestionario.split(",");
						$(".tbpreguntas table tbody input[type='checkbox']").each(function(index){
							for(preg in cues){
								if($(this).val()===cues[preg]){
									$(this).prop('checked', true)	
								}
							}

						})
						that.addlocal("kyCues-mod",datos.IDCuestionario);
						$("#msjaltac #btn-cues").attr("onclick","help.addcuest('m')")
						$("#msjaltac").Modal('toggle')
					}
				})
				
			}
		});
		
	}

	that.optionusr=function(opt,num){
		var ti={};
			switch(opt){
				case "add":
					 ti["data"]=that.validardor('#form-usuario',"#form-usuario .alert");
					if(ti["data"]!=false){
						ti["tip"]="adduser";
						ti["empresa"]=empresa;
						ti["Grupo"]=$("#form-usuario select[lln='Grupo']").val();
					}
					break;
				case "get-tel":
						ti["tipo"]="I";
						ti["usuario"]=num;
						ti["tip"]="telphones";
					break;
				case "add-tel":
						ti["tip"]="add-tel";
						ti["tipo"]="I";
						ti["data"]=that.validardor('#add-tel',"#add-tel .alert");
						ti["DQTipo"]=$("#add-tel #DQTipo").val();
						ti["usuario"]=num;
						break;
				case "dat-tel":
					ti["tip"]="dat-tel";
					ti["num"]=$("#add-tel #telefonoss").val();
					ti["tipo"]="I";
					break;
				case "update-tel":
						ti["tip"]="update-tel";
						ti["num"]=that.getlocal("numtel");
						ti["DQTipo"]=$("#add-tel #DQTipo").val();
						ti["data"]=that.validardor('#add-tel',"#add-tel .alert");
						ti["usuario"]=num;
						break;
				case "del-tel":
					ti["tip"]="del-tel";
					ti["num"]=$("#add-tel #telefonoss").val();
					ti["usuario"]=num;
					break;
				case "update":
					ti["data"]=that.validardor('#add-usuario',"#add-usuario .alert");
					if(ti["data"]!=false){
						ti["tip"]="update";
						ti["usuario"]=num;
						ti["Grupo"]=$("#form-usuario select[lln='Grupo']").val();
					}else{
						return;
					}
					break;
				case "Del":
					ti["tip"]="Del";
					ti["usuario"]=num;
					break;
				case "gen-qr":
					cg="https://chart.googleapis.com/chart?cht=qr&chs=400x400&choe=ISO-8859-1&chl="+num;
					$("#qr-funct img").attr("src",cg);
					$("#qr-funct").modal("toggle");
					return;
					break;

			}
			that.senddataa(ti,"Usuarios/optionuser",function(resp){
				if(opt==="add"){
					$("#add-usuario").modal("toggle");
					setTimeout(function(){
						that.loadusuarios();
					},1000)


				}else if(opt==="get-tel"){
					var t=""
					for(tel in resp.telepones){
					
						t+='<option value="'+resp.telepones[tel].IDTelefono+'">'+resp.telepones[tel].Telefono+'('+resp.telepones[tel].DQTipo+')</option>'

					}

					$("#add-tel #btnadd-grupo").attr("onclick","help.optionusr('add-tel','"+num+"')")
					$("#add-tel #acc-tel a[lln='del-tel'").attr("onclick","help.optionusr('del-tel','"+num+"')")
					$("#add-tel #telefonoss").html(t)
					$("#add-tel").modal('toggle')
				}else if(opt==="add-tel"){
					var t=""
					for(tel in resp.telepones){
						t+='<option value="'+resp.telepones[tel].IDTelefono+'">'+resp.telepones[tel].Telefono+'('+resp.telepones[tel].DQTipo+')</option>'
					}
					$("#add-tel input[lln='Telefono']").val('')
					$("#add-tel .alert").html("Datos Agregados");
					$("#add-tel #telefonoss").html(t)
				}else if(opt==="dat-tel"){
					$.each(resp.Mensaje,function(index,datos){
						$("#add-tel input[lln='Telefono']").val(datos.Telefono)
						$("#add-tel #DQTipo").val(datos.DQTipo)
						that.addlocal("numtel",datos.IDTelefono)
						$("#add-tel #collapseExample").collapse('show')
						$("#add-tel #btnadd-grupo").attr("onclick","help.optionusr('update-tel','"+datos.IDUsuario+"')")
					})
				}else if(opt==="update-tel"){
					var t="";
					$.each(resp.telepones,function(index,tel){
						t+="<option value='"+tel.IDTelefono+"'>"+tel.Telefono+"("+ tel.DQTipo +")</option>";
					})
					that.dellocal("numtel");
					$("#add-tel #telefonoss").html(t)
					$("#add-tel .alert").html("Datos Actualizados");
					$("#add-tel input[lln='Telefono']").val("");
					$("#add-tel #btnadd-grupo").attr("onclick","help.optionusr('add-tel','"+resp.telepones[resp.telepones.length-1].IDUsuario+"')")
					$("#add-tel #collapseExample").collapse('hide');
				}else if(opt==="del-tel"){
					var t="";
					$.each(resp.telepones,function(index,tel){
						t+="<option value='"+tel.IDTelefono+"'>"+tel.Telefono+"("+ tel.DQTipo +")</option>";
					}) 
					
					$("#add-tel #telefonoss").html(t)
					$("#add-tel .alert").html("Datos Actualizados");
				}else if(opt==="update"){
					$("#add-usuario").modal("toggle");
					setTimeout(function(){
						that.loadusuarios();
					},1000)
					
				}else{
					$("#msj-conf").modal("toggle");
					setTimeout(function(){
						that.loadusuarios();
					},1000)
				}
			})
		}
		that.datsempresa=function(){
		var funt=help.getcokie("datusuario");
		var funct=JSON.parse(funt.Mensaje.funciones);
		if(funct[1]==="1"){
			$(".item-menu").removeClass("active");
			$("#mun-config.item-menu").addClass("active");
			empresa=funt.Mensaje.IDEmpresa;
			usuario=funt.Mensaje.IDUsuario;

			console.log(empresa + "--------")


		}else{
			help.msjerror("No tiene permisos para esta accion, contacte al administrador.");
		}
		
	}
	//funciones para los usuarios

	that.loadusuarios=function(){
		var funt=JSON.parse(help.getcokie("datusuario"));
		var funct=JSON.parse(funt.Mensaje[0].funciones);
		console.log(funct[2]);
		if(funct[2]==="1"){
			$(".active .sub-menu").hide("slow")
			$(".item-menu").removeClass("active");
			$("#mun-us.item-menu").addClass("active");
			$("#mun-us.item-menu").find(".sub-menu").fadeIn(1000);
			var obj={"empresa":empresa}
			location.reload();
			that.loadview("usuarios",obj);
		}else{
			help.msjerror("No tiene permisos para esta accion, contacte al administrador.");
		}
		
	}
	//termina las funciones para los usuarios
	//funcion para los clientes
	that.loadclientes=function(){
		var funt=JSON.parse(help.getcokie("datusuario"));
		var funct=JSON.parse(funt.Mensaje[0].funciones);
				console.log(funct[3]);

		if(funct[3]==="1"){
			$(".active .sub-menu").hide("slow")
			$(".item-menu").removeClass("active");
			$("#mun-clie.item-menu").addClass("active");
			$("#mun-clie.item-menu").find(".sub-menu").fadeIn(1000);
			var tp={"empresa":empresa}
			that.loadview("Clientesp",tp);
		}else{
			help.msjerror("No tiene permisos para esta accion, contacte al administrador.");
		}
	}
	that.loadresultados=function(){
		var funt=JSON.parse(help.getcokie("datusuario"));
		var funct=JSON.parse(funt.Mensaje[0].funciones);
		if(funct[6]==="1"){
			$(".active .sub-menu").hide("slow")
			$(".item-menu").removeClass("active");
			$("#mun-res.item-menu").addClass("active");
			$("#mun-res.item-menu").find(".sub-menu").fadeIn(1000);
			var tp={"empresa":empresa}
			that.loadview("Resultados",tp);
		}else{
			help.msjerror("No tiene permisos para esta accion, contacte al administrador.");
		}
	}
}

    var help=new helper;
    if(empresa===""){
	if(help.getcokie("tip")!=false){
		console.log("-----------------"+help.getcokie("tip"));
		dat=JSON.parse(help.getcokie("tip"));
		empresa=dat.Mensaje.IDEmpresa;
		usuario=dat.Mensaje.IDUsuario;

	}
}

$(document).ready(function($){
	$(".izimodal").each(function(i,e){
		help.fex(e);
	});
	
})


$(document).on('click',".p-grup",function(){
	var funt=JSON.parse(help.getcokie("datusuario"));
		var funct=JSON.parse(funt.Mensaje[0].funciones);
		if(funct[1]==="1"){
			$(".active .sub-menu").hide("slow")
			$(".item-menu").removeClass("active");
			$(this).addClass("active");
			$(this).find(".sub-menu").fadeIn(1000);
			var obj={
				"empresa":empresa			}
			help.loadview("Admin/grupos",obj);
		}else{
			help.msjerror("No tiene permisos para esta accion, contacte al administrador.");
		}
})

//------------------------add grupo-------------------------------------------------------------
$(document).on("click","#add-grupo #btnadd-grupo",function(){
	var obt={};
	//obtengo los valores seleccionados 
	var nombre= $("#add-grupo #nombre").val();
	var tipo= $('#add-grupo #frmtipo input:radio[name=tipo]:checked').val();
	if($("#add-grupo #nombre").val()=="" || $("#add-grupo #nombre").val().lenght>5){

		$("#add-grupo #alertadd").html("<strong>Error! </strong> Elige un nombre para el grupo").addClass("alert-danger").removeClass("alert-primary");
		return ;
	}else{
		obt={"Nombre":nombre,"Tipo":tipo,"Empresa":empresa};
		console.log(obt)
location.reload();
		help.senddataa(obt,"admin/AddGrupo",function(respuesta)

	
		{
			if(respuesta.pass==1){
				$("#add-grupo").modal('hide');
				var obj={
                "Nombre":nombre,"Tipo":tipo,"Empresa":empresa				}
				help.loadview("admin/AddGrupo",obj);
			}else{
				$("#add-grupo #alertadd").html("<strong>Error! </strong> "+respuesta.Mensaje).addClass("alert-danger").removeClass("alert-primary");
			}
		})
	}
	
})

//---------------modificar grupo--------------------------------------------
$(document).on("click","#add-grupo #btnmod-grupo",function(){
	var nombre= $("#add-grupo #nombre").val();
	var tipo= $('#add-grupo #frmtipo input:radio[name=tipo]:checked').val();    
	if($("#add-grupo #nombre").val()=="" || $("#add-grupo #nombre").val().lenght>5){
		$("#add-grupo #alertadd").html("<strong>Error! </strong> Elige un nombre para el grupo").addClass("alert-danger").removeClass("alert-primary");
		return ;
	}else{
		obt={"Nombre":nombre,"Tipo":tipo,"num":sessionStorage.getItem("numgrup")};
		location.reload();

		help.senddataa(obt,"Admin/ModGrupo",function(respuesta){
			console.log(respuesta);
					location.reload();

			if(respuesta.pass==1){
				$("#add-grupo").modal('hide');
				$("#add-grupo .modal-footer #btnmod-grupo").attr("id","btnadd-grupo")
				$("#add-grupo #nombre").val("");
				var obj={
					"empresa":empresa
				}
				

				help.loadview("Admin/grupos",obj);
			}else{
				$("#add-grupo #alertadd").html("<strong>Error! </strong> "+respuesta.Mensaje).addClass("alert-danger").removeClass("alert-primary");
			}
		})
	}
})
$(document).on("click",".accion-grupoI .dropdown-item",function(){
	if($(this).attr("lla")=="as"){
		var obj={"Empresa":empresa}
		help.senddataa(obj,"cuestionarios/getcuestion",function(respuesta){

			if(respuesta.Cuestionario==false){
				$("#sncuest").iziModal("open");
			}else{
			}
			
		})

	}else if($(this).attr("lla")=="mod"){
		obj={"num":$(this).attr("id")}
		help.senddataa(obj,"Admin/datgrupos",function(resp){
			sessionStorage.setItem("numgrup",resp.Perfildatos[0].IDGrupo);
			$("#add-grupo input[type='radio']").removeAttr("checked")
			$("#add-grupo #nombre").val(resp.Perfildatos[0].Nombre);
			$("#add-grupo #frmtipo input[id='"+resp.Perfildatos[0].Tipo+"']").attr("checked","checked");
			$("#add-grupo .modal-footer #btnadd-grupo").attr("id","btnmod-grupo")
			$("#add-grupo").modal("show")
		})
	}else if($(this).attr("lla")=="del"){

		$("#borrargrupo").iziModal("open");
		$("#borrargrupo .btn-danger").attr("id",$(this).attr("id"));


		 
	}

	
})

$(document).on("click",".p-cues",function(){
	var funt=JSON.parse(help.getcokie("datusuario"));
		var funct=JSON.parse(funt.Mensaje[0].funciones);
		if(funct[5]==="1"){
				$(".active .sub-menu").hide("slow")
				$(".item-menu").removeClass("active");
				$(this).addClass("active");
				$(this).find(".sub-menu").fadeIn(1000);
			var obj={
				"empresa":empresa
			}
			help.loadview("cuestionarios",obj);
		}else{
			help.msjerror("No tiene permisos para esta accion, contacte al administrador.");
		}
		
})
$(document).on("click",".p-express",function(){
		$(".active .sub-menu").hide("slow")
		$(".item-menu").removeClass("active");
		$(this).addClass("active");
		$(this).find(".sub-menu").fadeIn(1000);
	 var obj={
		"empresa":empresa
	 }
	 help.loadview("express",obj);
})
$(document).on("click","#savepreg",function(){
	$("#msjaltap .alert").html("Procesando los datos").addClass("alert-primary").removeClass("alert-danger")
	var p=$("#msjaltap #pregunta").val();
	var f=$("#msjaltap #formpr").val();
	var r=$("#msjaltap #rp").val();
	var fr=$("#msjaltap #frecuencia").val();
	var pun=$("#msjaltap #puntaje").val();
	var respuesta="";
	if(p===""){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else if((f==="")||(f==="0")){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa la forma de esta pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else if((fr==="")||(fr==="0")){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una frecuencia con lo que aparecera ésta pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else if(pun===""){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa puntaje para una calificación de esta pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else{
	
		obj={
			"pregunta":p,"forma":f,"frecuencia":fr,"puntos":pun,"respuesta":respuesta,"empresa":empresa
		};
		location.reload();
		help.senddataa(obj,"cuestionarios/addPreg",function(resp){
			if(resp.pass==1){
				$("#msjaltap").modal('toggle');
				
				setTimeout(function(){
					var obj={
						"empresa":empresa
					}
					help.loadview("preguntas",obj)},500);
			}else{
				$("#msjaltap .alert").html("<strong>Error!</strong> "+resp.Mensaje);
			}
		})
		
	}
})
$(document).on("click","#modifpreg",function(){
	$("#msjaltap .alert").html("Procesando los datos").addClass("alert-primary").removeClass("alert-danger")
	var p=$("#msjaltap #pregunta").val();
	var f=$("#msjaltap #formpr").val();
	var r=$("#msjaltap #rp").val();
	var fr=$("#msjaltap #frecuencia").val();
	var pun=$("#msjaltap #puntaje").val();
	var respuesta="";
	if(p===""){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else if((f==="")||(f==="0")){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa la forma de esta pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else if((fr==="")||(fr==="0")){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una frecuencia con lo que aparecera ésta pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else if(pun===""){
		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa puntaje para una calificación de esta pregunta.").addClass("alert-danger").removeClass("alert-primary")
	}else{
		// if($("#rp").length > 0 ){
		// 	respuesta=$("#rp").val()
		// }
		obj={
			"tip":"modDat","pregunta":p,"forma":f,"frecuencia":fr,"puntos":pun,"respuesta":respuesta,"num":help.addlocal("kyprd-mod")

		};
		location.reload();
		help.senddataa(obj,"cuestionarios/oppreg",function(resp){
			if(resp.pass==1){
				$("#msjaltap").modal('toggle');
				
				setTimeout(function(){
					var obj={
						"empresa":empresa
					}
					help.loadview("preguntas",obj)},500);
			}else{
				$("#msjaltap .alert").html("<strong>Error!</strong> "+resp.Mensaje);
			}
		})
		
		
	}
})

// $(document).on("click","#modifpreg",function(){
// 	$("#msjmodp .alert").html("Procesando los datos").addClass("alert-primary").removeClass("alert-danger")
// 	var p=$("#msjaltap#pregunta").val();
// 	var f=$("#msjaltap #formpr").val();
// 	var r=$("#msjaltap #rp").val();
// 	var fr=$("#msjaltap #frecuencia").val();
// 	var pun=$("#msjaltap #puntaje").val();
// 	var respuesta="";
// 	if(p===""){
// 		$("#msjaltap.alert").html("<strong>Error!</strong> Ingresa una pregunta.").addClass("alert-danger").removeClass("alert-primary")
// 	}else if((f==="")||(f==="0")){
// 		$("#msjaltap.alert").html("<strong>Error!</strong> Ingresa la forma de esta pregunta.").addClass("alert-danger").removeClass("alert-primary")
// 	}else if((fr==="")||(fr==="0")){
// 		$("#msjaltap.alert").html("<strong>Error!</strong> Ingresa una frecuencia con lo que aparecera ésta pregunta.").addClass("alert-danger").removeClass("alert-primary")
// 	}else if(pun===""){
// 		$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa puntaje para una calificación de esta pregunta.").addClass("alert-danger").removeClass("alert-primary")
// 	}else{

// 			}
// 		obj={
// 			tip:"modDat","pregunta":p,"forma":f,"frecuencia":fr,"puntos":pun,"respuesta":respuesta,"num":help.getlocal("kyprd-mod")
// 		};
// 								location.reload();
// 		help.senddata(obj,"cuestionarios/addPreg",function(resp)
// {
// 			if(resp.pass==1){
// 				$("#msjaltap").Modal('toggle');
				
// 				setTimeout(function(){
// 					var obj={
// 						"empresa":empresa
// 					}
// 					help.loadview("preguntas",obj)},500);
// 			}else{
// 				$("#msjmodp .alert").html("<strong>Error!</strong> "+resp.Mensaje);
// 			}
// 		})
		
		
//  	}
//  })
$(document).on("click",".accion-grupoP .dropdown-item",function(){
	 var num,tip;
	  num=$(this).attr("id"),tip=$(this).attr("lla");
	var obj={
		"num":num,
		"tip":tip
	}
	help.senddataa(obj,"cuestionarios/oppreg",function(resp){
		if(tip=="mod"){
			var datos=resp.datos[0];
			$("#msjaltap #pregunta").val(datos.Pregunta)
			$("#msjaltap #formpr").val(datos.Forma)
			help.crp(datos.Forma);
			$("#msjaltap #rp").val(datos.Respuesta)
			$("#msjaltap #frecuencia").val(datos.Frecuencia)
			$("#msjaltap #puntaje").val(datos.Peso)
			$("#msjaltap #puntaje").val(datos.Peso)
			$("#msjaltap #savepreg").attr("id","modifpreg");
			$("#msjaltap").modal("show");
			help.addlocal("kyprd-mod",datos.IDPregunta);
		}else{
			var obj={
				"empresa":empresa
			}
			help.loadview("preguntas",obj);
		}
	})
})


$(document).on("click","#msjlistpregp #gent-preg",function(){
	var num;
	$("#msjlistpregp table input").each(function(index){
		if($(this).is(':checked')){
			num=$(this).val();
		}
	})
	var obj={"num":num,"tip":"dat"}
									location.reload();

	help.senddataa(obj,"cuestionarios/oppregqval",function(resp){

		$("#msjaltap #pregunta").val(resp.datos[0].Pregunta);
		$("#msjaltap #formpr").val(resp.datos[0].Forma);
		help.crp(resp.datos[0].Forma);
		$("#msjaltap #puntaje").val(resp.datos[0].Puntos);
		$("#msjlistpregp").modal("hide");
	})
})

$(document).on('click','#add-cuesM',function(){
	var cues=[];
	$("#mslistpr table input[type='checkbox']").each(function(index){
		if($(this).is(':checked')){
			cues.push($(this).val());
		}
	})
	var obj={"num":help.getlocal("kyCues-mod"),"tip":"ModCues","cues":cues}
	help.senddataa(obj,"cuestionarios/OprCues",function(resp){
		$("#mslistpr").modal('close');
		setTimeout(function(){
			var obj={
				"empresa":empresa
			}
			help.loadview("cuestionarios",obj)},500);
	})
})


$(document).on("click","li[lla='add-funU']",function(){
	console.log();
	$("#add-funct #btnadd-accus").attr("data-us",$(this).attr("llc"));
	$("#add-funct").modal('toggle');
});
$(document).on("click","li[lla='del-funU']",function(){
		$("#msj-conf #btn-primary").attr("onclick","help.optionusr('Del',"+$(this).attr("llc")+")")


	// $("#msj-conf #btn-primary").attr("onclick","Usuarios.optionuser('Del' ,"+$(this).attr("llc")+")")
	// obt={"num":$(this).attr("llc"),"tip":"Dat-us"}
	$("#msj-conf").modal('toggle');

})

$(document).on('click',"li[lla='mod-funU']",function(){
	var nunm=$(this).attr("llc");
	// $("#add-usuario").modal('toggle');
	obt={"num":$(this).attr("llc"),"tip":"Dat-us"}

	console.log(JSON.stringify(obt)+'----------- SI ESTA EL OBJETO ')
	help.senddataa(obt,"Usuarios/optionuser",function(resp){
		console.log(JSON.stringify(resp)+'ESTA ES LA RESPUESTA QUE MANDA DE LA CONSULTA')
		// var datos=resp.datos;
		$("#add-usuario input[lln='Nombre']").val(resp.datosU.Nombre)
		$("#add-usuario input[lln='Apellidos']").val(resp.datosU.Apellidos)
		$("#add-usuario input[lln='Usuario']").val(resp.datosU.Usuario)
		$("#add-usuario input[lln='Puesto']").val(resp.datosU.Puesto)
		$("#add-usuario input[lln='Email']").val(resp.datosU.Correo)
		$("#add-usuario select[lln='Grupo']").val(resp.datosU.IDConfig)

		$("#add-usuario #btnadd-grupo").attr("onclick","help.optionusr('update','"+nunm+"')")
		$("#add-usuario").modal('toggle');
	})
	
});
$(document).on("click","#carga .pagination  .page-item a",function(){
	var destino=$(this).attr("href");
	$("#carga").load(destino);
	return false;
})
//---------------------Exporta JSON/Grupos-------------------------------->
$(document).on("click","#exporjsongrup",function(){
	var tip={"num":empresa};
	help.senddataa(tip,"admin/JSon_export", function(resp){
		$("#exporjson .modal-body .card-body").html(JSON.stringify(resp));
		$("#exporjson").modal("show");
		return false;
	})
	
})
//---------------------Exporta JSON/Usuarios-------------------------------->

$(document).on("click","#exporjsonus",function(){
	var tip={"num":empresa};
	help.senddataa(tip,"Usuarios/JSon_export", function(resp){
		$("#exporjson .modal-body .card-body").html(JSON.stringify(resp));
		$("#exporjson").modal("show");
		return false;
	})
	
})

$(document).on("click","#btnaddexpress",function(){
		var tip={};
		tip["data"]=help.validardor("#form-expres", "#form-expres .alert");
		tip["empresa"]=empresa;
		if(tip["data"]!=false){
			help.senddata(tip,"clientes/cargaexpress", function(res){
				cg="https://chart.googleapis.com/chart?cht=qr&chs=400x400&choe=ISO-8859-1&chl='"+res.usuario+"'";
				$("#qr-express .modal-body img").attr("src",cg);
				$("#qr-express").modal("show")
			})
		}
		
})
$(document).on("hide.bs.modal","#qr-express",function(){
	$("#carga input").val("");
	$("#qr-express .alert").html("Llena los datos correctamente.")
})
$(document).on("click","#btn-login", function(){
	$(".alert").addClass("alert-info").removeClass("alert-danger").html("Procesando Datos");
 tip={"user":$("#user").val(),"pas":$("#pas").val()};
	console.log(JSON.stringify(tip)+"---------")

	help.senddataa(tip,"admin/login", function(resp){
		console.log(resp);
		
		if(resp.pass===0){
			$(".alert").html(resp.Mensaje)
			$(".alert").removeClass("alert-info").addClass("alert-danger");
		}else{
			if( $('input[id="recordarusuario"]').prop('checked') ) {
				help.addcokie("datacceso",tip);	
			}else if(help.getcokie("datacceso")!=false){
					help.removecokie('datacceso');
			}
			help.addcokie("datusuario",resp);
			empresa=resp.Mensaje.Impresa;
			 location.href ="admin";
		}
	})
})
//-----------------------boton recordar contraseña----------------------------------
$(document).on("click","#btn-rec", function(){
	$(".alert2").addClass("alert-info").removeClass("alert-danger").html("Espere un momento porfavor...");
 tp={"correo":$("#correo").val()};
	console.log(JSON.stringify(tp)+"---------")

	
		help.senddataa(tp,"admin/rec", function(resp){
		console.log(resp);
		
		if(resp.pass===0){
			$(".alert2").html(resp.Mensaje)
			$(".alert2").removeClass("alert-info").addClass("alert-danger");			}	
	})
 })
//--------------------------------------------------------------------------------------------
$(document).on("change","#altausexpfiel",function(){
	
	var frm=$("#altaexpres form#frmchang");
	var form= new FormData(frm[0]);
	form.append("empresa",empresa);
	help.sendfile("/Downdload/upusuarios",form,"#altaexpres .alert",function(resp){
		if(resp.pass==1){
			$("#altaexpres").modal("toggle");
			help.loadusuarios();
		}else{
			$("#altaexpres .alert").html("<strong>!Error¡ </strong> "+resp.mensaje).addClass("alert-danger").removeClass("alert-primary");
		}
	})
})
$(document).on("click","#uplogoemp",function(){
	var frm=$("form#form-logo");
	var form= new FormData(frm[0]);
	form.append("empresa",empresa);
	help.sendfile("/Downdload/uplogo",form,"#modalexpresclie .alert",function(resp){
		if(resp.pass==10){
			help.datsempresa();
		}else{
			$(".alert").html("<strong>!Listo¡</strong> "+"...").addClass("alert-danger").removeClass("alert-danger");
							location.reload();

		}
	})
})
$(document).on("change","#altaexpresclie",function(){
	
	var frm=$("#modalexpresclie form#frmchang");
	var form= new FormData(frm[0]);
	form.append("empresa",empresa);
	help.sendfile("/Downdload/upclientes",form,"#modalexpresclie .alert",function(resp){
		if(resp.pass==1){
			$("#modalexpresclie").modal("hide");
			help.loadclientes();
		}else{
			$("#modalexpresclie .alert").html("<strong>!Error¡ </strong> "+resp.mensaje).addClass("alert-danger").removeClass("alert-primary");
		}
	})
})

$(document).on("click","#add-funct #btnadd-accus",function(){
	var cade=[];

	$("#add-funct tbody input[type='checkbox']").each(function(index){
		if($(this).prop('checked')){
			cade.push("1");
		}else{
			cade.push("0");
		}
	})
	var tp={"num":$(this).attr("data-us"),"funciones":cade};
	help.senddata(tp,"Usuarios/addaccions", function(resp){
		$("#add-funct").modal("hide");
		help.loadusuarios();
	})
})

//---------------------guarda datos general------------------------------------>

$(document).on("click","#btn-updategen",function(){
	$("form#dat-general .alert").addClass("no-visible").html("")
	var frm=$("form#dat-general");
	var form= new FormData(frm[0]);
	form.append("empresa",empresa);
	help.sendfile("/admin/updateGen",form,"",function(resp){
		console.log(resp)
		location.reload();

		if(resp.pass===0){
			$("form#dat-general .alert").removeClass("no-visible").html("<strong>Error! </strong> "+resp.mensaje)
		}else{
			help.datsempresa();
		}
		})
})
//-------------------------------------------------------------------------------------->

//---------------------Boton guardar datos contacto--------------------------------------------------------->

$(document).on("click","#btn-datcont",function(){
	$("form#dat-contac .alert").addClass("no-visible").html("")
	var frm=$("form#frm-contac");
	var form= new FormData(frm[0]);
	form.append("empresa",empresa);
	help.sendfile("/admin/updatecont",form,"",function(resp){
		console.log(resp)
		location.reload();
		if(resp.pass===0){
			$("form#btn-datcont .alert").removeClass("no-visible").html("<strong>Error! </strong> "+resp.mensaje)
		}else{
			help.datsempresa();
		}
		}) 
})
//-------------------------------------------------------------------------------------->

//-----------------------guardar datos usuario------------------------------------------>
$(document).on("click","#btn-upus",function(){
	$("form#frm-datus .alert").addClass("no-visible").html("")
	var frm=$("form#frm-datus");
	var form= new FormData(frm[0]);
	form.append("usuario",usuario);
	help.sendfile("/admin/updateus",form,"",function(resp){
		console.log(resp)
		location.reload();

		if(resp.pass===0){
			$("form#frm-datus .alert").removeClass("no-visible").html("<strong>Error! </strong> "+resp.mensaje).addClass("alert-danger").removeClass("alert-primary");
		}else{
			help.datsempresa();
		}
		})
})
//-----------------boton guardar cambio de clave ------------------------------------------------------------->

$(document).on("click","#btn-upclave",function(){
	$("form#frm-upclave .alert").addClass("no-visible").html("")
	var frm=$("form#frm-upclave");
	var form= new FormData(frm[0]);
	form.append("usuario",usuario);
	help.sendfile("/admin/updatecl",form,"",function(resp){
		console.log(resp)
		location.reload();

		if(resp.pass===0){
			$("form#frm-upclave .alert").removeClass("no-visible").html("<strong>Error! </strong> "+resp.mensaje).addClass("alert-danger").removeClass("alert-primary");

		}else{
			help.datsempresa();
		}
		})
})

//-------------------------------------------------------------------------------------->

$(function(){
	help.datsempresa();
})

$(document).on("click","#search-btn",function(){

    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
  //   $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  // });		
})