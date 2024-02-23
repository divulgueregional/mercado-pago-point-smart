<?php

namespace Divulgueregional\mercadopagopointsmart;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use JetBrains\PhpStorm\NoReturn;

class MercadoPagoPointSmart
{
    protected $urlToken;
    protected $header;
    protected $token;
    protected $config;
    protected $clientToken;
    protected $fields;
    protected $headers;
    // protected $optionsRequest = [];

    private $client;
    // function __construct(array $config)
    function __construct($config)
    {
        $this->config = $config;

        $this->clientToken = new Client([
            'base_uri' => 'https://api.mercadopago.com',
        ]);

        $this->token = 'TEST-5032970848861472-021413-c20a76d29ae88001de5bc24bd9d60419-1682170368';
    }

    ######################################################
    ############## TOKEN #################################
    ######################################################
    public function gerarToken()
    {
        try {
            $response = $this->clientToken->request(
                'POST',
                '/oauth/token',
                [
                    'headers' => [
                        'Accept' => '*/*',
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Basic ' . base64_encode($this->config['client_id'] . ':' . $this->config['client_secret']) . ''
                    ],
                    'verify' => false,
                    'form_params' => [
                        'grant_type' => 'client_credentials',
                        'scope' => 'cobrancas.boletos-info cobrancas.boletos-requisicao'
                    ]
                ]
            );
            $retorno = json_decode($response->getBody()->getContents());
            if (isset($retorno->access_token)) {
                $this->token = $retorno->access_token;
            }
            return $this->token;
        } catch (\Exception $e) {
            return new Exception("Falha ao gerar Token: {$e->getMessage()}");
        }
    }

    public function atualizarToken($dados)
    {
        // $options = $this->optionsRequest;
        $options['body'] = json_encode($dados);
        // $options['headers']['Content-Type'] = 'application/json';
        // $options['headers']['Authorization'] = "Bearer {$this->token}";
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
            return ['error' => "Falha ao incluir Boleto Cobranca: {$response}"];
        }
    }
}
