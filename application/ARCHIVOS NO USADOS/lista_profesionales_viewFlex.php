<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>   
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/tarjetas.css"/> 
    <style>  
   /*º
        .container {
            margin-top: 20px;
            padding-bottom: 500px;            
            justify-content: center;
            align-items: center;
            align-self: center;
        }

      */  
        
    </style>
</head>
<body>
<section>
<div class="container">
  <?php
    if(isset($profesionales)){
        $cont = count($profesionales);//6
        $filas = ceil($cont / 3);//(6/3=2)
        print_r($filas);
        $tot=0;
        while($tot < $cont){
            $j=0;
            while($j < 3){?>        
                <div class="col">                
                    <?php 
                    $i=0;
                    while($i < $filas && $tot < $cont){                                        
                        $item = array_values($profesionales)[$tot]?>    
                        <div class="card-container">               
                            <div class="card">                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?=$item["foto"]?>" id="avatar"/>
                                    </div>                                    
                                    <div class="col-md-8">                                        
                                        <div class="txt-nombre">Lic.&nbsp;<?=$item['apellido'].", ".$item['nombre']?></div>
                                        <div class="ver-horarios"><a href="<?=base_url('turnos/ver_horarios?id='.$item['id'])?>">Ver horarios</a></div>                                                                                
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    <?php
                    $tot++; 
                    $i++; 
                    }?>
                </div>
                
            <?php
                $j++;
            }
        }   
        }?>
           
</div>

    

</section>

</body>
</html>