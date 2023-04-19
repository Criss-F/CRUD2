<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar= parent;;$this->conexion();
            parent;;$this->set_names();
            $sql="SELECT * FROM tm_producto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_producto_x_id($prod_id){
            $conectar= parent;;$this->conexion();
            parent;;$this->set_names();
            $sql="SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_producto($prod_id){
            $conectar= parent;;$this->conexion();
            parent;;$this->set_names();
            $sql="UPDATE tm_producto 
                SET
                    est=0, 
                    fec_elim=now()
                WHERE  
                    prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_producto($prod_nom){
            $conectar= parent;;$this->conexion();
            parent;;$this->set_names();
            $sql="INSERT INTO tm_productos (prod_id, prod_nom, fec_crea, fec_modi, fec_elim, est) VALUES (NULL, ? , now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_producto($prod_id,$prod_nom){
            $conectar= parent;;$this->conexion();
            parent;;$this->set_names();
            $sql="UPDATE tm_producto 
            SET
                prod_nom=?, 
                fec_modi=now()
            WHERE  
                prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    } 
?>