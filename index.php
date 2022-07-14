<?php 
require 'includes/conexion.php';

$querygetContacts = mysqli_query($conection, "SELECT * FROM `contactos` ");

 ?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Kevin Perea" />


	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />

	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/custom.css" type="text/css" />


	<link rel="stylesheet" href="css/colors.php?color=0F66DD" type="text/css" /> 
	<link rel="stylesheet" href="css/fonts.css" type="text/css" />
	<link rel="stylesheet" href="css/movers.css" type="text/css" />

	<link rel="stylesheet" href="css/components/datepicker.css" type="text/css" />


	<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>

	<!-- Document Title
	============================================= -->
	<title>Contactos - prueba BRM</title>

</head>

<body class="stretched">

	

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">


		<header id="header" class="dark header-size-sm" data-sticky-shrink="false">
			

		
		</header>

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element bg-color" style="height: auto; padding: 60px 0; background: url('images/bg-2.png') no-repeat center center / 100% 100%;">

			<div class="container mt-4" style="z-index: 2">
				<div class="center">
					<h2 class="text-white h2 fw-semibold mb-2">Bievenido a tu agenda de contactos.</h2>
					<p class="text-white-50">Aca puedes ver la lista de tus contactos, eliminar o crear.</p>
				</div>

				<div class="row topmargin justify-content-center">
					<div class="col-lg-12">
						<ul class="nav nav-tabs nav-justified flex-column border-bottom-0 flex-md-row bg-color mt-4" role="tablist">
							<li class="nav-item">
								<a class="nav-link py-3 active" id="contacts-tab" data-bs-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="true">Contactos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-3" id="add-contact-tab" data-bs-toggle="tab" href="#add-contact" role="tab" aria-controls="add-contact" aria-selected="false">Crear Contacto</a>
							</li>
							
						</ul>
						<div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
							<div class="tab-pane fade show active" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
								<p class="mb-4">Aca puedes ver tus contactos y buscarlos por nombre, telefono o correo.</p>
								<div class="form-widget">
									<div class="form-result"></div>
									<!-- Container -->
										<div class="container">

										  <!-- Main Content-->
										  <div class="masthead">
										    
										<input type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar en tabla" title="Empieza a escribir para buscar">
										    
										    <div class="table-responsive">
										      <table class="table" id="tabla" data-sort="table">
										        <thead>
										          <tr>
										            <th>Nombre</th>
										            <th>Telefono</th>
										            <th>F.Nacimiento</th>
										            <th>Direccion</th>
										            <th>Correo</th>
										            <th>edad</th>
										            <th class="text-center">Acción</th>
										          </tr>
										        </thead>
										        <tbody>
										        	<?php while ($datos = mysqli_fetch_array($querygetContacts)) {


										        		$id = $datos['id'];
										        		$nombre = $datos['nombre'];
										        		$telefono = $datos['telefono'];
										        		$nacim = $datos['nacim'];
										        		$direccion = $datos['direccion'];
										        		$correo = $datos['correo'];

	
										        		$fecha_actual = date_create_from_format('Y-m-d', date('Y-m-d'));

										        		$nnacim = date_create_from_format('Y-m-d', $nacim);

										        		$diff = (array) date_diff($fecha_actual, $nnacim);

										        		$diferenciaY = $diff['y'];

									
										        	 ?>
										          <tr>
										            <th><?php echo $nombre ?></th>
										            <td><?php echo $telefono  ?></td>
										            <td><?php echo $nacim  ?></td>
										            <td><?php echo $direccion ?></td>
										            <td><?php echo $correo ?></td>
										            <td><?php echo $diferenciaY ?></td>
										            <td class="text-center"><a href="includes/editProd.php?id=<?php echo $id ?>"><i style="color: orange;" class="icon-edit2 edit"></i></a> - <a href="includes/deleteProd.php?id=<?php echo $id ?>"><i style="color: red;" class="icon-trash"></i></a></td>
										          </tr>
										      <?php } ?>
										        </tbody>
										      </table>
										    </div>
										  </div>
										</div>
										

									

								
								</div>
							</div>
							<div class="tab-pane fade" id="add-contact" role="tabpanel" aria-labelledby="add-contact-tab">
								<p class="mb-4">Acá puedes crear un nuevo contacto para tu agenda</p>
								<div class="form-widget">
									<div class="form-result"></div>
									<form id="formAddContact" class="row office-moving-form position-relative mb-0" action="" method="post" enctype="multipart/form-data">
										<div class="form-process">
											<div class="css3-spinner">
												<div class="css3-spinner-scaler"></div>
											</div>
										</div>

										<div class="col-sm-6 form-group">

											<div class="input-group">
												<span class="input-group-text bg-transparent"><i class="icon-line2-user"></i></span>
												<input type="text" name="nombre" id="office-moving-form-name" class="form-control required" value="" placeholder="Nombre">
											</div>
											
										</div>

										<div class="col-sm-6 form-group">
											<div class="input-group">
												<span class="input-group-text bg-transparent"><i class="icon-line2-call-out"></i></span>
												<input type="text" name="telefono" id="office-moving-form-phone" class="form-control required" value="" placeholder="Numero Telefónico">
											</div>
											
										</div>

										<div class="col-sm-6 form-group">
											<div class="input-group">
												<span class="input-group-text bg-transparent"><i class="icon-line2-map"></i></span>
												<input type="text" name="direccion" id="office-moving-form-location-to" class="form-control required" value="" placeholder="Direccion">
											</div>
											
										</div>

										<div class="col-sm-6 form-group">
											<div class="input-group">
												<span class="input-group-text bg-transparent"><i class="icon-line2-envelope"></i></span>
												<input type="email" name="correo" id="office-moving-form-email" class="form-control required" value="" placeholder="Correo Electronico">
											</div>
										</div>

										<div class="col-sm-6 form-group ">
											<div class="input-group">
												<span class="input-group-text bg-transparent"><i class="icon-line2-calendar"></i></span>
												<input type="date" class="form-control required" name="date" id="office-moving-form-date" value="" placeholder="Your Date">
											</div>
										</div>

										

										<div class="col-12">
											<button id="btnAddContact" type="button" name="office-moving-form-submit" class="btn bg-color text-white fw-medium w-100 py-2 mt-2">Crear</button>
										</div>

									</form>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>

			<div class="svg-separator">
				<div>
					<svg preserveAspectRatio="xMidYMax meet" viewBox="0 0 1600 100" data-height="100">
						<path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M1040,56c0.5,0,1,0,1.6,0c-16.6-8.9-36.4-15.7-66.4-15.7c-56,0-76.8,23.7-106.9,41C881.1,89.3,895.6,96,920,96
						C979.5,96,980,56,1040,56z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M1699.8,96l0,10H1946l-0.3-6.9c0,0,0,0-88,0s-88.6-58.8-176.5-58.8c-51.4,0-73,20.1-99.6,36.8 c14.5,9.6,29.6,18.9,58.4,18.9C1699.8,96,1699.8,96,1699.8,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M1400,96c19.5,0,32.7-4.3,43.7-10c-35.2-17.3-54.1-45.7-115.5-45.7c-32.3,0-52.8,7.9-70.2,17.8 c6.4-1.3,13.6-2.1,22-2.1C1340.1,56,1340.3,96,1400,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M320,56c6.6,0,12.4,0.5,17.7,1.3c-17-9.6-37.3-17-68.5-17c-60.4,0-79.5,27.8-114,45.2 c11.2,6,24.6,10.5,44.8,10.5C260,96,259.9,56,320,56z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M680,96c23.7,0,38.1-6.3,50.5-13.9C699.6,64.8,679,40.3,622.2,40.3c-30,0-49.8,6.8-66.3,15.8 c1.3,0,2.7-0.1,4.1-0.1C619.7,56,620.2,96,680,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.75);" d="M-40,95.6c28.3,0,43.3-8.7,57.4-18C-9.6,60.8-31,40.2-83.2,40.2c-14.3,0-26.3,1.6-36.8,4.2V106h60V96L-40,95.6
						z"></path>
						<path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M504,73.4c-2.6-0.8-5.7-1.4-9.6-1.4c-19.4,0-19.6,13-39,13c-19.4,0-19.5-13-39-13c-14,0-18,6.7-26.3,10.4 C402.4,89.9,416.7,96,440,96C472.5,96,487.5,84.2,504,73.4z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M1205.4,85c-0.2,0-0.4,0-0.6,0c-19.5,0-19.5-13-39-13s-19.4,12.9-39,12.9c0,0-5.9,0-12.3,0.1 c11.4,6.3,24.9,11,45.5,11C1180.6,96,1194.1,91.2,1205.4,85z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M1447.4,83.9c-2.4,0.7-5.2,1.1-8.6,1.1c-19.3,0-19.6-13-39-13s-19.6,13-39,13c-3,0-5.5-0.3-7.7-0.8 c11.6,6.6,25.4,11.8,46.9,11.8C1421.8,96,1435.7,90.7,1447.4,83.9z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M985.8,72c-17.6,0.8-18.3,13-37,13c-19.4,0-19.5-13-39-13c-18.2,0-19.6,11.4-35.5,12.8 c11.4,6.3,25,11.2,45.7,11.2C953.7,96,968.5,83.2,985.8,72z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M743.8,73.5c-10.3,3.4-13.6,11.5-29,11.5c-19.4,0-19.5-13-39-13s-19.5,13-39,13c-0.9,0-1.7,0-2.5-0.1 c11.4,6.3,25,11.1,45.7,11.1C712.4,96,727.3,84.2,743.8,73.5z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M265.5,72.3c-1.5-0.2-3.2-0.3-5.1-0.3c-19.4,0-19.6,13-39,13c-19.4,0-19.6-13-39-13 c-15.9,0-18.9,8.7-30.1,11.9C164.1,90.6,178,96,200,96C233.7,96,248.4,83.4,265.5,72.3z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M1692.3,96V85c0,0,0,0-19.5,0s-19.6-13-39-13s-19.6,13-39,13c-0.1,0-0.2,0-0.4,0c11.4,6.2,24.9,11,45.6,11 C1669.9,96,1684.8,96,1692.3,96z"></path> <path style="opacity: 1;fill: rgba(255,255,255,0.3);;" d="M25.5,72C6,72,6.1,84.9-13.5,84.9L-20,85v8.9C0.7,90.1,12.6,80.6,25.9,72C25.8,72,25.7,72,25.5,72z"></path>
						<path style="fill: rgb(255, 255, 255);" d="M-40,95.6C20.3,95.6,20.1,56,80,56s60,40,120,40s59.9-40,120-40s60.3,40,120,40s60.3-40,120-40s60.2,40,120,40s60.1-40,120-40s60.5,40,120,40s60-40,120-40s60.4,40,120,40s59.9-40,120-40s60.3,40,120,40s60.2-40,120-40s60.2,40,120,40s59.8,0,59.8,0l0.2,143H-60V96L-40,95.6z"></path>
					</svg>
					<div class="bg-white" style="height: 150px"></div>
				</div>
			</div>

		</section>

	



	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>
	<script src="js/custom.js"></script>
	<script type="text/javascript" src="js/sweetalert211.js"></script>


	


	<script>


		
function busqueda() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function busquedaJQsimple() {
  var filtro = $("#buscar").val().toUpperCase();

  $("#tabla tbody tr").each(function() {
    texto = $(this).children("td:eq(0)").text().toUpperCase();
    
    if (texto.indexOf(filtro) < 0) {
      $(this).hide();
    } else{
      $(this).show();
    }
      
    
  });
  
}

function buscar(){
  
  var filtro = $("#buscar").val().toUpperCase();
  
  $("#tabla td").each(function() {
    var textoEnTd = $(this).text().toUpperCase();
    if(textoEnTd.indexOf(filtro)>=0){
      $(this).addClass("existe");
    }else{
      $(this).removeClass("existe");
    }
  })
  
  $("#tabla tbody tr").each(function(){
    if($(this).children(".existe").length>0){
      $(this).show();
    }else{
      $(this).hide();
    }
  })
  
}

function busquedaJQmultiple() {
  var filtro = $("#buscar").val().toUpperCase();

  $("#tabla tbody tr").each(function() {
    
    $(this).children("td").each(function() {
        var texto = $(this).text().toUpperCase();
        
        if (texto.indexOf(filtro) < 0) {
          $(this).addClass("sin");
        }else{
          $(this).removeClass("sin");
        }
    });
    
    // nTds = la cantidad de <td> en el <tr> evaluado
    nTds = $(this).children("td").length
    // nTdsSin = la cantidad de <td> con la clase ".sin" en el <tr> evaluado
    nTdsSin = $(this).children(".sin").length

    if(nTdsSin==nTds){
      //$(this).hide()
      $(this).addClass("noTiene");
    }else{
      //$(this).show()
       $(this).removeClass("noTiene");
    }
    
  });
  
}


     $(document).ready(function(){
      $('#btnAddContact').click(function(){ 

        swal.fire({
          title: "Cambios realizados!",
          text: "Tus cambios se han realizado exitosamente!",
          icon: "success",
          button: "Aceptar",
        });


        

        var f = $(this);
        var formData = new FormData(document.getElementById("formAddContact"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $.ajax({
            url: "includes/insertContact.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        

        setTimeout(function() {
          location.href = location.href
        }, 2000);

        return false;

    });
  });
		
	</script>


</body>
</html>
