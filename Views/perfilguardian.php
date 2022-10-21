<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<main class="content">

    <div id="mainContainer" class="" style="width:75em;">

                
        <section style="width:52em;padding:3em 0 4em 0">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Perfil </span></strong></summary>
                        <div class="sectioncontent" style="height:26em">

                            <div class="profilecard" id="perfilguardian">

                                <div class="mainprofileinfo">
                                    <img class="imgperfilgrande" src="<?php echo IMG_PATH;?>avatardefault.png">
                                    <span><?php echo ucwords($usuario->getNombre());?></span>
                                    <span><?php echo ucwords($usuario->getApellido());?></span>
                                    <span>Reputacion</span>
                                    <span>0/10</span>
                                </div>

                                <div class="secondaryprofileinfo">

                                    <div class="infopersonal">
                                        <span> Información Personal</span>
                                        <div class="separador"></div>
                                        <span>Edad: <strong><?php echo $usuario->getEdad();?></strong></span>
                                        <span>Email: <strong><?php echo $usuario->getMail();?></strong></span>
                                    </div>

                                    <div class="infoguardian">

                                        <span>Información Guardián</span>
                                        <div class="separador"></div>
                                        <span>Tipo de Perro: <strong><?php echo implode(", ",$usuario->getTamano());?></strong></span>
                                        <span>Remuneracion por Día: <strong><?php echo $usuario->getRemuneracion();?></strong></span>
                                        <span>Disponibilidad: <?php if($usuario->getDisponibilidad()=='Plena'||$usuario->getDisponibilidad()=='Fines De Semana'){
                                            ?> <strong><?php echo $usuario->getDisponibilidad()?></strong>  <?php
                                        }else{ ?> </span>
                                           
                                        <?php include (VIEWS_PATH."disponibilidad.php") ?>
                                    
                                        <div class="container" style="width:26%;">
                                                <input style="cursor: pointer; border: 1px solid rgba(64, 114, 8, 0.1); position:relative; bottom:2.3em; right:3em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechas" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                            <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <button id="solicitar" class="formButton" style="padding:0.3em 1em; position:relative; left:16.2em; bottom:5.2em;">Solicitar Reserva</button>

                        </div>
        </section>

        <section id="reserva" style="width:43em;padding-bottom:4em;">
            <div class="sectioncontent" style="">

                <summary style="margin:2em 0;"><span ><strong> Datos de la Reserva </span></strong></summary>
                    
                    

                        <form id="solicitarreserva" action="<?php echo FRONT_ROOT."Reserva/Add"?>" method="post" class="activo" style="">
                            <fieldset class="formHeader">
                                <h3><p>Solicitud Reserva</p></h3>
                            </fieldset>

                                <fieldset style="height:9.7em;">
                                <label for="fechaInicio" style="margin-top:2em; margin-bottom:0em;"><span><strong>Fecha de Inicio:</strong></span></label>
                                <div class="container" style="width:28%;">
                                                <input style="cursor: pointer; border: 1px solid rgba(64, 114, 8, 0.1); position:relative; bottom:2.6em; right:2.5em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechaInicio" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                            <label for="fechaFinal" style="margin-top:-1em;position:relative;bottom:1.7em;left:0.4em;"><span><strong>Fecha Final:</strong></span></label>
                                <div class="container" style="width:28%;">
                                                <input style="cursor: pointer; border: 1px solid rgba(64, 114, 8, 0.1); position:relative; bottom:5em; right:2.4em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechaFinal" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                </fieldset>

                                    <fieldset>
                                    <label for="fechaFinal"><span><strong>Mascota a cuidar</strong></span></label>
                                    <br>

                                    <select name="mascota" id="" style="outline:none;transform:scale(1.1); margin: 1em 0 2em 4em;" >
                                    <option value="">--Seleccione su Mascota-- </option>

                                    
                                    <?php foreach($mascotas as $mascota) { 
                                        
                                        if ($mascota->getIdDueno()==$_SESSION["id"]){
                                            
                                            if(in_array($mascota->getTamano(), $usuario->getTamano())){
                                        ?>

                                    <option value=""><?php echo ucwords($mascota->getNombre()); ?></option>
                                    
                                
                                    <?php }}} ?>
                                    </select>



                                    <?php // var_dump($mascotas);?>

                                    <input type="text" style="display:none" value="<?php echo $usuario->getId(); ?>" name="idGuardian">
                                    <input type="text" style="display:none" value="<?php echo $_SESSION["id"]; ?>" name="idDueno">
                                        
                                    </fieldset>
                                
                                        <div id="botoneraForm">
                                            <button  class="formButton" type="submit"  style="margin-left:1.3em;">Solicitar</button>
                                            <button class="formButton" type="reset" >Limpiar Campos</button></div>    

                        </form>

                    
        </section>


                                       

             <a href="<?php echo FRONT_ROOT."Home"?>">
              <button id="goback" type="button" style="position:relative; right:1.5em; margin-top:-1.5em;"><span id="backward">Volver al Home</span></button></a>
 

</main>

<style>

    label{margin-top:1em;margin-left:1em;}

</style>

<?php require 'datepickervista.php' ?>


<script>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                    //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
let solicitarReserva = document.getElementById('solicitar');
let formularioReserva = document.getElementById('reserva');

solicitarReserva.addEventListener('click',function(){

    $("#reserva").css( "display", "block" );

})


</script>


<?php require 'footer.php' ?>