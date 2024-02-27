## Buscar intenção de pagamento

Este endpoint fornecerá as informações da intenção de pagamento criada nos últimos três meses, seu status final é o ID do pagamento, que pode ser usado para obter o status final da transação na API de pagamentos. As notificações Webhook são o principal ponto de comunicação das informações de intenção de pagamento, portanto este endpoint deve ser utilizado para testes e contingências, e não para consultas recorrentes, pois só permite uma requisição por segundo para obter informações

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $payment_id = '';
    try {
        $response = $PointSmart->buscarPagamento($payment_id);
        echo "<pre>";
        print_r($response);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
