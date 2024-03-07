## Lista de pagamento

Este endpoint lista os pagamentos criados e pode ser filtrados pela data incial e data final definindo o período de pesquisa.

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
