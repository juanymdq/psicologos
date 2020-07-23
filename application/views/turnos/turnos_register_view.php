<!DOCTYPE html>
<html>
<head>
    <title>Turnos</title>
    
</head>
<style>
.container{
    margin-bottom: 10px;
}
h1 {
    margin-top: 1px;
    text-align: center;
    color: #4E94AE;
}
h2 {    
    text-align: center;    
}
p {
    text-align: center;
    color: #4E94AE;
}
.row {    
    width: 100%;
    margin-left: auto;
    margin-right: auto;   
    border-radius: 10px;
}
.form-group {
    text-align: left;
}

.flex-container {
  display: flex;
  flex-direction: row;
  background-color: #4E94AE;
  border-radius: 10px;
  border: 1px solid;
  
}

.flex-container > div {
  background-color: #f1f1f1;
  width: 400px;
  margin: 10px;
  text-align: center;  
  font-size: 15px;
  margin-left: auto;
  margin-right: auto;  
  border-radius: 10px;
}

@media (max-width:768px) {
    .form-group {
        text-align: center;
    }
    .fields {        
        text-align: center;
    }
}

.titulo-prof {
  font-size: 25px;
}
#avatar {
  width: 100px;
  height: 80px;
  border-radius: 50%;
}
.datos-prof {
  margin-top: 20px;
  text-align: left;
  font-size: 16px;
  font-family:'Arial';
  font-weight: lighter;
  
  
}
.cambiar-horario{  
  text-align: center;
}
.fields {
    width: 100%;
    text-align: left;
}
.fields > .row{    
    align-items: center;
    margin-bottom: 15px;
}
.content-pagos {
    width: 100%;
    height: 30%;
    border: 1px solid;
    border-radius: 10px;
    /*background: #4E94AE;*/
    box-shadow: 5px 10px #888888;
}
.pagos {
    display: flex;
    flex-direction: row;
        
}
.pagos > div {    
    border: 1px solid;
    width: 400px;
    margin: 10px;
    text-align: center;  
    font-size: 15px;
    margin-left: auto;
    margin-right: auto;  
    border-radius: 10px;
}
.icono-mpago {
    width: 80px;
    height: 80px;
}
</style>
</head>
<body>
    <section>
    <div class="container">
        <h1>Confirmación de turno</h1>
        <p><a href="<?=base_url('turnos')?>" class="btn btn-default">Volver y cancelar</a></p>

        <p>Verifique que los datos sean correctos. Si desea puede cambiar el horario del turno
        hacendo clic en <em>Cambiar turno</em>.<br>
        Una vez verificado, debera proceder al pago de la sesión</p>

        <div class="flex-container">
            <div>
                <div class="row">                        
                    <form action="" method="post">
                                                       
                            <legend class="titulo-prof" style="color: black">Datos del Cliente</legend>
                            <hr>
                            <div class="form-group"> 
                                <div class="row">                       
                                    <span class="col-md-1 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                                    <div class="col-md-11">                            
                                    <label><?=$this->session->userdata('nombre')?></label>                                
                                    </div>                            
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                    <label><?=$this->session->userdata('apellido')?></label>    
                                    </div>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                    <label><?=$this->session->userdata('email')?></label>    
                                    </div>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                    <label><?=$this->session->userdata('telefono')?></label>    
                                    </div>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">  
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-edit bigicon" style="color: black"></i></span>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="message" name="comentarios" placeholder="Podes añadir cualquier comentario de interes para el especialista (opcional)." rows="5" cols="40" onkeyup="agrega()"></textarea>
                                    </div>
                                </div>
                            </div>                             
                    </form>
                </div><!--class row-->
            </div>
            <!--DATOS DEL PROFESIONAL-->
            <?php   
                if(isset($horario)){
                $item = array_values($horario)[0];
                $id = $item['idh'];
            ?>
            <div>   
                <input type="hidden" value="<?=$item['idh']?>" name="id_evento">                
                <div class="row">                   
                    <legend class="titulo-prof" style="color: black">Detalle de la visita</legend>
                    <hr />
                    <div class="fields">
                    <hr />
                        <div class="row">                       
                            <span class="col-md-4 text-center"><img src="<?=$item["pr_foto"]?>" id="avatar"/></span>
                            <div class="col-md-8">
                                <label>Lic. <?=$item["pr_nombre"]?>&nbsp;<?=$item["pr_apellido"]?></label>                               
                            </div>                            
                        </div>
                        <hr />
                    </div>                    
                    <div class="fields">
                        <div class="row">         
                            <span class="col-md-1 text-center"><i class="fa fa-calendar bigicon" style="color: black"></i></span>                                
                            <div class="col-md-11">                            
                                <label><?=$fecha_string?>hs.</label>
                            </div>                            
                        </div>
                        <hr />
                    </div>                    
                    <div class="fields">
                        <div class="row">         
                            <span class="col-md-1 text-center"><i class="fa fa-dollar-sign bigicon" style="color: black"></i></span>                                
                            <div class="col-md-11">                            
                                <label>Costo de la consulta $800</label>
                            </div>                            
                        </div>
                        <hr />
                    </div>                    
                    <div class="fields">
                        <div class="row">    
                        <!-- $route['profesional/calendario_de_horarios/(:any)'] = 'calendar/find_all_eventos/$1'; -->
                
                            <span class="col-md-8"><a href="<?=base_url('profesional/calendario_de_horarios/'.$item['id']).'/0'?>">  Cambiar horario</a></span>
                        </div>              
                    </div>   
                </div>                                 
            </div>
        </div><!--END FLEX-->
        
        <div class="content-pagos">
            <h2>Seleccionar medio de pago</h2>
            <div class="pagos"> 

                <?php
                include('config.php');                
                include('procesar-pago-ml.php');
                ?>
                <div>
                    <!-- FORMULARIO DE PGO DE MERCADOPAGO-->
                    <div class="row">                          
                        <label for="btn-pago"></label> <img src="<?=base_url()?>application/assets/img/mercadopago.png" class="icono-mpago"> 
                        <form action="<?=base_url('turnos/redirectmp')?>" method="POST">
                            <input type="hidden" value="<?=$id?>" name="id_horario">
                            <input type="hidden" id="comentariosmp" name="comentariosmp">                            
                            <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id; ?>"
                            >
                            </script>
                        </form>
                    </div>
                </div>
                <div>
                    <!-- FORMULARIO DE PGO DE PAYPAL-->
                    <div class="container">    
                    <form action="<?=base_url('turnos/redirectpaypal')?>" method="POST" id="formpp">
                        <input type="hidden" id="comentariospp" name="comentariospp"> 
                        <input type="hidden" value="<?=$id?>" name="id_horario">
                        <input type="hidden" name="paymentID" id="paymentID">
                        <input type="hidden" name="payerID" id="payerID">
                        <input type="hidden"name="paymentToken" id="paymentToken">
                        <?php                        
                            $productName = "Producto demostración";
                            $currency = "USD";
                            $productPrice = 10;
                            $productId = 1;
                            $orderNumber = 1;
                            $idh = $id ?>
                            
                            <?php include 'paypalCheckout.php';
                        ?>
                    </form>               
                    </div>
                </div> 
            </div>
            <?php }?>
        </div>     
    </div> <!--END CONTAINER-->
    </section>
    <script>
        function agrega() {
            texto = document.getElementById('message').value;
            document.getElementById('comentariosmp').value = texto;           
            document.getElementById('comentariospp').value = texto; 
        }  
    </script>
</body>
</html>