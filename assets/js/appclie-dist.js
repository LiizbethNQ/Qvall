function Clientes(){this.estados=function(e,n){tip={pais:e};var t="<option value=''>Selecciona</option>";help.senddata(tip,"clientes/estados",function(e){return console.log(e),$.each(e.pais,function(e,n){t+="<option value='"+n.id+"'>"+n.estadonombre+"</option>"}),$(n).html(t),!1})}}var cliente=new Clientes;$(document).on("change","#Add-cliente #pais",function(){cliente.estados($(this).val(),"#Add-cliente #estados")}),$(document).on("click","div.btn-primary #btnadd-clie",function(e){var n=$("#formclie"),t=n.attr("url"),l=$(".alert.alert-info");help.sendform(t,n,function(e){0===e.pass?l.html(e.mensaje):$("#Add-cliente").modal("hide"),console.log(e)})}),$(document).on("click","div.btn-primary #btnmod-clie",function(){var e=$("#formclie"),n=e.attr("url"),t=$(".alert.alert-info");help.sendform(n,e,function(e){0===e.pass?t.html(e.mensaje):$("#Add-cliente").modal("hide"),console.log(e)})}),$(document).on("click","button[llc='buscar']",function(){var e=$("input[name='palabra']").val();help.loadclientes(e)}),$(document).on("click",".accion-funCl .dropdown-item",function(){var e={};switch(console.log("si entra"),$(this).attr("lla")){case"mod-funC":e.numc=$(this).attr("llc"),help.senddataa(e,"Clientesp/readClie",function(e){console.log(e.datos),$.each(e.datos,function(e,n){$("#Add-cliente Form").attr("url","clientes/ModCliente"),$("#Add-cliente Form").append("<input name='cliente' type='hidden' value="+n.IDCliente+" />"),$("#Add-cliente input[name='Email']").val(n.Correo),$("#Add-cliente input[name='RZ']").val(n.Nombre),$("#Add-cliente input[name='NC']").val(n.NombreComercial),$("#Add-cliente input[name='Direccion']").val(n.Direccion),$("#Add-cliente select[name='Estado']").val(n.EEstado),$("#Add-cliente select[name='Grupo']").val(n.IDConfig),$("#Add-cliente input[name='Municipio']").val(n.Municipio),$("#Add-cliente input[name='RFC']").val(n.RFC),$("#Add-cliente input[name='Tel']").val(n.Tel),$("#Add-cliente select[name='Pais']").val(n.Pais),$("#Add-cliente input[name='Puesto']").val(n.Puesto),$("#Add-cliente input[name='Apellidos']").val(n.Apellidos),$("#Add-cliente select[name='TPersona']").val(n.TPersona),$("#Add-cliente #btnadd-clie").attr("id","btnmod-clie"),$("#Add-cliente").modal("show")})});break;case"del-funC":e.numc=$(this).attr("llc"),help.senddataa(e,"Clientesp/DelCliente",function(e){toastr.success("Se a eliminado correctamente"),1==e.pass&&help.loadclientes()});break;case"qr-funC":cg="https://chart.googleapis.com/chart?cht=qr&chs=400x400&choe=ISO-8859-1&chl="+$(this).attr("id"),$("#qr-funct img").attr("src",cg),$("#qr-funct").modal("toggle")}}),$(document).on("hide.bs.modal","#Add-cliente",function(e){$("#Add-cliente .modal-body input").val(""),$("#Add-cliente .btn-primary").attr("id","btnadd-clie")}),$(document).on("click","#exporjsonclie",function(){var e={num:empresa};help.senddata(e,"clientes/JSon_export",function(e){return $("#exporjson .modal-body .card-body").html(JSON.stringify(e)),$("#exporjson").modal("show"),!1})}),$("#Add-cliente").on("hidden.bs.modal",function(e){help.loadclientes()});