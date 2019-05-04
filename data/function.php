<?php
 
class MyFunction{

    /*Value By Array Up One Key*/
    public function UPKey($string){
        return $string+1;
    }

    /*Clean And Conver Function*/
    public function CAC($array, $key=null, $set=null){
        $value = null;
        $position = $set-1;
        switch ($key) {
            case 'VALUE::OUT::ONE':
                # code...
                $value = $array[$position];
                break;
            case 'VALUE::OUT::OTHER':
                # code...
                for ($a=0; $a <= count($array) ; $a++) { 
                    # code...
                    if ($a != $array[$position]) {
                        # code...
                        $value = $array;
                    }
                }
                
                break;
            case 'KEY::OUT::ONE':
                # code...
                $value = $position+1;
                break;
            case 'KEY::OUT::OTHER':
                # code...
                for ($a=0; $a < count($array) ; $a++) { 
                    # code...
                    if ($a != $array[$position]) {
                        # code...
                        $value = array_keys($array);
                    }
                }
                
                break;
            case 'KEY':
                # code...
                $value = array_keys($array);
                break;
            default:
                # code...
                $value = 'Wrong Parameter';
                break;
        }
        return $value;
    }

    public function jumpArray($a, $potongVertikal = null){
        //split array by chunk
        $value = array_chunk($a, $potongVertikal);
        return $value;
    }

    public function BC($x, $cek, $bc=null, $position=null){
        # code ...
        //$bc adalah data array
        //$cek adalah data atribut dari kriteria
        //$x adalah data nilai
        //$cek = 1;
        switch ($cek) {
            case '1':
                # benefit...
                $value = round($x/max($bc)[$position], 4);
                break;

            case '2':
                # cost...
                $value = round(min($bc)[$position]/$x, 4);
                break;
            
            default:
                # code...
                $value = "Wrong Parameter";
                break;
        }
        return $value;
    }

    public function SumRank($arrayC, $arrayValue){
        return $hasil;
    }

    function SQLINJECT($data){
        $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
        return $filter_sql;
    }


}
?>