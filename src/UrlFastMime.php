<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 2019-10-15
 * Time: 11:19
 */

namespace ThikDev\FastMime;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;

class UrlFastMime {

    protected $client;
    protected $fileSignal;
    
    protected $stream_mime_types = [
        'application/octet-stream',
        'application/binary',
        'application/download',
        'text/html',
        'text/plain',
    ];
    
    /**
     * UrlFastMime constructor.
     *
     * @param $client
     */
    public function __construct( $client = null ) {
        $this->client = $client ?? new Client([
                'timeout'        => 30,// 30 seconds
                'headers'        => [
                    'accept-encoding' => 'gzip, deflate, br',
                    'accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
                    'user-agent'      => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36',
                ],
                'decode_content' => true,
                'stream' => true,
                'verify' => false,
                'cookies' => true,
            ]);
    }
    
    public function getMime($url, $method = 'get'){
        $uri = new Uri($url);
        try{
            $response = $this->client->request( $method, $uri, [
                'on_headers' => function ( ResponseInterface $response ) {
                    if ( $response->getStatusCode() < 300
                    ) {
                       $this->checkHeader($response);
                    }
                }
            ]);
    
            $dispositions = $response->getHeader( 'Content-Disposition');
            if(!empty( $dispositions )){
                if(strpos( $dispositions[0], "filename=")
                && (
                    strpos( $dispositions[0], ".pdf\"")
                    || strpos( $dispositions[0], ".pdf\'")
                    || strpos( $dispositions[0], ".pdf") == strlen( $dispositions[0]) - 3
                   )
                ){
                    return "application/pdf";
                }
            }
            
            $body = $response->getBody();
            $begin_bytes = ltrim($body->read( 568 ));
            $detected = FileSignalDetector::detectByContent( $begin_bytes );
            if($detected){
                
                try{
                    if($detected[1] == 'zip'){
                        $body->seek( $body->getSize() - 568 );
                        $end_bytes = $body->read( 568 );
                        $_detected = FileSignalDetector::detectByContent( $begin_bytes, $end_bytes );
                        if($_detected){
                            return $_detected[2];
                        }
                    }
                }catch (\Exception $ex){
                
                }finally{
                    $body->close();
                }
                
                return $detected[2];
            }else{
                $body->close();
            }
        }catch (RequestException $ex){
            if($ex->getPrevious() instanceof FoundMimeTypeException){
                return $ex->getPrevious()->getMessage();
            }else{
                throw $ex;
            }
        }
    }
    
    protected function checkHeader(ResponseInterface $response){
        
        $content_type = $response->getHeaderLine( 'Content-Type' );
        if(strpos( $content_type, ";")){
            list($content_type) = explode( ";", $content_type);
        }

        $content_type = trim( $content_type, "\"'");

        if ( ! in_array( $content_type, $this->stream_mime_types ) && preg_match( "/^[a-zA-Z0-9]/", $content_type) ) {
            throw new FoundMimeTypeException( $content_type );
        }
    
    }
    
}