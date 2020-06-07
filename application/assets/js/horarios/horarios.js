
//phpFecha = 2020-06-07 18:21:00
//Año - Mes - Dia
function fechas() {
    
    var f  = new Date();
   
    var fc = f.toLocaleDateString("en-US")
    //m-d-Y
    console.log(fc);
    var dia = f.getDay();//0=Domingo
    var mes = f.getMonth(); //0=Enero
    var anio = f.getFullYear();
    var diaHoy = f.getDate();//dia hoy

    //split de fecha php
    /*
    phpf = phpFecha.split(" ");
    phpfch = phpf[0].split("-");
    phpd = phpfch[2];
    phpm = phpfch[1];
    phpa = phpfch[0];
    */
    //------------------------------
    var fechas_x_pagina = 7;
    var paginas = 30/fechas_x_pagina;
    console.log(Math.ceil(paginas));

    fechaInicio = new Date();    
    dmes = diasMes(0,mes,anio)  
    txtm = diasMes(1,mes,anio)  
    dia = [Dom','Lun.','Mar.','Mié.','Jue.','Vie','Sab'];    
    for(var i = diaHoy;i <= dmes;i++){
        var n = new Date(anio+','+txtm+','+i);        
        console.log(dia[n.getDay()]);//dia de la semana
        console.log(i);//dia
        console.log(txtm); //mes      
        
    }
    
}

function diasMes(flag,mes,año) {
    //flag=0: pasar ndias
    //plag=1: pasar textmes
    switch(mes){
        case 0: 
            textmes = 'Ene.';
            ndias= 31;
        break;
        case 1: 
            textmes = 'Feb.';
            var moda = año % 4;
            if(moda==0){
                ndias=29;
            }else{
                ndias= 28;
            }
        break;
        case 2: 
            textmes = 'Mar.';
            ndias= 31;
        break;
        case 3: 
            textmes = 'Abr.';
            ndias= 30;
        break;
        case 4: 
            textmes = 'May.';
            ndias= 31;
        break;
        case 5: 
            textmes = 'Jun.';
            ndias= 30;
        break;
        case 6: 
            textmes = 'Jul.';
            ndias= 31;
        break;
        case 7: 
            textmes = 'Ago.';
            ndias= 31;
        break;
        case 8: 
            textmes = 'Sep.';
            ndias= 30;
        break;
        case 9: 
            textmes = 'Oct.';
            ndias= 31;
        break;
        case 10: 
            textmes = 'Nov.';
            ndias= 30;
        break;
        case 11: 
            textmes = 'Dic.';
            ndias= 31;
        break;
    }
    if(flag==0){
        return ndias;
    }else{
        return textmes
    }
}

/*
function textosSemana(dia,mes,anio) {   
    var n = new Date(anio+','+mes+','+dia);
    var d = n.getDay();
    switch(d){
        case 0:
            textsemana = 'Dom.';
         break;
        case 1:
            textsemana = 'Lun.';
         break;
         case 2:
            textsemana = 'Mar.';
         break;
         case 3:
            textsemana = 'Mié.';
         break;
         case 4:
            textsemana = 'Jue.';
         break;
         case 5:
            textsemana = 'Vie.';
         break;
         case 6:
            textsemana = 'Sáb.';
         break;
        
    }
    return textsemana; 
}*/