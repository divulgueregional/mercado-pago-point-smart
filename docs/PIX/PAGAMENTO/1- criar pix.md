## Criar Pix

Gerar pix para ser recebido por meio de código de barras.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $hora_atual = date('H:i:s');
    $nova_hora = date('H:i:s', strtotime($hora_atual . '+5 minutes')); //Adiciona 5 minutos
    $valor = 1.65;
    $filter = [
        "cash_out" => [
            "amount" => 0 // sempre 0
        ],
        'external_reference' =>  "LOJA01",
        'description' => "Venda CashBox",
        'items' => [
            [
                "sku_number" => "1",
                "category" => "Venda CashBox",
                "title" => "Venda CashBox",
                "description" => "Venda CashBox",
                "unit_measure" => "Unidade",
                "quantity" => 1,
                "unit_price" => floatval($valor),
                "total_amount" => floatval($valor),
            ],
        ],
        "notification_url" => null, // endereco webhook
        "expiration_date" => date('Y-m-d') . "T" . $nova_hora . ".559-04:00",
        'sponsor' => [
            "id" => 1238521254 //id do user da software house
        ],
        "title" => 'Compra em Panificadora', //$Post->descricao_pix, // texto impresso no comprovante similar oa cartao de credito
        "total_amount" => floatval($valor),
    ];
    $user_id = '';
    $ponto_venda = '';
    try {
        $response = $PointSmart->criarPix($filter, $user_id, $ponto_venda);
        if (!isset($response['status'])) {
            $response = pegarMSGErro($response);
            echo "<pre>";
            print_r($response);
        } else {
            echo "<pre>";
            print_r($response);
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```

Para pix payment você precisa gerar um numero aleatório pra ser uma requisição única.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $MercadoPago = new MercadoPagoPointSmart($token);

    $terminal_referente = '';
    $codigo_interno = '';//gere seu numero interno
    $valor = 1.65;
    $filter = [
        "description" => "Venda produto",
        "external_reference" => $terminal_referente,
        "payer" => [
            "entity_type" => "individual",
            "type" => "customer",
            "id" => null,
            "email" => "teste@gmail.com"
        ],
        "notification_url" => "https://meu_dominio.com.br/webhook/webhook_mercado_pago",
        "payment_method_id" => "pix",
        "transaction_amount" => (float) $valor,
    ];

    $response = $MercadoPago->criarPixPagament($filter, $codigo_interno);

    echo "<pre>";
    print_r($response);
```
