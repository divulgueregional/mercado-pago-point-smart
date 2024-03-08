## CÓDIGO-TG-MERCADO-PAGO-POINT-SMART

<b>código TG:</b><br><hr>

Para gerar o código TG é necessário antes pedir para o cliente fazer o login na conta do mercado pago.<br>
Abra uma aba ao lado (navegador) e coloca o link abaixo.<br>

https://auth.mercadopago.com.br/authorization?client_id=APP_ID&response_type=code&plat
form_id=mp&state=RANDOM_ID&redirect_uri=https://www.redirect-url.com <br><br>

- APP_ID: número grande em cima no menu lateral esquerdo abaixo do nome do app da sua aplicação<br>
- redirect_uri: seu dominio que colocou na aplicação<br>

vai abrir o seu dominio e na url vai conter o code TG<br>
EX: code=TG-65d8d73eecda2a0001c6a8a7-468736526&state=RANDOM_ID<br>
pegar apenas <b>TG-65d8d73eecda2a0001c6a8a7-468736526</b><br>
com o tg você tem 10 minutos para gerar o token.<br>
caso não gerar o token o TG expira e precisa rodar novamente o link no seu cliente novamente.

<b>TELA PARA MOSTRAR CÓDIGO TG</b><br>

- O arquivo index.html deve estar no link de redirect_uri. Assim pode copiar o código e colar na sua aplicação. Esse arquivo foi cedido pelo Fred Torno Junior.
<hr>
<b>Entra na pasta TOKEN que tem o exemplo para criar o token.</b>
