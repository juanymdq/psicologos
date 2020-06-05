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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">	
	<link rel="stylesheet" href="<?=base_url()?>application/assets/css/inicio.css" >
	<!-- STYLES -->

	 <!-- Smartsupp Live Chat script -->
     <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '690ca01e61359e25dbcc5289c6eac0d9ec2fe5da';
        window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>

</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<div class="menu-uno">
		<div class="menu-uno-usuario">				
			<?php if($this->session->userdata('nombre') != null) {
				if($this->session->userdata('perfil')=='administrador'){?>
					<a href="<?=base_url('administrador')?>"> <?="Usuario: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
				<?php }else if($this->session->userdata('perfil')=='profesional'){?>
						<a href="<?=base_url('profesional/home_profesionales')?>"> <?="Usuario: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
				<?php }else if($this->session->userdata('perfil')=='cliente'){?>				
						<a href="<?=base_url('cliente/home_clientes')?>"> <?="Usuario: ". $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></a>
				<?php }
				}?>
		</div>
		<div class="menu-uno-btn">
			<a href="<?=base_url('turnos')?>" class="btn-turnos">TURNOS</a>
			<a href="<?=base_url('profesional/acceso_profesionales')?>" class="menu-uno-link">INICIAR SESIÓN PSICOLOGOS</a>			
		</div>
	</div>
	<div class="menu-dos">
		<div class="menu-dos-img"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></div>
		<div class="menu-dos-text">Terapia Virtual</div>
		<div class="menu-dos-link">
			<a href="<?=base_url('Welcome')?>" class="menu-dos-link-text">INICIO</a>			
			<a href="" class="menu-dos-link-text">NOSOTROS</a>
			<a href="<?=base_url('webcam')?>" class="">WEBCAM</a>
			<a href="" class="menu-dos-link-text">INICIO</a>			
		</div>
	</div>

	<div class="div_message">		
		<?php 
			if($this->session->userdata('aviso_message')) {
				echo "<p class='aviso_message'>".$this->session->userdata('aviso_message')."</p>";
			}			
		?>
	</div>
	<div class="wallpaper">
		<img src="<?=base_url()?>application/assets/img/psico1.jpg" class="imgHeader"/>
	</div>

</header>

<!-- CONTENT -->

<section>

	<h1>Red de psicologos online</h1>

	<p>Funcionamos como una red de derivaciones de pacientes según zona y necesidad específica. Cada profesional tiene su consultorio privado donde atiende según su encuadre específico.</p>

</section>



<section>

	<div class="container">

		<h3>Preguntas Frecuentes</h3>
		<span>Acá te dejo las respuestas para las consultas más habituales.</span>
		<div class="row">
			<div class="col-md-6">					
			
				<h4><strong class="color">a.</strong> ¿Tiene algún costo?</h4>
				<p>Sí, <strong>las sesiones de psicoterapia no son gratuitas</strong>.
					Si tenés alguna consulta y no puedes pagar por el servicio de psicoterapia,
					podés dejar tu pregunta en el <a href="/hacer-una-pregunta/">consultorio</a>.
					Los profesionales que colaboran en el sitio podrán darte una breve orientación
					para alguna consulta puntual que tengas.<p>
			
			
				<h4><strong class="color">b.</strong> ¿Recibe obras sociales?</h4>
				<p>Recibo aquellas obras sociales que están en <strong>convenio con el Colegio de Psicólogos
				de Mendoza</strong> y algunas otras. Podés consultarme por <a href="http://wa.me/5492612518027">Whatsapp</a> si recibo la tuya.</p>
			
			
				<h4><strong class="color">c.</strong> ¿Cuánto dura?</h4>
				<p>Las sesiones duran alrededor de <strong>40 minutos</strong>.
				La duración total del proceso psicoterapéutico es variable y
				se ajusta a tus necesidades individuales. De cualquier manera,
				el objetivo es que las terapias sean breves.</p>
			
			</div>
			<div class="col-md-6">
			
				<h4><strong class="color">d.</strong> ¿Qué tipo de terapia realiza?</h4>
				<p>El enfoque desde el que trabajo es la <strong>terapia cognitiva conductual</strong>.
				Son terapias basadas en evidencia, con lo que se busca que el proceso
				esté ajustado a criterios fundamentados en la ciencia.<p>
		
				<h4><strong class="color">e.</strong> ¿Cuál es la modalidad?</h4>
				<p>Si estás en Mendoza, la opción primera es la <strong>terapia presencial</strong> en
				mi consultorio en la 5ta Sección. De otra forma, puede realizarse
				<strong>terapia online</strong>, ya sea que prefieras esa modalidad, o residas en otra
				localidad.</p>
			
				
				<h4><strong class="color">f.</strong> ¿Cuáles son los medios de pago?</h4>
				<p>Los pagos se pueden realizar por <strong>transferencia bancaria</strong> o también por
				la plataforma <strong>Mercado Pago</strong>. Si no resides en Argentina, <strong>Paypal</strong> es la
				alternativa disponible.
				</p><
			
			</div>
		</div>
	</div>

</section>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	
	<div class="copyrights">
		<div class="container_footer">
			<div class="col_full">
				<div class="copyrights-menu">
					<a href="/">Inicio</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/acerca-de/">Acerca de</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?=base_url('Welcome/privacidad')?>">Política de Privacidad</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/ayuda/">Ayuda</a>
				</div>
				<div class="copyrights-text">
				Copyrights &copy; <?= date('Y') ?> Todos los derechos reservados.
				</div>
			</div>
		</div>
	</div>

</footer>

<!-- SCRIPTS -->



<!-- -->

</body>
</html>
