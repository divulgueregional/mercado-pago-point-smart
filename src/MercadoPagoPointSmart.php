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
    private $token;

    function __construct($token = '')
    {
        $this->client = new Client([
            'base_uri' => 'https://api.mercadopago.com',
        ]);

        if ($token != '') {
            $this->token = $token;
        }
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

    ##############################################
    ######## DISPOSITIVO #########################
    ##############################################
    public function obterDispositivo($filters)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['query'] = $filters;

        try {
            $response = $this->client->request(
                'GET',
                "/point/integration-api/devices",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao obter o dispositivo: {$response}"];
        }
    }

    public function alterarModoCriacao($device_id, $filter)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'PATCH',
                "/point/integration-api/devices/{$device_id}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao alterar modo de criação: {$response}"];
        }
    }
}
