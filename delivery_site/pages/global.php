<?php

// PHPLIVRE - ARQUIVO DE CONFIGURAÇÃO
// WWW.PHPLIVRE.COM
$map = "https://www.google.com.br/maps/place/R.+Crisanto+Moreira+da+Rocha,+490+-+Lagoa+Sapiranga+(Coit%C3%A9),+Fortaleza+-+CE,+60833-022/@-3.7927738,-38.4796815,17z/data=!3m1!4b1!4m5!3m4!1s0x7c7458f722eb91d:0x4fd3cb43a6cd8c69!8m2!3d-3.792773!4d-38.477492?hl=pt-BR&authuser=0"; // LINK DO IFRAME DO MAPA DE SUA LOJA, PEGAR NO GOOGLE MAPS.
	 
// MÉTODOS DE PAGAMENTOS ONLINE
$pg_online = "nao";                                             // HABILITA OPÇÃO DE PAGAMENTOS ONLINE

$fch = "0";                                                         /* DESEJA QUE A LOJA FECHE SOZINHA NOS HORÁRIOS? 1: SIM 0: NÃO */
$cfg = array(
     "servidor" => "localhost",              // IP HOST
	 "login" => "root",                      // LOGIN HOST
	 "senha" => "",                       // SENHA HOST
	 "database" => "altoslanches",                     // DATABASE HOST
	 "empresa" => "Night Pizza Delivery",               // NOME DA EMPRESA
	 "email"    => "email@gmail.com",              // EMAIL DE CONTATO
     "site"    => "www.pnightpizza.com.br",              // SITE DA EMPRESA
	"facebook" => "https://www.facebook.com/nightpizzadelivery/",             // FACEBOOK DA EMPRESA
	"entrega" => "3,00",                            // TAXA DE ENTREGA
	"minimo" => "10",                            // VALOR DO PEDIDO MINIMO
	"horario" => "18",                           // HORARIO DE ABERTURA SEM MINUTOS
	"horario2" => "23",                        // HORARIO DE FECHAMENTO SEM MINUTOS
	"diasf" => "Domingo à Domingo",                         // DIAS DE FUNCIONAMENTO
	"entrega_min" => "45 min",                 // TEMPO DE ENTREGA ESTIMADO
	"bairros" => "Centro",            // BAIRROS PARA ENTREGA
	"user" => "admin",                          // LOGIN DO ADMIN
	"pw" => "admin",                         // SENHA DO ADMIN
	"tel1" => "(85) 3283-8787",                // TELEFONE 1
	"tel2" => "(85) 3283-8787",              // TELEFONE 2
	"endereco" => "Fortaleza Ce",          // ESTADO E CIDADE
	"endereco2" => "Av. Jovita Feitosa, 2444  - Fortaleza",        // RUA E NUMERO
	"cartoes" => "MasterCard, Visa, Elo(crédito e Débito), American Express(crédito) e Hiper Card(crédito)",           // Cartões aceitos
	 );
?>



