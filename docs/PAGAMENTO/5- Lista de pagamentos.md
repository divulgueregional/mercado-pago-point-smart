## Lista de pagamento

Este endpoint lista os pagamentos criados e pode ser filtrados pela data incial e data final definindo o período de pesquisa.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $filter = [
        'startDate' => implode("-", array_reverse(explode("/", $Post->startDate))),
        'endDate' => implode("-", array_reverse(explode("/", $Post->endDate))),
    ];

    try {
        $response = $PointSmart->listaDePagamento($filter);
        echo "<pre>";
        print_r($response);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
