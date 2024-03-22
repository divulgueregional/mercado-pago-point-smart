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

    public function alterarModoCriacao(string $device_id, $filter)
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

    ##############################################
    ######## PAGAMENTO ###########################
    ##############################################
    public function criarPagamento(string $device_id, $filter)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'POST',
                "/point/integration-api/devices/{$device_id}/payment-intents",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao criar pagamento: {$response}"];
        }
    }

    public function cancelarPagamento(string $device_id, string $payment_id)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'DELETE',
                "/point/integration-api/devices/{$device_id}/payment-intents/{$payment_id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao cancelar intenção de pagamento: {$response}"];
        }
    }

    public function buscarPagamento(string $payment_id)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/point/integration-api/payment-intents/{$payment_id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar intenção de pagamento: {$response}"];
        }
    }

    public function buscarDetalhadaPagamento(string $payment_id)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';

        try {
            $response = $this->client->request(
                'GET',
                "/v1/payments/{$payment_id}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao obter o detalhe do pagamento: {$response}"];
        }
    }

    public function listaDePagamento($filters)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['query'] = $filters;

        try {
            $response = $this->client->request(
                'GET',
                "/point/integration-api/payment-intents/events",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao listar os pagamentos: {$response}"];
        }
    }

    public function statusPagamento($payment_id)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';

        try {
            $response = $this->client->request(
                'GET',
                "/point/integration-api/payment-intents/{$payment_id}/events",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao listar os pagamentos: {$response}"];
        }
    }

    function listaDeTransacoes($filters)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['query'] = $filters;

        try {
            $response = $this->client->request(
                'GET',
                "/v1/payments/search",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao listar os pagamentos: {$response}"];
        }
    }

    ##############################################
    ######## ESTORNO ###############@@############
    ##############################################
    public function estornarPagamento($payment_id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'POST',
                "/v1/payments/{$payment_id}/refunds",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao fazer o estorno: {$response}"];
        }
    }

    public function buscarEstornarPagamento($payment_id, $idEstorno)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "v1/payments/{$payment_id}/refunds/{$idEstorno}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar o estorno: {$response}"];
        }
    }


    ##############################################
    ######## PIX #################################
    ##############################################

    ##############################################
    ######## LOJA ################################
    ##############################################
    public function criarLoja($user_id, $filter)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'POST',
                "/users/{$user_id}/stores",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao criar a loja: {$response}"];
        }
    }

    public function obterLoja($id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/stores/{$id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao obter a loja: {$response}"];
        }
    }

    public function buscarLojas($id, $filter)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'GET',
                "/users/{$id}/stores/search",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar a loja: {$response}"];
        }
    }

    public function excluirLoja(string $user_id, $filter)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'DELETE',
                "/users/{$user_id}/stores/{$filter['id']}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao excluir a loja: {$response}"];
        }
    }

    ##############################################
    ######## CAIXA ###############################
    ##############################################
    public function criarCaixa($filter)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'POST',
                "/pos",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao criar o caixa: {$response}"];
        }
    }

    public function obterCaixa($id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/pos/{$id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao obter o caixa: {$response}"];
        }
    }

    public function buscarCaixa($external_id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/pos/external_id/{$external_id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar o caixa: {$response}"];
        }
    }

    public function mostrarTodosCaixas()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/pos",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao mostrar os caixas: {$response}"];
        }
    }

    public function excluirCaixa(string $id)
    {
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'DELETE',
                "/pos/$id",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao excluir o caixa: {$response}"];
        }
    }

    ##############################################
    ######## PIX #################################
    ##############################################
    public function criarPix($filter, $user_id, $ponto_venda)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'POST',
                "/instore/orders/qr/seller/collectors/{$user_id}/pos/{$ponto_venda}/qrs",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao criar pix: {$response}"];
        }
    }

    public function buscarPixCriado($external_reference)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/merchant_orders/?external_reference/{$external_reference}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar pix criado: {$response}"];
        }
    }

    public function buscarPixPago($payment_id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/v1/payments/{$payment_id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar pix recebido: {$response}"];
        }
    }

    //Em teste
    public function obterMeiosPagamentos()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $options['headers']['Authorization'] = "Bearer {$this->token}";
        $options['headers']['Content-Type'] = 'application/json';
        try {
            $response = $this->client->request(
                'GET',
                "/v1/payment_methods",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar pix recebido: {$response}"];
        }
    }
}
