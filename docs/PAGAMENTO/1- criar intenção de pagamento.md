## Criar intenção de pagamento

Este endpoint permite que você crie uma intenção de pagamento, ou seja, uma chamada que contém os detalhes de uma transação a ser realizada e atribuí-la a um dispositivo.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $filter = [
        'amount' => 150,
        'description' => "Pedido 0002 - Débito",
        'payment' => [
            "type" => "debit_card",
        ],
        "additional_info" => [
            "external_reference" => "Pedido 002",
            "print_on_terminal" => false
        ]
    ];
    $device_id = '';

    try {
    $response = $PointSmart->criarPagamento($device_id, $filter);
        echo "<pre>";
        print_r($token);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```

<hr>
Definir pagamento por crédito, débito e voucher<br>
<b>DÉBITO</b>

```php
    'payment' => [
        "type" => "debit_card",
    ],
```

<b>CRÉDITO</b>

```php
    'payment' => [
        "type" => "credit_card",
        "installments" => 1, // aqui é a qtd de parcelas.
        "installments_cost" => "seller", //seller ou buyer
    ],
```

<b>VOULCHER</b>

```php
    'payment' => [
        "type" => "voucher_card",
        "voucher_type" => 'sodexo', //  [sodexo] ou [alelo]
    ],
```

<b>VALOR DE REEBIMENTO</b><br>
O valor não pode ter virgula ou ponto.<br>
Exemplo: um real e cinquenta centavos

```php
    'amount' => 150,
```
