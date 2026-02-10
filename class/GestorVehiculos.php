<?php

    class GestorVehiculos{

        protected $catalago;

        public function __construct()
        {
            $this->catalago=[];
        }

        public function anyadir($exposicion){
            $this->catalago[]=$exposicion;
        }

        public function listar(){
            return $this->catalago;
        }

        public function buscar($matricula){
            foreach ($this->catalago as $exposicion) {
                if($exposicion->getMatricula()==$matricula){
                    return $exposicion;
                }
            }
        }

        public function actualizarCoche($matricula,$bastidor, $precio){

            foreach ($this->catalago as $i=>$exposicion){
                if ($exposicion->getMatricula()==$matricula) {
                        $this->catalago[$i]->setBastidor($bastidor);
                        $this->catalago[$i]->setPrecio($precio);
                }
            }
        }
        public function actualizarMoto($matricula,$marca, $cilindrada){

            foreach ($this->catalago as $i=>$exposicion){
                if ($exposicion->getMatricula()==$matricula) {
                        $this->catalago[$i]->setMarca($marca);
                        $this->catalago[$i]->setCilindrada($cilindrada);
                }
            }
        }

        public function eliminar($matricula){
            foreach ($this->catalago as  $i=>$exposicion) {
               if($exposicion->getMatricula()==$matricula){
                unset($this->catalago[$i]);
                $this->catalago=array_values($this->catalago);
               }
            }
            
        }
            
        

    }




?>