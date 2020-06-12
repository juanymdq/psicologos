<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>   
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/tarjetas.css"/> 
    <style>  
   
        .container {
            margin-top: 20px;
            padding-bottom: 500px;
            border: 1px solid;
            justify-content: center;
            align-items: center;
            align-self: center;
        }

        .card-text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        
        #avatar {
            margin-top: 20px;
            width: 160px;
            height: 140px;
            
        }
        .tarjeta {
            
        }
        
    </style>
</head>
<body>
<section>
<div class="container">
  <?php
    if(isset($profesionales)){
        $cont = count($profesionales);
        $filas = ceil($cont/3);
        echo $filas;
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
                                <h4><?php echo $item['nombre']?></h4>
                                <span></span>
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