<?php

namespace App;

class GoogleTranslator{

    private $defaultLangauge;
    private $apiKey;

    /**
     * Constructore for assigning default values in class
     * 
     * @return response array
     */
    public function __construct($defaultLangauge,$apiKey)
    {
       $this->defaultLangauge   =  $defaultLangauge;  
       $this->apiKey            =  $apiKey;  
    }
    
    /**
     * Google API integration
     * Receiving TEXT and sourceLanguage
     */
    public function translate($text,$to){

        $url = 'https://www.googleapis.com/language/translate/v2?key=' . $this->apiKey . '&q=' . rawurlencode($text) . '&source='.$this->defaultLangauge.'&target='.$to;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($curl),1); 
        $curlcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
            
            //if failed 
            if($curlcode != "200"){
                $failedResponse = [
                    'success' => false,
                    'error'   => isset($response['error']['message']) ? $response['error']['message'] :'something went wrong',
                ];
                return response()->json($failedResponse,$curlcode);
            }

        // IF Translation server does not provide value THEN deafult text
        $transalation = isset($response['data']['translations'][0]['translatedText']) ? $response['data']['translations'][0]['translatedText'] :'something went wrong while translating ...';
        
        $successResponse = [ 
            'success' => True,
            'translation'   => $transalation ? $transalation :'something went wrong',
        ];

        //replying to controller
        return response()->json($successResponse,$curlcode,[],JSON_UNESCAPED_UNICODE);    
    }
}

