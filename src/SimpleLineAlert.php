<?php
namespace noxil\simplelinealert;

class SimpleLineAlert {

    public function sendmessage($message,$apikey = ""){
        if(empty($apikey)){
            $apikey = config('simplelinealert.api_key');
        }
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, config('simplelinealert.url_line_notify')); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$message); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$apikey.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        //Result error 
        if(curl_error($chOne)) 
        { 
            echo 'error:' . curl_error($chOne); 
        } 
        else { 
            $result_ = json_decode($result, true); 
            echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        } 
        curl_close( $chOne );

    }
    
    public function sendmessagewithimage($message,$apikey = "",$imagepath){
        if(empty($apikey)){
            $apikey = config('simplelinealert.api_key');
        }
        $imageFile = new CURLFILE($imagepath); // Local Image file Path
        $data = array (
        'message' => $message,
        'imageFile' => $imageFile
        );
        $chOne = curl_init();
        curl_setopt( $chOne, CURLOPT_URL, config('simplelinealert.url_line_notify')); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $chOne, CURLOPT_POST, 1);
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$apikey, );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $chOne );
        //Result error 
        if(curl_error($chOne)) 
        { 
            echo 'error:' . curl_error($chOne); 
        } 
        else { 
            $result_ = json_decode($result, true); 
            echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        } 
        curl_close( $chOne );
    }
}
