<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/PromocionPostulacionDAO.php');

class ControladorPostulacion{

		private $postulados;




		public function darListaPostulacionesxEst($cod)
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->ListaDePostulaciones($cod);
		}

		public function agregarPostulacion($Postulacion)
		{
            $this->postulados = new PromocionPostulacionDAO();
            //return 
		}

		public function darListaPostulacionesTotal()
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->totalPostulaciones();
		}

		public function HistorialPost()
		{
			$this->postulados = new PromocionPostulacionDAO();
			return $this->postulados->HistorialPostulaciones();
		}
	
	}


    ?>