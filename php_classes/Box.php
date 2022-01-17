<?php
    require_once('Doctrine/OrientDB/Graph/GraphInterface.php');
    require_once('Doctrine/OrientDB/Graph/Graph.php');
    require_once('Doctrine/OrientDB/Graph/VertexInterface.php');
    require_once('Doctrine/OrientDB/Graph/Vertex.php');
    require_once('Doctrine/OrientDB/Graph/Algorithm/AlgorithmInterface.php');
    require_once('Doctrine/OrientDB/Graph/Algorithm/Dijkstra.php');

    use Doctrine\OrientDB\Graph\Graph;
    use Doctrine\OrientDB\Graph\Vertex;
    use Doctrine\OrientDB\Graph\Algorithm\Dijkstra;

    require_once('Utility.php');
    class Box extends Utility{
        private $hubs;
        private $size;

        public function __construct($departure,$arrive,$main, $size = 5) {
            $this->size = $size;
            $this->hubs = $main->computeDistance($departure,$arrive);
            parent::__construct("box");
        }

        public function getHubArrive() {
            return $this->hubs[count($this->hubs)-1];
        }
        
        public function getHubDeparture() {
            return $this->hubs[0];
        }
        public function getHubs(){
            return $this->hubs;
        }
        public function setHubs($hubs){
            $this->hubs = $hubs;
        }

        public function getSize() {
            return $this->size;
        }
        
        public function setSize($size) {
             $this->size = $size;
        }
    }
?>