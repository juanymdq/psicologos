<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
	<!-- STYLES -->

</head>
<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <div class="menu">
            <ul>
                <li class="menu-item hidden"><a href="<?=base_url('profesional')?>">INICIAR SESIÓN PSICÓLOGOS</a></li>
            </ul>
            <ul>
                <li class="logo">
                    <div class="divLogo">
                        <img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" />
                    </div>
                    <div class="textLogo">
                        <p>Espacio de terapia online</p>
                    </div>
                </li>
                
                <li class="menu-toggle">
                    <button onclick="toggleMenu();">&#9776;</button>
                </li>
                <li class="menu-item hidden"><a href="<?=base_url('Welcome')?>">INICIO</a></li>	
                <li class="menu-item hidden"><a href="<?=base_url()?>login">ACCESO CLIENTES</a>
                </li>			
                <li class="menu-item hidden"><a
                        href="">NOSOTROS</a>
                </li>				
            </ul>
        </div>
        <div class="div_message">		
            <?php 
                if($this->session->userdata('aviso_message')) {
                    echo "<p class='aviso_message'>".$this->session->userdata('aviso_message')."</p>";
                }			
            ?>
        </div>
        <div class="heroe">
            <img src="<?=base_url()?>application/assets/img/privacidad.jpg" class="imgPrivacidad" />
        </div>

    </header>

    <!-- CONTENT -->

    <section>

    <section id="content">

<div class="content-wrap">

  <div class="container clearfix">

    <!-- Post Content
    ============================================= -->
    <div class="postcontent nobottommargin clearfix">

      <!-- Posts
      ============================================= -->
      <div id="posts" class="post-grid grid-container post-masonry grid-3 clearfix">



            <p><strong>Psicositio.</strong>, CUIT 20-32457071-4,
              con domicilio en calle Arlt s/n, El Challao, Las Heras,
              Mendoza, Argentina, asegura la completa protección de los\
               datos personales que los usuarios ingresen a fin de utilizar
               los servicios que se brindan a través de este sitio web,
               por medio de las siguiente políticas de privacidad
               enmarcadas en la Ley N° 25.326 de Protección de Datos
               Personales:</p>

            <h2>1. CONSENTIMIENTO</h2>

            <p>Al ingresar los datos en el “perfil”, el usuario-anunciante
              manifiesta su expreso consentimiento para ponerlos a
              disposición del usuario-visitante . Es decir que consiente
              la incorporación de sus datos en la base de datos
              que&nbsp;<strong>Psicositio&nbsp;</strong>&nbsp;pone
              a disposición de las visitantes.</p>

           <h2>2. NATURALEZA DE LOS DATOS PERSONALES SOLICITADOS</h2>

<p><strong>Psicositio</strong>&nbsp;hace saber que no solicita datos sensibles, es decir: datos personales que revelen origen racial y étnico, opiniones políticas, convicciones religiosas, filosóficas o morales, afiliación sindical o información referente a la salud o la vida sexual.</p>

           <h2>3. FINALIDAD DE LOS DATOS</h2>

<p><strong>Psicositio</strong>&nbsp; advierte que toda la información proporcionada será utilizada con el fin de generar un espacio de contacto entre usuarios-anunciantes y usuarios-visitantes en búsqueda de un profesional de la salud mental. Además podrá reunir y analizar la información provista por los anunciantes como un todo colectivo a efectos de realizar estadísticas.</p>

<p>Los datos serán usados: para generar un espacio de contacto entre usuarios-anunciantes y usuarios-visitantes, y con fines estadísticos.</p>

           <h2>4. DEL MODO EN QUE SE OBTIENEN LOS DATOS</h2>

<p>El usuario completa libre y voluntariamente su perfil, comprometiéndose a suministrar información cierta, adecuada y pertinente con los fines del sitio. Cabe resaltar que el usuario no está obligado a llenar la totalidad de los campos solicitados.</p>

<p><strong>Psicositio&nbsp;</strong>&nbsp;hace saber que mientras más completo es el perfil del usuario-anunciante, mayor posibilidades de establecer contacto generará en el usuario-visitante.</p>

           <h2>5. DEBER DE ACTUALIZACIÓN Y RECTIFICACIÓN DE LA INFORMACIÓN. DERECHO DE SUPRESIÓN</h2>

<p>Es obligación del usuario actualizar su información con el objeto de que la información contenida en nuestra base de datos sea fidedigna, para ello deberá rectificar la información aportada en su perfil cada vez que lo estime conveniente. En caso de solicitar su supresión podrá hacerlo accediendo a “Mi perfil”, o enviando un correo electrónico a info@Psicositio&nbsp;.con "Solicitud de baja" como asunto y sus datos de usuario y derección de correo electrónico como contenido del mensaje.</p>

           <h2>6. TIEMPO DE CONSERVACIÓN DE LOS DATOS</h2>

<p>Siempre y cuando el usuario no solicite su expresa supresión de nuestra base de datos, su información será conservada en aquella durante el tiempo que perdure el giro comercial de <strong>Psicositio</strong></p>

           <h2>8. SEGURIDAD DE LOS DATOS</h2>

<p><strong>Psicositio</strong>&nbsp; es responsable de la Base de Datos donde se almacenan la información aportada por el usuario. Con el objeto de evitar la pérdida, mal uso, alteración, acceso no autorizado y robo de la información <strong>Psicositio</strong>&nbsp;adopta los niveles de seguridad y de protección de Datos Personales legalmente requeridos. Sin embargo, es necesario considerar que los niveles de seguridad en Internet no son perfectos, por lo que <strong>Psicositio</strong>&nbsp; no puede garantizar la total y absoluta inviolabilidad de su Base de Datos, ni el perfecto funcionamiento de sus mecanismos de protección y resguardo.</p>

      </div><!-- #posts end -->

    </div><!-- .postcontent end -->

  </div>

</div>

</section><!-- #content end -->



    </section>

    <footer>
	
	<div class="copyrights">
		<div class="container_footer">
			<div class="col_full">
				<div class="copyrights-menu">
					<a href="/">Inicio</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/acerca-de/">Acerca de</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/politica-de-privacidad/">Política de Privacidad</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/ayuda/">Ayuda</a>
				</div>
				<div class="copyrights-text">
				Copyrights &copy; <?= date('Y') ?> Todos los derechos reservados.
				</div>
			</div>
		</div>
	</div>

</footer>

<!-- SCRIPTS -->

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->

</body>
</html>
