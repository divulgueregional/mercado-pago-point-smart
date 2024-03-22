## Listar Lojas

Encontre todas as informações das lojas criadas através de filtros específicos.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $user_id = '';
    $filter = [
        'user_id' => $user_id,
        'external_id' => 'loja01',
    ];
    try {
        $response = $PointSmart->buscarLojas($user_id, $filter);
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
