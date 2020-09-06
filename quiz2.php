<?php 

    // nomor 1
    function hitung($string_data){
        $len = strlen($string_data);
        $first=""; // angka pertama
        $operator=""; // operator yang digunakan (* : + - %)
        $second=""; // angka kedua
        $flag=0; // untuk menandai apakah character dimasukan ke $first atau $second
        // character sebelum $operator sudah pasti $first, character sesudah $operator sudah pasti $second
        for($i =0; $i<$len; $i++){ // mengecek setiap character dalam $string_data
            if($string_data[$i]=='*' || $string_data[$i]==':' || $string_data[$i]=='+' || $string_data[$i]=='-' ||
            $string_data[$i]=='%'){ // mengecek apakah character tersebut adalah operator
                $flag=1; // saat bertemu operator, $flag berubah menjadi 1 sehingga character selanjutnya akan masuk di variable $second
                $operator = $string_data[$i];
            }
            else if($flag==0){ 
                $first .= $string_data[$i]; // memasukan character ke $first
            }else if($flag==1){
                $second .= $string_data[$i]; // memasukan character ke $second
            }
        }
        $first = (int)$first; // mengconvert variable $first menjadi integer agar bisa dihitung
        $second = (int)$second; // mengconvert variable $second menjadi integer agar bisa dihitung

        if($operator == '*'){
            return $first * $second;
        } 
        else if($operator == ':'){
            return $first / $second;
        }
        else if($operator == '+'){
            return $first + $second;
        }
        else if($operator == '-'){
            return $first - $second;
        }
        else if($operator == '%'){
            return $first % $second;
        }

    }
    echo hitung("102*2")."\n";
    echo hitung("2+3")."\n";
    echo hitung("100:25")."\n";
    echo hitung("10%2")."\n";
    echo hitung("99-2")."\n";



    // nomor 2
    function perolehan_medali($data){
        if(count($data)==0){
            return "no data";
        }
        $arr = []; // menyimpan output dari function perolehan_medali()
        $len = count($data);
        $history = []; // menyimpan data negara-negara yang sudah pernah diinput
        $flag=0;
        $pos=0;
        for($i = 0; $i<$len; $i++){
            for($j=0;$j<count($history);$j++){ // mengecek apakah negara tersebut sudah pernah diinput atau belum
                if($data[$i][0]==$history[$j]){
                    $flag=1; // $flag = 1 berarti negara sudah pernah diinput
                    $pos = $j; // $pos digunakan untuk menentukan index dari negara tersebut di dalam $arr[]
                    break;
                }
            }
            if($flag==1){ // jika negara sudah pernah diinput, tambahkan saja medali sesuai dengan jenisnya
                if($data[$i][1]=="emas"){
                    $arr[$pos]["emas"]+=1;
                }
                if($data[$i][1]=="perak"){

                    $arr[$pos]["perak"]+=1;
                }
                if($data[$i][1]=="perunggu"){

                    $arr[$pos]["perunggu"]+=1;
                }
            }
            else{ // jika negara belum pernah diinput, buat array associative baru didalam variable $arr sesuai dengan jenis medali yang didapat
                $history[]=$data[$i][0];
                if($data[$i][1]=="emas"){
                    $arr[] = [
                        "negara"=>$data[$i][0],
                        "emas"=> 1,
                        "perak"=>0,
                        "perunggu"=>0
                    ];
                }
                if($data[$i][1]=="perak"){
                    $arr[] = [
                        "negara"=>$data[$i][0],
                        "emas"=> 0,
                        "perak"=>1,
                        "perunggu"=>0
                    ];
                }
                if($data[$i][1]=="perunggu"){
                    $arr[] = [
                        "negara"=>$data[$i][0],
                        "emas"=> 0,
                        "perak"=>0,
                        "perunggu"=>1
                    ];
                }
            }
        }
        return $arr;
    }
    $data = array(
        array('Indonesia','emas'),
        array('India','perak'),
        array('Korea Selatan','emas'),
        array('India','perak'),
        array('India','emas'),
        array('Indonesia','perak'),
        array('Indonesia','emas'),
        
    );
    print_r(perolehan_medali($data));
    print_r(perolehan_medali([]));
?>