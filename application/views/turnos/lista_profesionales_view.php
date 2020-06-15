<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>   
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/tarjetas.css"/> 
    
  
      <style>
     
</style>
   
</head>
<body>
<section>
<h1>Listado de nuestro Staff de Profesionales</h1>

<p>Seleccione la opción <em>Ver horarios</em> para sacar un turno con el mismo.</p>

<div class="grid-container">
    <?php 
        if(isset($profesionales)){
            foreach($profesionales as $item){        
    ?>
        <div>        
            <div class="car-container">
                <div class="txt-nombre">Lic.&nbsp;<?=$item['apellido'].", ".$item['nombre']?></div>
                <div><img src="<?=$item["foto"]?>" id="avatar"/></div>
                <div class="ver-horarios"><a href="<?=base_url('cliente/ver_horarios_de_profesional')?>?id=<?=$item['id']?>">Ver horarios</a></div>                
            </div>    
        </div>
  <?php }}?>
</div>
            
    

</section>

</body>
</html>