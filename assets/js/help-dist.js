function helper(){var n=this,o="carga",r="./";n.prevviewimg=function(e,a){var o=$(e)[0].files[0];if(o.type.match("'image,*'"))$(".alert").html("Archivo no valido").addClass("alert-danger").removeClass("alert-primary");else{var t=new FileReader;t.onload=function(e){$(a).attr("src",e.target.result)},t.readAsDataURL(o),$(".alert").html("En espera de guardar los cambios")}},n.sendfile=function(e,a,o,t){$.ajax({type:"POST",data:a,cache:!1,contentType:!1,processData:!1,url:r+e,beforeSend:function(){$(o).html("cargando...").addClass("alert-info").removeClass("alert-primary")},success:function(e){t(JSON.parse(e))},error:function(e){console.log(e)}})},n.validardor=function(e,o){var t={},r=!1;return $(e+" input").removeClass("is-invalid"),$(o).removeClass("alert-danger").addClass("alert-info").html('<strong>Procesando Datos...</strong> <i class="fa fa-spinner fa-pulse  fa-fw"></i>'),$(e+" input").each(function(e){var a=$(this);if(a.attr("required"))switch(a.attr("type")){case"text":""===a.val()?($(o).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+a.attr("lln")+" esta esta vacío."),a.addClass("is-invalid").focus(),r=!1):(t[a.attr("lln")]=a.val(),r=!0);break;case"number":a.val()<=0?($(o).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+a.attr("lln")+" debe ser mayor a 0."),a.addClass("is-invalid").focus(),r=!1):(t[a.attr("lln")]=a.val(),r=!0);break;case"email":/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(a.val())?(t[a.attr("lln")]=a.val(),r=!0):($(o).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+a.attr("lln")+" no cumple con lo requerido."),a.addClass("is-invalid").focus(),r=!1);break;case"telephone":a.val()<=7?($(o).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+a.attr("lln")+" no cumple con lo requerido."),a.addClass("is-invalid").focus(),r=!1):(t[a.attr("lln")]=a.val(),r=!0)}else t[a.attr("lln")]=a.val()}),0!=r&&($(e+" select").each(function(e){var a=$(this);if(a.attr("required")){if(""===a.val())return $(o).addClass("alert-danger").removeClass("alert-info").html("<strong>Error! </strong> el campo: "+a.attr("lln")+" esta esta vacío."),a.addClass("is-invalid").focus(),!1;t[a.attr("lln")]=a.val()}else null===a.val()?t[a.attr("lln")]="":t[a.attr("lln")]=a.val()}),!(Object.keys(t).length<$(e+" input[required]").length)&&t)},n.getcokie=function(e){return null!=$.cookie(e)&&JSON.parse($.cookie(e))},n.removecokie=function(e){$.removeCookie(e)},n.addcokie=function(e,a){$.cookie(e,JSON.stringify(a))},n.addlocal=function(e,a){sessionStorage.getItem(e)&&sessionStorage.removeItem(e),sessionStorage.setItem(e,JSON.stringify(a))},n.dellocal=function(e){sessionStorage.removeItem(e)},n.getlocal=function(e){return JSON.parse(sessionStorage.getItem(e))},n.loadview=function(e,a){return""!=a?$("#"+o).load(r+e,{datos:JSON.stringify(a)}):$("#"+o).load(r+e),!1},n.senddata=function(e,a){console.log(JSON.stringify(e)+"----- DATOS QUE ENVIA AL SERVIDOR"),console.log(r+a),$.post(r+a,{datos:JSON.stringify(e)},function(e){})},n.senddataa=function(e,a,o){$.post(r+a,{datos:JSON.stringify(e)},function(e){console.log(e);var a=JSON.parse(e);o(a),console.log(a+"si esta")})},n.borrargrup=function(e){obj={num:e},n.senddata(obj,"Admin/delGrupo",function(){$("#borrargrupo").iziModal("close");var e={empresa:empresa};help.loadview("Admin/grupos",e)})},n.msjerror=function(e){$("#msgerror .iziModal-content h4").html(e),$("#msgerror").iziModal("open")},n.fex=function(e){$(e).addClass("iziModal").iziModal({title:$(e).attr("title")||$(e).data("title")||"Mensaje de QVal",headerColor:$(e).data("header-color")||"#005d8f",width:$(e).data("width")||600,fullscreen:$(e).data("fullscreen")||!1,zindex:$(e).data("zindex")||1031,transitionIn:"comingIn",transitionOut:"comingOut",timeout:$(e).data("timeclose")||!1,timeoutProgressbar:$(e).data("bar")||!1,closeOnEscape:$(e).attr("closekey")||$(e).data("closekey")||!0,closeButton:$(e).attr("closebtn")||$(e).data("closebtn")||!0,overlayClose:$(e).attr("over")||$(e).data("over")||!0,iframeURL:$(e).attr("url")||$(e).data("url")||!1})},n.addcuest=function(e){prin="#msjaltac",$(prin+" .alert").removeClass("alert-danger").addClass("alert-primary");var a=$(prin+" #ncuestionario").val(),o=$(prin+" #emisor").val(),t=$(prin+" #receptor").val(),r=0,s=0;if(""!=a)if("0"!==o)if("0"!==t)if(t!==o){var l=[];$(prin+" .tbpreguntas input[type='checkbox']").each(function(e){$(this).is(":checked")&&l.push($(this).val())}),0!==l.length?($(prin+" #checemail").is(":checked")&&(r=1),$(prin+" #checwats").is(":checked")&&(s=1),$(prin+" .alert").html("<strong>Procesando los datos</strong>"),obt={Nombre:a,wats:s,email:r,emisor:o,receptor:t,empresa:empresa,cuestionario:l,tp:e,num:n.getlocal("kyCues-mod")},n.senddataa(obt,"cuestionarios/addcues",function(e){if(location.reload(),1==e.pass){$(prin).modal("destroy"),n.dellocal("kyCues-mod");var a={empresa:empresa};setTimeout(function(){help.loadview("cuestionarios",a)},1e3)}else $(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong>"+e.Mensaje)})):$(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Selecciona almenos una pregunta.")}else $(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Los Grupos no pueden ser iguales");else $(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Selecciona un Grupo Receptor");else $(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Selecciona un Grupo Emisor");else $(prin+" .alert").addClass("alert-danger").removeClass("alert-primary").html("<strong>Error! </strong> Escribe un nombre para el cuestionario")},n.crp=function(e){switch(e){case"SI/NO":$("#msjaltap .continp").html('<select name="" class="form-control" id="rp"><option value="SI">SI</option><option value="NO">NO</option></select>');break;case"SI/NO/NA":$("#msjaltap .continp").html('<select name="" class="form-control" id="rp"><option value="SI">SI</option><option value="NO">NO</option><option value="NA">NA</option></select>');break;case"DIAS":case"HORAS":case"NUMERO":case"MESES":$("#msjaltap .continp").html('<input type="number" value="0"  class="form-control" />');break;case"AB":$("#msjaltap .continp").html("")}},n.functC=function(){$(".accion-grupoC .dropdown-item").on({click:function(){var t=$(this).attr("lla"),e=$(this).attr("id");n.addlocal("kyCues-mod",e),obj={num:e,tip:t},n.senddata(obj,"cuestionarios/OprCues",function(e){var a=e.Mensaje[0];if("asigpr"==t){var o=a.Cuestionario.split(",");$("#msjlistpregp .table tbody input[type='checkbox']").each(function(e){for(preg in o)$(this).val()===o[preg]&&$(this).prop("checked",!0)}),$("#msjlistpregp").Modal("toggle")}else{$("#msjaltac #ncuestionario").val(a.Nombre),$("#msjaltac #emisor").val(a.PerfilCalifica+"-"+a.TPEmisor),$("#msjaltac #receptor").val(a.PerfilCalificado+"-"+a.TPReceptor),1==a.Wats&&$("#msjaltac #checwats").prop("checked",!0),1==a.Email&&$("#msjaltac #checemail").prop("checked",!0);o=a.Cuestionario.split(",");$(".tbpreguntas table tbody input[type='checkbox']").each(function(e){for(preg in o)$(this).val()===o[preg]&&$(this).prop("checked",!0)}),n.addlocal("kyCues-mod",a.IDCuestionario),$("#msjaltac #btn-cues").attr("onclick","help.addcuest('m')"),$("#msjaltac").Modal("toggle")}})}})},n.optionusr=function(a,t){var e={};switch(a){case"add":e.data=n.validardor("#form-usuario","#form-usuario .alert"),0!=e.data&&(e.tip="adduser",e.empresa=empresa,e.Grupo=$("#form-usuario select[lln='Grupo']").val());break;case"get-tel":e.tipo="I",e.usuario=t,e.tip="telphones";break;case"add-tel":e.tip="add-tel",e.tipo="I",e.data=n.validardor("#add-tel","#add-tel .alert"),e.DQTipo=$("#add-tel #DQTipo").val(),e.usuario=t;break;case"dat-tel":e.tip="dat-tel",e.num=$("#add-tel #telefonoss").val(),e.tipo="I";break;case"update-tel":e.tip="update-tel",e.num=n.getlocal("numtel"),e.DQTipo=$("#add-tel #DQTipo").val(),e.data=n.validardor("#add-tel","#add-tel .alert"),e.usuario=t;break;case"del-tel":e.tip="del-tel",e.num=$("#add-tel #telefonoss").val(),e.usuario=t;break;case"update":if(e.data=n.validardor("#add-usuario","#add-usuario .alert"),0==e.data)return;e.tip="update",e.usuario=t,e.Grupo=$("#form-usuario select[lln='Grupo']").val();break;case"Del":e.tip="Del",e.usuario=t;break;case"gen-qr":return cg="https://chart.googleapis.com/chart?cht=qr&chs=400x400&choe=ISO-8859-1&chl="+t,$("#qr-funct img").attr("src",cg),void $("#qr-funct").modal("toggle")}n.senddata(e,"Usuarios/optionuser",function(e){if("add"===a)$("#add-usuario").modal("toggle"),setTimeout(function(){n.loadusuarios()},1e3);else if("get-tel"===a){var o="";for(tel in e.telepones)o+='<option value="'+e.telepones[tel].IDTelefono+'">'+e.telepones[tel].Telefono+"("+e.telepones[tel].DQTipo+")</option>";$("#add-tel #btnadd-grupo").attr("onclick","help.optionusr('add-tel','"+t+"')"),$("#add-tel #acc-tel a[lln='del-tel'").attr("onclick","help.optionusr('del-tel','"+t+"')"),$("#add-tel #telefonoss").html(o),$("#add-tel").modal("toggle")}else if("add-tel"===a){o="";for(tel in e.telepones)o+='<option value="'+e.telepones[tel].IDTelefono+'">'+e.telepones[tel].Telefono+"("+e.telepones[tel].DQTipo+")</option>";$("#add-tel input[lln='Telefono']").val(""),$("#add-tel .alert").html("Datos Agregados"),$("#add-tel #telefonoss").html(o)}else if("dat-tel"===a)$.each(e.Mensaje,function(e,a){$("#add-tel input[lln='Telefono']").val(a.Telefono),$("#add-tel #DQTipo").val(a.DQTipo),n.addlocal("numtel",a.IDTelefono),$("#add-tel #collapseExample").collapse("show"),$("#add-tel #btnadd-grupo").attr("onclick","help.optionusr('update-tel','"+a.IDUsuario+"')")});else if("update-tel"===a){o="";$.each(e.telepones,function(e,a){o+="<option value='"+a.IDTelefono+"'>"+a.Telefono+"("+a.DQTipo+")</option>"}),n.dellocal("numtel"),$("#add-tel #telefonoss").html(o),$("#add-tel .alert").html("Datos Actualizados"),$("#add-tel input[lln='Telefono']").val(""),$("#add-tel #btnadd-grupo").attr("onclick","help.optionusr('add-tel','"+e.telepones[e.telepones.length-1].IDUsuario+"')"),$("#add-tel #collapseExample").collapse("hide")}else if("del-tel"===a){o="";$.each(e.telepones,function(e,a){o+="<option value='"+a.IDTelefono+"'>"+a.Telefono+"("+a.DQTipo+")</option>"}),$("#add-tel #telefonoss").html(o),$("#add-tel .alert").html("Datos Actualizados")}else"update"===a?$("#add-usuario").modal("toggle"):$("#msj-conf").modal("toggle"),setTimeout(function(){n.loadusuarios()},1e3)})},n.datsempresa=function(){var e=help.getcokie("datusuario");"1"===JSON.parse(e.Mensaje.funciones)[1]?($(".item-menu").removeClass("active"),$("#mun-config.item-menu").addClass("active"),empresa=e.Mensaje.IDEmpresa,usuario=e.Mensaje.IDUsuario,console.log(empresa+"--------")):help.msjerror("No tiene permisos para esta accion, contacte al administrador.")},n.loadusuarios=function(){var e=JSON.parse(help.getcokie("datusuario")),a=JSON.parse(e.Mensaje[0].funciones);if(console.log(a[2]),"1"===a[2]){$(".active .sub-menu").hide("slow"),$(".item-menu").removeClass("active"),$("#mun-us.item-menu").addClass("active"),$("#mun-us.item-menu").find(".sub-menu").fadeIn(1e3);var o={empresa:empresa};n.loadview("usuarios",o)}else help.msjerror("No tiene permisos para esta accion, contacte al administrador.")},n.loadclientes=function(){var e=JSON.parse(help.getcokie("datusuario"));if("1"===JSON.parse(e.Mensaje[0].funciones)[3]){$(".active .sub-menu").hide("slow"),$(".item-menu").removeClass("active"),$("#mun-clie.item-menu").addClass("active"),$("#mun-clie.item-menu").find(".sub-menu").fadeIn(1e3);var a={empresa:empresa};n.loadview("clientes",a)}else help.msjerror("No tiene permisos para esta accion, contacte al administrador.")},n.loadresultados=function(){var e=JSON.parse(help.getcokie("datusuario"));if("1"===JSON.parse(e.Mensaje[0].funciones)[6]){$(".active .sub-menu").hide("slow"),$(".item-menu").removeClass("active"),$("#mun-res.item-menu").addClass("active"),$("#mun-res.item-menu").find(".sub-menu").fadeIn(1e3);var a={empresa:empresa};n.loadview("Resultados",a)}else help.msjerror("No tiene permisos para esta accion, contacte al administrador.")}}var empresa="",help=new helper;""===empresa&&0!=help.getcokie("tip")&&(console.log("-----------------"+help.getcokie("tip")),dat=JSON.parse(help.getcokie("tip")),empresa=dat.Mensaje.IDEmpresa,usuario=dat.Mensaje.IDUsuario),$(document).ready(function(e){e(".izimodal").each(function(e,a){help.fex(a)})}),$(document).on("click",".p-grup",function(){var e=JSON.parse(help.getcokie("datusuario"));if("1"===JSON.parse(e.Mensaje[0].funciones)[1]){$(".active .sub-menu").hide("slow"),$(".item-menu").removeClass("active"),$(this).addClass("active"),$(this).find(".sub-menu").fadeIn(1e3);var a={empresa:empresa};help.loadview("Admin/grupos",a)}else help.msjerror("No tiene permisos para esta accion, contacte al administrador.")}),$(document).on("click","#add-grupo #btnadd-grupo",function(){var e={},o=$("#add-grupo #nombre").val(),t=$("#add-grupo #frmtipo input:radio[name=tipo]:checked").val();""==$("#add-grupo #nombre").val()||5<$("#add-grupo #nombre").val().lenght?$("#add-grupo #alertadd").html("<strong>Error! </strong> Elige un nombre para el grupo").addClass("alert-danger").removeClass("alert-primary"):(e={Nombre:o,Tipo:t,Empresa:empresa},console.log(e),location.reload(),help.senddataa(e,"admin/AddGrupo",function(e){if(1==e.pass){$("#add-grupo").modal("hide");var a={Nombre:o,Tipo:t,Empresa:empresa};help.loadview("admin/AddGrupo",a)}else $("#add-grupo #alertadd").html("<strong>Error! </strong> "+e.Mensaje).addClass("alert-danger").removeClass("alert-primary")}))}),$(document).on("click","#add-grupo #btnmod-grupo",function(){var e=$("#add-grupo #nombre").val(),a=$("#add-grupo #frmtipo input:radio[name=tipo]:checked").val();""==$("#add-grupo #nombre").val()||5<$("#add-grupo #nombre").val().lenght?$("#add-grupo #alertadd").html("<strong>Error! </strong> Elige un nombre para el grupo").addClass("alert-danger").removeClass("alert-primary"):(obt={Nombre:e,Tipo:a,num:sessionStorage.getItem("numgrup")},location.reload(),help.senddataa(obt,"Admin/ModGrupo",function(e){if(console.log(e),location.reload(),1==e.pass){$("#add-grupo").modal("hide"),$("#add-grupo .modal-footer #btnmod-grupo").attr("id","btnadd-grupo"),$("#add-grupo #nombre").val("");var a={empresa:empresa};help.loadview("Admin/grupos",a)}else $("#add-grupo #alertadd").html("<strong>Error! </strong> "+e.Mensaje).addClass("alert-danger").removeClass("alert-primary")}))}),$(document).on("click",".accion-grupoI .dropdown-item",function(){if("as"==$(this).attr("lla")){var e={Empresa:empresa};help.senddataa(e,"cuestionarios/getcuestion",function(e){0==e.Cuestionario&&$("#sncuest").iziModal("open")})}else"mod"==$(this).attr("lla")?(e={num:$(this).attr("id")},help.senddataa(e,"Admin/datgrupos",function(e){sessionStorage.setItem("numgrup",e.Perfildatos[0].IDGrupo),$("#add-grupo input[type='radio']").removeAttr("checked"),$("#add-grupo #nombre").val(e.Perfildatos[0].Nombre),$("#add-grupo #frmtipo input[id='"+e.Perfildatos[0].Tipo+"']").attr("checked","checked"),$("#add-grupo .modal-footer #btnadd-grupo").attr("id","btnmod-grupo"),$("#add-grupo").modal("show")})):"del"==$(this).attr("lla")&&($("#borrargrupo").iziModal("open"),$("#borrargrupo .btn-danger").attr("id",$(this).attr("id")))}),$(document).on("click",".p-cues",function(){var e=JSON.parse(help.getcokie("datusuario"));if("1"===JSON.parse(e.Mensaje[0].funciones)[5]){$(".active .sub-menu").hide("slow"),$(".item-menu").removeClass("active"),$(this).addClass("active"),$(this).find(".sub-menu").fadeIn(1e3);var a={empresa:empresa};help.loadview("cuestionarios",a)}else help.msjerror("No tiene permisos para esta accion, contacte al administrador.")}),$(document).on("click",".p-express",function(){$(".active .sub-menu").hide("slow"),$(".item-menu").removeClass("active"),$(this).addClass("active"),$(this).find(".sub-menu").fadeIn(1e3);var e={empresa:empresa};help.loadview("express",e)}),$(document).on("click","#savepreg",function(){$("#msjaltap .alert").html("Procesando los datos").addClass("alert-primary").removeClass("alert-danger");var e=$("#msjaltap #pregunta").val(),a=$("#msjaltap #formpr").val(),o=($("#msjaltap #rp").val(),$("#msjaltap #frecuencia").val()),t=$("#msjaltap #puntaje").val();""===e?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una pregunta.").addClass("alert-danger").removeClass("alert-primary"):""===a||"0"===a?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa la forma de esta pregunta.").addClass("alert-danger").removeClass("alert-primary"):""===o||"0"===o?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una frecuencia con lo que aparecera ésta pregunta.").addClass("alert-danger").removeClass("alert-primary"):""===t?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa puntaje para una calificación de esta pregunta.").addClass("alert-danger").removeClass("alert-primary"):(obj={pregunta:e,forma:a,frecuencia:o,puntos:t,respuesta:"",empresa:empresa},location.reload(),help.senddataa(obj,"cuestionarios/addPreg",function(e){1==e.pass?($("#msjaltap").modal("toggle"),setTimeout(function(){var e={empresa:empresa};help.loadview("preguntas",e)},500)):$("#msjaltap .alert").html("<strong>Error!</strong> "+e.Mensaje)}))}),$(document).on("click","#modifpreg",function(){$("#msjaltap .alert").html("Procesando los datos").addClass("alert-primary").removeClass("alert-danger");var e=$("#msjaltap #pregunta").val(),a=$("#msjaltap #formpr").val(),o=($("#msjaltap #rp").val(),$("#msjaltap #frecuencia").val()),t=$("#msjaltap #puntaje").val();""===e?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una pregunta.").addClass("alert-danger").removeClass("alert-primary"):""===a||"0"===a?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa la forma de esta pregunta.").addClass("alert-danger").removeClass("alert-primary"):""===o||"0"===o?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa una frecuencia con lo que aparecera ésta pregunta.").addClass("alert-danger").removeClass("alert-primary"):""===t?$("#msjaltap .alert").html("<strong>Error!</strong> Ingresa puntaje para una calificación de esta pregunta.").addClass("alert-danger").removeClass("alert-primary"):(obj={tip:"modDat",pregunta:e,forma:a,frecuencia:o,puntos:t,respuesta:"",num:help.addlocal("kyprd-mod")},location.reload(),help.senddataa(obj,"cuestionarios/oppreg",function(e){1==e.pass?($("#msjaltap").modal("toggle"),setTimeout(function(){var e={empresa:empresa};help.loadview("preguntas",e)},500)):$("#msjaltap .alert").html("<strong>Error!</strong> "+e.Mensaje)}))}),$(document).on("click",".accion-grupoP .dropdown-item",function(){var t,e={num:$(this).attr("id"),tip:t=$(this).attr("lla")};help.senddataa(e,"cuestionarios/oppreg",function(e){if("mod"==t){var a=e.datos[0];$("#msjaltap #pregunta").val(a.Pregunta),$("#msjaltap #formpr").val(a.Forma),help.crp(a.Forma),$("#msjaltap #rp").val(a.Respuesta),$("#msjaltap #frecuencia").val(a.Frecuencia),$("#msjaltap #puntaje").val(a.Peso),$("#msjaltap #puntaje").val(a.Peso),$("#msjaltap #savepreg").attr("id","modifpreg"),$("#msjaltap").modal("show"),help.addlocal("kyprd-mod",a.IDPregunta)}else{var o={empresa:empresa};help.loadview("preguntas",o)}})}),$(document).on("click","#msjlistpregp #gent-preg",function(){var a;$("#msjlistpregp table input").each(function(e){$(this).is(":checked")&&(a=$(this).val())});var e={num:a,tip:"dat"};location.reload(),help.senddataa(e,"cuestionarios/oppregqval",function(e){$("#msjaltap #pregunta").val(e.datos[0].Pregunta),$("#msjaltap #formpr").val(e.datos[0].Forma),help.crp(e.datos[0].Forma),$("#msjaltap #puntaje").val(e.datos[0].Puntos),$("#msjlistpregp").modal("hide")})}),$(document).on("click","#add-cuesM",function(){var a=[];$("#mslistpr table input[type='checkbox']").each(function(e){$(this).is(":checked")&&a.push($(this).val())});var e={num:help.getlocal("kyCues-mod"),tip:"ModCues",cues:a};help.senddataa(e,"cuestionarios/OprCues",function(e){$("#mslistpr").modal("close"),setTimeout(function(){var e={empresa:empresa};help.loadview("cuestionarios",e)},500)})}),$(document).on("click","li[lla='add-funU']",function(){console.log(),$("#add-funct #btnadd-accus").attr("data-us",$(this).attr("llc")),$("#add-funct").modal("toggle")}),$(document).on("click","li[lla='del-funU']",function(){$("#msj-conf #btn-primary").attr("onclick","help.optionusr('Del',"+$(this).attr("llc")+")"),$("#msj-conf").modal("toggle")}),$(document).on("click","li[lla='mod-funU']",function(){var a=$(this).attr("llc");obt={num:$(this).attr("llc"),tip:"Dat-us"},console.log(JSON.stringify(obt)+"----------- SI ESTA EL OBJETO "),help.senddataa(obt,"Usuarios/optionuser",function(e){console.log(JSON.stringify(e)+"ESTA ES LA RESPUESTA QUE MANDA DE LA CONSULTA"),$("#add-usuario input[lln='Nombre']").val(e.datosU.Nombre),$("#add-usuario input[lln='Apellidos']").val(e.datosU.Apellidos),$("#add-usuario input[lln='Usuario']").val(e.datosU.Usuario),$("#add-usuario input[lln='Puesto']").val(e.datosU.Puesto),$("#add-usuario input[lln='Email']").val(e.datosU.Correo),$("#add-usuario select[lln='Grupo']").val(e.datosU.IDConfig),$("#add-usuario #btnadd-grupo").attr("onclick","help.optionusr('update','"+a+"')"),$("#add-usuario").modal("toggle")})}),$(document).on("click","#carga .pagination  .page-item a",function(){var e=$(this).attr("href");return $("#carga").load(e),!1}),$(document).on("click","#exporjsongrup",function(){var e={num:empresa};help.senddataa(e,"admin/JSon_export",function(e){return $("#exporjson .modal-body .card-body").html(JSON.stringify(e)),$("#exporjson").modal("show"),!1})}),$(document).on("click","#exporjsonus",function(){var e={num:empresa};help.senddataa(e,"Usuarios/JSon_export",function(e){return $("#exporjson .modal-body .card-body").html(JSON.stringify(e)),$("#exporjson").modal("show"),!1})}),$(document).on("click","#btnaddexpress",function(){var e={};e.data=help.validardor("#form-expres","#form-expres .alert"),e.empresa=empresa,0!=e.data&&help.senddata(e,"clientes/cargaexpress",function(e){cg="https://chart.googleapis.com/chart?cht=qr&chs=400x400&choe=ISO-8859-1&chl='"+e.usuario+"'",$("#qr-express .modal-body img").attr("src",cg),$("#qr-express").modal("show")})}),$(document).on("hide.bs.modal","#qr-express",function(){$("#carga input").val(""),$("#qr-express .alert").html("Llena los datos correctamente.")}),$(document).on("click","#btn-login",function(){$(".alert").addClass("alert-info").removeClass("alert-danger").html("Procesando Datos"),tip={user:$("#user").val(),pas:$("#pas").val()},console.log(JSON.stringify(tip)+"---------"),help.senddataa(tip,"admin/login",function(e){console.log(e),0===e.pass?($(".alert").html(e.Mensaje),$(".alert").removeClass("alert-info").addClass("alert-danger")):($('input[id="recordarusuario"]').prop("checked")?help.addcokie("datacceso",tip):0!=help.getcokie("datacceso")&&help.removecokie("datacceso"),help.addcokie("datusuario",e),empresa=e.Mensaje.Impresa,location.href="admin")})}),$(document).on("click","#btn-rec",function(){$(".alert2").addClass("alert-info").removeClass("alert-danger").html("Espere un momento porfavor..."),tp={correo:$("#correo").val()},console.log(JSON.stringify(tp)+"---------"),help.senddataa(tp,"admin/rec",function(e){console.log(e),0===e.pass&&($(".alert2").html(e.Mensaje),$(".alert2").removeClass("alert-info").addClass("alert-danger"))})}),$(document).on("change","#altausexpfiel",function(){var e=$("#altaexpres form#frmchang"),a=new FormData(e[0]);a.append("empresa",empresa),help.sendfile("/Downdload/upusuarios",a,"#altaexpres .alert",function(e){1==e.pass?($("#altaexpres").modal("toggle"),help.loadusuarios()):$("#altaexpres .alert").html("<strong>!Error¡ </strong> "+e.mensaje).addClass("alert-danger").removeClass("alert-primary")})}),$(document).on("click","#uplogoemp",function(){var e=$("form#form-logo"),a=new FormData(e[0]);a.append("empresa",empresa),help.sendfile("/Downdload/uplogo",a,"#modalexpresclie .alert",function(e){10==e.pass?help.datsempresa():($(".alert").html("<strong>!Listo¡</strong> ...").addClass("alert-danger").removeClass("alert-danger"),location.reload())})}),$(document).on("change","#altaexpresclie",function(){var e=$("#modalexpresclie form#frmchang"),a=new FormData(e[0]);a.append("empresa",empresa),help.sendfile("/Downdload/upclientes",a,"#modalexpresclie .alert",function(e){1==e.pass?($("#modalexpresclie").modal("hide"),help.loadclientes()):$("#modalexpresclie .alert").html("<strong>!Error¡ </strong> "+e.mensaje).addClass("alert-danger").removeClass("alert-primary")})}),$(document).on("click","#add-funct #btnadd-accus",function(){var a=[];$("#add-funct tbody input[type='checkbox']").each(function(e){$(this).prop("checked")?a.push("1"):a.push("0")});var e={num:$(this).attr("data-us"),funciones:a};help.senddata(e,"Usuarios/addaccions",function(e){$("#add-funct").modal("hide"),help.loadusuarios()})}),$(document).on("click","#btn-updategen",function(){$("form#dat-general .alert").addClass("no-visible").html("");var e=$("form#dat-general"),a=new FormData(e[0]);a.append("empresa",empresa),help.sendfile("/admin/updateGen",a,"",function(e){console.log(e),location.reload(),0===e.pass?$("form#dat-general .alert").removeClass("no-visible").html("<strong>Error! </strong> "+e.mensaje):help.datsempresa()})}),$(document).on("click","#btn-datcont",function(){$("form#dat-contac .alert").addClass("no-visible").html("");var e=$("form#frm-contac"),a=new FormData(e[0]);a.append("empresa",empresa),help.sendfile("/admin/updatecont",a,"",function(e){console.log(e),location.reload(),0===e.pass?$("form#btn-datcont .alert").removeClass("no-visible").html("<strong>Error! </strong> "+e.mensaje):help.datsempresa()})}),$(document).on("click","#btn-upus",function(){$("form#frm-datus .alert").addClass("no-visible").html("");var e=$("form#frm-datus"),a=new FormData(e[0]);a.append("usuario",usuario),help.sendfile("/admin/updateus",a,"",function(e){console.log(e),location.reload(),0===e.pass?$("form#frm-datus .alert").removeClass("no-visible").html("<strong>Error! </strong> "+e.mensaje).addClass("alert-danger").removeClass("alert-primary"):help.datsempresa()})}),$(document).on("click","#btn-upclave",function(){$("form#frm-upclave .alert").addClass("no-visible").html("");var e=$("form#frm-upclave"),a=new FormData(e[0]);a.append("usuario",usuario),help.sendfile("/admin/updatecl",a,"",function(e){console.log(e),location.reload(),0===e.pass?$("form#frm-upclave .alert").removeClass("no-visible").html("<strong>Error! </strong> "+e.mensaje).addClass("alert-danger").removeClass("alert-primary"):help.datsempresa()})}),$(function(){help.datsempresa()});