<?php

namespace Divulgueregional\mercadopagopointsmart;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use JetBrains\PhpStorm\NoReturn;

class MercadoPagoPointSmart
{
    protected $header;
    protected $headers;
    private $client;

    function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.mercadopago.com',
        ]);
    }

    ######################################################
    ############## TOKEN #################################
    ######################################################
    public function gerarToken($body)
    {
        $options['body'] = json_encode($body);
        $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->client->request(
                'POST',
                '/oauth/token',
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao gerar o token: {$response}"];
        }
    }

    public function atualizarToken($body)
    {
        $options['body'] = json_encode($body);
        $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->client->request(
                'POST',
                '/oauth/token',
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha aoatualizar o token: {$response}"];
        }
    }
}
