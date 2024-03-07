## Lista de transações

Este endpoint lista as transações realizadas e pode usar os filtros para defnir a lista.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $filter = [
        'sort' => 'date_created',
        'criteria' => 'desc',
        'range' => 'date_created',
        'begin_date' => 'NOW-30DAYS',
        'end_date' => 'NOW',
    ];
    try {
        $response = $PointSmart->listaDeTransacoes($filter);
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
