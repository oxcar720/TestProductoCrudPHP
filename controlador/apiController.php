<?php 
class ApiController {
    public function meowfacts() {
        $urlApi = "https://meowfacts.herokuapp.com/?lang=esp";
        return $this->ejecutarApi($urlApi)['data'][0];
    }

    public function datoInutilDelDia(){
        $urlApi = "https://uselessfacts.jsph.pl/api/v2/facts/today";
        return $this->ejecutarApi($urlApi)['text'];
    }

    public static function ejecutarApi($uri){
        $ch = curl_init($uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna la respuesta como una cadena
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json' // Aceptar respuesta en formato JSON
        ]);
        $response = curl_exec($ch);
        if ($response === false) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $data = json_decode($response, true);
            return $data;
        }
        curl_close($ch);
    }
}
?>
