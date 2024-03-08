## WEBHOOK-MERCADO-PAGO-POINT-SMART

<b>Para receber as notificações:</b><br><hr>

- <b>Abra seu app:</b> https://www.mercadopago.com.br/developers/panel/app<br>
- <b>NOTIFICAÇÕES:</b> clica em Webhooks, modo produção: informe URL de produção. Marque os eventos, salvar e a Assinatura secreta vai ser gerada automaticamente. Ao passara o cartão na máquina e for aprovado, receberá uma notificação pelo webhook<br>

<b>Arquivo php</b><br><hr>

```php
$aleatorio = rand(1, 500);
$dataHora = date('Y-m-d H:s:i');
$gerarLog = true;

// exemplo pra gravar um arquivo pra analisar o rerorno
$fp = fopen("retorno_webhook_mp2_{$aleatorio}.log", "a");
fwrite($fp, $Post_Recebe);
fclose($fp);

// outro opção pra gravar um arquivo pra analisar o rerorno
if ($gerarLog) {
    try {
        $json_payload = file_get_contents('php://input');

        $objetoDados = json_decode($json_payload);
        $state = $objetoDados->state;

        $file = "retorno_webhook_mp-{$dataHora}-{$aleatorio}.txt";
        $current = file_get_contents($file);
        $current .= $json_payload . "\n\n";
        file_put_contents($file, $current);
    } catch (Exception $ex) {
    }
}
```
