<?php
    namespace Controllers;

    use Models\Dueno as Dueno;
    use Models\Guardian as Guardian;
    use Models\Reserva as Reserva;
    use Models\Mascota as Mascota;
    use Controllers\GuardianController as GuardianController;

    class ReservaController
    {
        
        public function Add($fechaInicio, $fechaFinal, $mascota, $idGuardian, $idDueno)
        {
            $inicio = date_create_from_format($fechaInicio, "d-m");
            $fin = date_create_from_format($fechaFinal, "d-m");

            var_dump($fechaInicio, $fechaFinal);
            var_dump($inicio, $fin);

            if (date_diff($fechaInicio, $fechaFinal) >= 0) {
                $reserva = new Reserva();
                $reserva->setIdDueno($idDueno);
                $reserva->setIdGuardian($idGuardian);
                $reserva->setFechaInicio($fechaInicio);
                $reserva->setFechaFinal($fechaFinal);
                $reserva->setNombreMascota($mascota);

                echo "<script>alert('Reserva creada con éxito')</script>";

                header('location:../index.php');
            } else {
                
                $controller = new GuardianController();

                echo "<script>alert('La fecha de final debe ser posterior a la fecha inicial')</script>";
                $controller->ShowProfile($idGuardian);
            }
        }
    }
?>