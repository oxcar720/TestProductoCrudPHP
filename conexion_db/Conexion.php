<?php
    class Conexion{
        //Desarrollo
        private $server;
        private $user;
        private $password;
        private $base;

        public function __construct(){
            $config = require 'config.php';
            $this->server = $config['db']['server'];
            $this->user = $config['db']['user'];
            $this->password = $config['db']['password'];
            $this->base = $config['db']['database'];
        }

        function conexion_database(){
            $conexion=mysqli_connect($this->server,$this->user,$this->password,$this->base);
            return $conexion;
        }

        function cerrar_conexion($conexion){
            mysqli_close($conexion);
        }

        function ejecutarConsulta($sql){
            try{
                $conexion = $this->conexion_database();
            }catch(Exception $e){
                return null;
            }
            $res = mysqli_query($conexion,$sql);
            $this->cerrar_conexion($conexion);
            return $res;
        }

        function ejecutarSql($sql){
            try{
                $conexion = $this->conexion_database();
            }catch(Exception $e){
                print_r($e);
                return false;
            }
            $bool = mysqli_query($conexion,$sql)?true:false;
            $this->cerrar_conexion($conexion);
            return $bool;
        }
    }
?>