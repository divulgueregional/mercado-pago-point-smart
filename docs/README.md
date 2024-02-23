## TOKEN-MERCADO-PAGO-POINT-SMART

Para gerar um token é necessário seguir os passos abaixo:<br><hr>
Entra na conta do mercado pago (CNPJ) e gere uma aplicação.<br>
link para criar a aplicação: https://www.mercadopago.com.br/developers/panel<br><br>
Detalhes da aplicação clica em Editar e coloca seu dominio em URLs de redirecionamento<br>

- clique em produção: Credenciais de produção<br>
  Setor = Serviço de TI<br>
  ativar credencial <br>
- vai aparecer<br>
  Client ID: 999999999999<br>
  Client Secret: 999f9999f99999h9h9<br>
  Guarde Client ID e Client Secret, vai precisar para trabalhar com os endpoints<br><hr>

Para gerar o token é necessário antes pedir para o cliente fazer o login na conta do mercado pago.<br>
Abra uma aba ao lado (navegador) e coloca o link abaixo.<br>

https://auth.mercadopago.com.br/authorization?client_id=APP_ID&response_type=code&plat
form_id=mp&state=RANDOM_ID&redirect_uri=https://www.redirect-url.com <br><br>

- APP_ID: número grande em cima no menu lateral esquerdo abaixo do nome do app da sua aplicação<br>
- redirect_uri: seu dominio que colocou na aplicação<br>

vai abrir o seu dominio e na url vai conter o code TG<br>
EX: code=TG-65d8d73eecda2a0001c6a8a7-468736526&state=RANDOM_ID<br>
pegar apenas TG-65d8d73eecda2a0001c6a8a7-468736526&state<br>
com o tg você tem 10 minutos para gerar o token.<br>
caso não gerar o token o TG expira e precisa rodar novamente o link no cadastro de seu cliente.
