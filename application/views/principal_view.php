<!DOCTYPE html>
<html>
    <head>
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
    </head>
<body>
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
				</p>
			
			</div>
		</div>
	</div>

</section>
</body>
</html>