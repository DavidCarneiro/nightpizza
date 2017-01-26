<?php
function randString($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }

function MontarLink($texto)
{
	if (!is_string($texto))
		return $texto;
	  
	$er = "/(http(s)?:\/\/(www|.*?\/)?((\.|\/)?[a-zA-Z0-9&%_?=-]+)+)/i";
	preg_match_all($er, $texto, $match);
	
	foreach ($match[0] as $link)
	{
		$link = strtolower($link);
		$link_len = strlen($link);
		
		//troca "&" por "&amp;", tornando o link válido pela W3C
		$web_link = str_replace("&", "&amp;", $link);
		
		$texto = str_ireplace($link, "<a href=\"" . $web_link . "\" target=\"_blank\" title=\"". $web_link . "\" rel=\"nofollow\">". (($link_len > 60) ? substr($web_link, 0, 25) . "..." . substr($web_link, -15) : $web_link) . "</a>", $texto);
		
	}
	
	return $texto;
}


function copiar_arquivos($diretorio, $destino) {
    $resultado = array();
    if (is_dir($diretorio)) {
        if ($dir = opendir($diretorio)) {
            while(false !== ($arq = readdir($dir))) {
                if (is_file($diretorio . $arq)) {
                     $resultado[strtolower($arq)] = $arq;
                }
            }
            ksort($resultado);
            foreach($resultado as $arq) {
                if (copy($diretorio.$arq, $destino.'/'.$arq)) echo ("Arquivo $arq copiado<br>");
                else echo ("erro copiando arquivo $arq...<br>");
            }
        }
    }
}

function criar_diretorios($diretorio, $destino) {
    if (is_dir($diretorio)) {
        if ($dir = opendir($diretorio)) {
            while(false !== ($arq = readdir($dir))) {
                if (is_dir($diretorio . $arq) && $arq != "..") {
                   $filename = $destino.'/'.$arq;
                   if (file_exists($filename)) echo "O diretório $filename já existe<br>";
                   else
                   {
                      if (mkdir ($filename)) echo "Diretório $filename Criado<br>";
                      else echo "NÃO foi possível criar o Diretório $filename. Verifique o dispositivo<br>";
                   }
                   copiar_arquivos($diretorio.$arq.'/', $filename.'/');
                }
            }
        }
    }
}


function valida_cmc7($entrada)
{

$entrada = strtr($entrada, "çÇ?xX<>:", "        ");
$entrada = str_replace(" ", "", $entrada);

if (strlen($entrada)==30)
{
   $campo1 = substr($entrada,0,7);
   $campo2 = substr($entrada,8,10);
   $campo3 = substr($entrada,19,10);

   $dv1 = substr($entrada,18,1);
   $dv2 = substr($entrada,7,1);
   $dv3 = substr($entrada,29,1);

   //Calcula o DV1
   $soma = 0;
   for ($i=0; $i<strlen($campo1); $i++)
   {
      $item = substr($campo1,$i,1)*2;
      if ($item > 9) $item = substr($item,0,1) + substr($item,1,1);
      $soma = $soma + $item;
      $i = $i + 1;
      $soma = $soma + substr($campo1,$i,1);
   }
   $c1 = $soma%10;
   if ($c1>9) $c1 = 0;
   else $c1 = 10 - $c1;

   //Calcula o DV2
   $soma = 0;
   for ($i=0; $i<strlen($campo2); $i++)
   {
      $soma = $soma + substr($campo2,$i,1);
      $i = $i + 1;
      $item = substr($campo2,$i,1)*2;
      if ($item > 9) $item = substr($item,0,1) + substr($item,1,1);
      $soma = $soma + $item;
   }
   $c2 = $soma%10;
   if ($c2>9) $c2 = 0;
   else $c2 = 10 - $c2;

   //Calcula o DV3
   $soma = 0;
   for ($i=0; $i<strlen($campo3); $i++)
   {
      $soma = $soma + substr($campo3,$i,1);
      $i = $i + 1;
      $item = substr($campo3,$i,1)*2;
      if ($item > 9) $item = substr($item,0,1) + substr($item,1,1);
      $soma = $soma + $item;
   }
   $c3 = $soma%10;
   if ($c3>9) $c3 = 0;
   else $c3 = 10 - $c3;

   if ($dv1==$c1 and $dv2==$c2 and $dv3==$c3) return true;
   else return false;
}
else return false;
}

function remover_caracteres($string) {
	$palavra = strtr($string, "ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ.;,º°ª{}*()[]-/", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy               ");
 	$palavranova = str_replace("  ", "", $palavra);
	return $palavranova;
}

function mod11($valor) {
  $soma = 0; // acumulador
  $peso = 2; // peso inicial
  $numdig = strlen($valor); // número de dígitos
  for ($i = $numdig - 1; $i >= 0; $i--) {
    $soma = $soma + substr($valor, $i, 1) * $peso++;
    if ($peso == 10) $peso = 2;
  }
  // calcula o resto de $soma dividido por 11
  // subtrai 11 do resultado anterior - este é o dígito
  // se $dígito for 10 ou 11 altera para 0
  $digito = 11 - ($soma % 11);
  if ($digito == 0 or $digito == 10 or $digito == 11) $digito = 0;
  return $digito;
}

//Retorna a datapor extenso - recebe no padrao do brasil dd/mm/aaaa
function data_por_extenso($data){
   $partes = explode("/", $data);
   $dia = $partes[0];
   $mes = $partes[1];
   $ano = $partes[2];
   switch($dia){
      case 1: $dia_extenso = "Um";
               break;
      case 2: $dia_extenso = "Dois";
               break;
      case 3: $dia_extenso = "Tres";
               break;
      case 4: $dia_extenso = "Quatro";
               break;
      case 5: $dia_extenso = "Cinco";
               break;
      case 6: $dia_extenso = "Seis";
               break;
      case 7: $dia_extenso = "Sete";
               break;
      case 8: $dia_extenso = "Oito";
               break;
      case 9: $dia_extenso = "Nove";
               break;
      case 10: $dia_extenso = "Dez";
               break;
      case 11: $dia_extenso = "Onze";
               break;
      case 12: $dia_extenso = "Doze";
               break;
      case 13: $dia_extenso = "Treze";
               break;
      case 14: $dia_extenso = "Quatorze";
               break;
      case 15: $dia_extenso = "Quinze";
               break;
      case 16: $dia_extenso = "Dezeseis";
               break;
      case 17: $dia_extenso = "Dezesete";
               break;
      case 18: $dia_extenso = "Dezoito";
               break;
      case 19: $dia_extenso = "Dezenove";
               break;
      case 20: $dia_extenso = "Vinte";
               break;
      case 21: $dia_extenso = "Vinte e Um";
               break;
      case 22: $dia_extenso = "Vinte e Dois";
               break;
      case 23: $dia_extenso = "Vinte e Tres";
               break;
      case 24: $dia_extenso = "Vinte e Quatro";
               break;
      case 25: $dia_extenso = "Vinte e Cinco";
               break;
      case 26: $dia_extenso = "Vinte e Seis";
               break;
      case 27: $dia_extenso = "Vinte e Sete";
               break;
      case 28: $dia_extenso = "Vinte e Oito";
               break;
      case 29: $dia_extenso = "Vinte e Nove";
               break;
      case 30: $dia_extenso = "Trinta";
               break;
      case 31: $dia_extenso = "Trinta e Um";
               break;
   }

   $mes_extenso = dia_do_mes($mes);

   switch($ano){
      case 2004: $ano_extenso = "Dois Mil e Quatro";
               break;
      case 2005: $ano_extenso = "Dois Mil e Cinco";
               break;
      case 2006: $ano_extenso = "Dois Mil e Seis";
               break;
      case 2007: $ano_extenso = "Dois Mil e Sete";
               break;
      case 2008: $ano_extenso = "Dois Mil e Oito";
               break;
      case 2009: $ano_extenso = "Dois Mil e Nove";
               break;
      case 2010: $ano_extenso = "Dois Mil e Dez";
               break;
      case 2011: $ano_extenso = "Dois Mil e Onze";
               break;
      case 2012: $ano_extenso = "Dois Mil e Doze";
               break;
      case 2013: $ano_extenso = "Dois Mil e Treze";
               break;
      case 2014: $ano_extenso = "Dois Mil e Quatorze";
               break;
      case 2015: $ano_extenso = "Dois Mil e Quinze";
               break;
   }


   $extenso = $dia_extenso.' de '.$mes_extenso.' de '.$ano_extenso;
   return $extenso;
}

//Retorna o mes anterior com o valor do seu ultimo dia
function mes_anterior_ultimo_dia($mes,$ano){
   if ($mes == 01)
   {
      $ano=$ano-1;
      $mes=12;
   }
   else $mes= $mes-1;
   $dia = ultimo_dia_mes($mes);
   $mes_ant = $ano.'-'.$mes.'-'.$dia;
   return $mes_ant;
}

//Retorna o mes anterior com o valor do seu primeiro dia
function mes_anterior_primeiro_dia($mes,$ano){
   if ($mes == 01)
   {
      $ano=$ano-1;
      $mes=12;
   }
   else $mes= $mes-1;
   $dia = ultimo_dia_mes($mes);
   $mes_ant = $ano.'-'.$mes.'-01';
   return $mes_ant;
}


//TRANSFORMA A DATA DO PADRAO BRASILEIRO PARA O MYSQL
function enviadata($data){
   $partes = explode("/", $data);
   $dia = $partes[0];
   $mes = $partes[1];
   $ano = $partes[2];
   $dataformatada = $ano.'-'.$mes.'-'.$dia;
   return $dataformatada;
}

//TRANSFORMA A DATA DO PADRAO MYSQL PARA BRASILEIRO
function recebedata($data){
   $partes = explode("-", $data);
   $dia = $partes[2];
   $mes = $partes[1];
   $ano = $partes[0];
   $dataformatada = $dia.'/'.$mes.'/'.$ano;
   return $dataformatada;
}

//TRANSFORMA A DATA DO PADRAO MYSQL PARA BRASILEIRO
function recebedatahora($data){
   $partes = explode(" ", $data);
   $data   = $partes[0];
   $hora   = $partes[1];
   $partes = explode("-", $data);
   $dia = $partes[2];
   $mes = $partes[1];
   $ano = $partes[0];
   $dataformatada = $dia.'/'.$mes.'/'.$ano.' '.$hora;
   return $dataformatada;
}


//DEVOLVE COMO RESULTADO O ULTIMO DIA DO MES SE E 28, 30, OU 31
function ultimo_dia_mes($mes){
   switch ($mes) {
      case 1:   return 31;  break;
      case 2:   if (date("L")==0) return 28;
                else return 29;   //ano bisexto
                break;
      case 3:   return 31;  break;
      case 4:   return 30;  break;
      case 5:   return 31;  break;
      case 6:   return 30;  break;
      case 7:   return 31;  break;
      case 8:   return 31;  break;
      case 9:   return 30;  break;
      case 10:  return 31;  break;
      case 11:  return 30;  break;
      case 12:  return 31;  break;
   }
}

//DEVOLVE O MES EM STRING
function dia_do_mes($mes){
   switch ($mes) {
      case 1:   return 'Janeiro';   break;
      case 2:   return 'Fevereiro'; break;
      case 3:   return 'Março';     break;
      case 4:   return 'Abril';     break;
      case 5:   return 'Maio';      break;
      case 6:   return 'Junho';     break;
      case 7:   return 'Julho';     break;
      case 8:   return 'Agosto';    break;
      case 9:   return 'Setembro';  break;
      case 10:  return 'Outubro';   break;
      case 11:  return 'Novembro';  break;
      case 12:  return 'Dezembro';  break;
   }
}

//DEVOLVE O MES EM STRING com 3 letras
function nome_do_mes($mes){
   switch ($mes) {
      case 1:   return 'JAN'; break;
      case 2:   return 'FEV'; break;
      case 3:   return 'MAR'; break;
      case 4:   return 'ABR'; break;
      case 5:   return 'MAI'; break;
      case 6:   return 'JUN'; break;
      case 7:   return 'JUL'; break;
      case 8:   return 'AGO'; break;
      case 9:   return 'SET'; break;
      case 10:  return 'OUT'; break;
      case 11:  return 'NOV'; break;
      case 12:  return 'DEZ'; break;
   }
}

function voltadata($dias,$datahoje){

// Desmembra Data -------------------------------------------------------------

  if (ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $datahoje, $sep)) {
  $dia = $sep[1];
  $mes = $sep[2];
  $ano = $sep[3];
  } else {
    echo "<b>Formato Inválido de Data - $datahoje</b><br>";
  }

// Meses que o antecessor tem 31 dias -----------------------------------------

  if($mes == "01" || $mes == "02" || $mes == "04" || $mes == "06" || $mes == "08" || $mes == "09" || $mes == "11"){
    for ($cont = $dias ; $cont > 0 ; $cont--){
    $dia--;
      if($dia == 00){ // Volta o dia para dia 31 .
      $dia = 31;
      $mes = $mes -1; // Diminui um mês se o dia zerou .
        if($mes == 00){
        $mes = 12;
        $ano = $ano - 1; // Se for Janeiro e subtrair 1 , vai para o ano anterior no mês de dezembro.
        }
      }
    }
  }

// Meses que o antecessor tem 30 dias -----------------------------------------

  if($mes == "05" || $mes == "07" || $mes == "10" || $mes == "12" ){
    for ($cont = $dias ; $cont > 0 ; $cont--){
    $dia--;
      if($dia == 00){ // Volta o dia para dia 30 .
      $dia = 30;
      $mes = $mes -1; // Diminui um mês se o dia zerou .
      }
    }
  }

// Mês que o antecessor é fevereiro -------------------------------------------
  if($ano % 4 == 0 && $ano%100 != 0){ // se for bissexto
    if($mes == "03" ){
      for ($cont = $dias ; $cont > 0 ; $cont--){
      $dia--;
        if($dia == 00){ // Volta o dia para dia 30 .
        $dia = 29;
        $mes = $mes -1; // Diminui um mês se o dia zerou .
        }
      }
    }
  }//fecha se bissexto...
  else{ // se não for bissexto
    if($mes == "03" ){
      for ($cont = $dias ; $cont > 0 ; $cont--){
        $dia--;
        if($dia == 00){ // Volta o dia para dia 30 .
          $dia = 28;
          $mes = $mes -1; // Diminui um mês se o dia zerou .
        }
      }
    }
  }

// Confirma Saída de 2 dígitos ------------------------------------------------

  if(strlen($dia) == 1){$dia = "0".$dia;}
  if(strlen($mes) == 1){$mes = "0".$mes;}

// Monta Saída ----------------------------------------------------------------

  $nova_data = $dia."/".$mes."/".$ano ;

  return $nova_data;
} //fecha função


function somadata($dias,$datahoje){

// Desmembra Data -------------------------------------------------------------

  if (ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $datahoje, $sep)) {
  $dia = $sep[1];
  $mes = $sep[2];
  $ano = $sep[3];
  } else {
    echo "<b>Formato Inválido de Data - $datahoje</b><br>";
  }
  $i = $dias;

  for($i = 0;$i<$dias;$i++)
  {
     if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12)
     {
        if($mes == 12 && $dia == 31)
        {
           $mes = 1;
           $ano++;
           $dia = 00;
        }
        if($dia == 31 && $mes != 12)
        {
           $mes++;
           $dia = 00;
        }
     }//fecha if geral

     if($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11)
     {
        if($dia == 30)
        {
           $dia = 00;
           $mes++;
        }
     }//fecha if geral

     if($mes == 2)
     {
        if($ano % 4 == 0 && $ano % 100 != 0)
        { //ano bissexto
           if($dia == 29)
           {
              $dia = 00;
              $mes++;
           }
        }
        else
        {
           if($dia == 28)
           {
              $dia = 00;
              $mes++;
           }
        }
     }//FECHA IF DO MÊS 2

     $dia++;

  }//fecha o for()

// Confirma Saída de 2 dígitos ------------------------------------------------

  if(strlen($dia) == 1){$dia = "0".$dia;};
  if(strlen($mes) == 1){$mes = "0".$mes;};

// Monta Saída ----------------------------------------------------------------

$nova_data = $dia."/".$mes."/".$ano;

return $nova_data;

}//fecha a funçâo data

function diferenca_datas_old($datai,$dataf){

// Armazena nas variáveis $DataInicial e $DataFinal
// os valores de $DataI e $DataF no formato 'timestamp'
 $datainicial = getdate(strtotime($datai));
 $datafinal = getdate(strtotime($dataf));

// Calcula a Diferença
 $dif = round(($datafinal[0] - $datainicial[0]) / 86400);

 return $dif;
/*
   $DataFinal[0] mostra o valor em segundos do timestamp
   a partir da data e hora mínima do PHP.
   1 dia possui 86400 segundos.
   O script acima retorna quantos dias há de diferença
*/
}

function geraSaltAleatorio() {
	$tamanho = 22;
	return substr(sha1(mt_rand()), 0, $tamanho);  
}

function diferenca_datas($datai,$dataf){
	
		$partes1 = explode('/', $datai);
		$mktime1 = mktime(0, 0, 0, $partes1[1], $partes1[0], $partes1[2]);
	
	
		$partes2 = explode('/', $dataf);
		$mktime2 = mktime(0, 0, 0, $partes2[1], $partes2[0], $partes2[2]);
	
	// Usa a função criada e pega o timestamp das duas datas:
	$time_inicial = $mktime1;
	$time_final = $mktime2;
	// Calcula a diferença de segundos entre as duas datas:
	$diferenca = $time_final - $time_inicial; // 19522800 segundos
	// Calcula a diferença de dias
	$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
	
	return $dias;
}

//descobre o dia da semana
function dia_da_semana($data){
$x = diferenca_datas($data,date("Y-m-d"));
$semana = date("w");

for ($i=1; $i<=$x; $i++)
{
   switch ($semana)
   {
      case 0: $semana = 6; break;
      case 1: $semana = 0; break;
      case 2: $semana = 1; break;
      case 3: $semana = 2; break;
      case 4: $semana = 3; break;
      case 5: $semana = 4; break;
      case 6: $semana = 5; break;
   }
}
switch($semana){
   case 0: $dia_semana = 'Domingo';       break;
   case 1: $dia_semana = 'Segunda-Feira'; break;
   case 2: $dia_semana = 'Terça-Feira';   break;
   case 3: $dia_semana = 'Quarta-Feira';  break;
   case 4: $dia_semana = 'Quinta-Feira';  break;
   case 5: $dia_semana = 'Sexta-feira';   break;
   case 6: $dia_semana = 'Sábado';        break;
}
return $dia_semana;
}

function diadasemana($data){
$x = diferenca_datas($data,date("Y-m-d"));
$semana = date("w");

for ($i=1; $i<=$x; $i++)
{
   switch ($semana)
   {
      case 0: $semana = 6; break;
      case 1: $semana = 0; break;
      case 2: $semana = 1; break;
      case 3: $semana = 2; break;
      case 4: $semana = 3; break;
      case 5: $semana = 4; break;
      case 6: $semana = 5; break;
   }
}
return $semana;
}


//descobre o dia da semana -TRES DIGITOS
function dia_da_semana_3($data){
$x = diferenca_datas($data,date("Y-m-d"));
$semana = date("w");

for ($i=1; $i<=$x; $i++)
{
   switch ($semana)
   {
      case 0: $semana = 6; break;
      case 1: $semana = 0; break;
      case 2: $semana = 1; break;
      case 3: $semana = 2; break;
      case 4: $semana = 3; break;
      case 5: $semana = 4; break;
      case 6: $semana = 5; break;
   }
}
switch($semana){
   case 0: $dia_semana = 'DOM'; break;
   case 1: $dia_semana = 'SEG'; break;
   case 2: $dia_semana = 'TER'; break;
   case 3: $dia_semana = 'QUA'; break;
   case 4: $dia_semana = 'QUI'; break;
   case 5: $dia_semana = 'SEX'; break;
   case 6: $dia_semana = 'SAB'; break;
}
return $dia_semana;
}


//ESCREVE POR EXTENSO
function extenso($valor=0, $maiusculas=false)
{
    // verifica se tem virgula decimal
    if (strpos($valor,",") > 0)
    {
      // retira o ponto de milhar, se tiver
      $valor = str_replace(".","",$valor);

      // troca a virgula decimal por ponto decimal
      $valor = str_replace(",",".",$valor);
    }

        $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
        $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

        $z=0;

        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);
        for($i=0;$i<count($inteiro);$i++)
                for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
                        $inteiro[$i] = "0".$inteiro[$i];

         $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
        for ($i=0;$i<count($inteiro);$i++) {
                $valor = $inteiro[$i];
                $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
                $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
                $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

                $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
                $t = count($inteiro)-1-$i;
                $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
                if ($valor == "000")$z++; elseif ($z > 0) $z--;
                if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
                if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

         if(!$maiusculas){return($rt ? $rt : "zero");}
         else {return (ucwords($rt) ? ucwords($rt) : "Zero");}
}
//Retorna a quantidade de dias uteis no mes
function dias_uteis($data)
{
// arquivo de feriados
$feriados = file("feriado.txt");

// conversão p/ padrão brasileiro dd/mm/aaaa
$data=explode("/","$data");
$d=$data[0];
$m=$data[1];
$y=$data[2];

// verifica se a data é válida!
$res=checkdate($m,$d,$y);
$days_working = 0;
if ($res==1){
   // quantos dias tem o mês
   $days_month = date ("t", mktime (0,0,0,$m,$d,$y));

   // numero de dias úteis no mês
   for ($day = 01; $day <= $days_month; $day++){
       $diames = $day.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$day,$y)) != 0)) {
                   $days_working = $days_working - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$day,$y)) != 0)) {
             $days_working++;
       }
   }
    return $days_working;
/*
   // numero de dias úteis até a data informada
   for ($days = 01; $days <= $d; $days++){
       $diames = $days.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$days,$y)) != 0) && (date("w", mktime (0,0,0,$m,$days,$y)) != 6)) {
                   $days_working_prev_date = $days_working_prev_date - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$days,$y)) != 0) && (date("w", mktime (0,0,0,$m,$days,$y)) != 6)) {
           $days_working_prev_date++;
       }
   }
   echo 'Dias até a data: '.$days_working_prev_date."<br>\n";

   // numero de dias úteis depois da data informada
   for ($daysm = $d; $daysm <= $days_month; $daysm++){
       $diames = $daysm.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$daysm,$y)) != 0) && (date("w", mktime (0,0,0,$m,$daysm,$y)) != 6)) {
                   $days_working_next_date = $days_working_next_date - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$daysm,$y)) != 0) && (date("w", mktime (0,0,0,$m,$daysm,$y)) != 6)) {
           $days_working_next_date++;
       }
   }
   echo 'Dias depois da data: '.$days_working_next_date."<br>\n";
*/
} else {
   echo "Data informada não é válida!!!";
}
}

//calc date
### coded by nobody - www.zorzo.hpg.com.br
function calcdate($data, $opcao)
{
// arquivo de feriados
$feriados = file("feriado.txt");

// conversão p/ padrão brasileiro dd/mm/aaaa
$data=explode("/","$data");
$d=$data[0];
$m=$data[1];
$y=$data[2];

// verifica se a data é válida!
$res=checkdate($m,$d,$y);
$days_working = 0;
if ($res==1){
   // quantos dias tem o mês
   $days_month = date ("t", mktime (0,0,0,$m,$d,$y));

if ($opcao == 1)
{
   // numero de dias úteis no mês
   for ($day = 01; $day <= $days_month; $day++){
       $diames = $day.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$day,$y)) != 0) && (date("w", mktime (0,0,0,$m,$day,$y)) != 6)) {
                   $days_working = $days_working - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$day,$y)) != 0) && (date("w", mktime (0,0,0,$m,$day,$y)) != 6)) {
             $days_working++;
       }
   }
   return $days_working;
}

if ($opcao == 2)
{
   // numero de dias úteis até a data informada
   for ($days = 01; $days <= $d; $days++){
       $diames = $days.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$days,$y)) != 0) && (date("w", mktime (0,0,0,$m,$days,$y)) != 6)) {
                   $days_working_prev_date = $days_working_prev_date - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$days,$y)) != 0) && (date("w", mktime (0,0,0,$m,$days,$y)) != 6)) {
           $days_working_prev_date++;
       }
   }
   return $days_working_prev_date;
}

if ($opcao == 3)
{

   // numero de dias úteis depois da data informada
   for ($daysm = $d; $daysm <= $days_month; $daysm++){
       $diames = $daysm.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$daysm,$y)) != 0) && (date("w", mktime (0,0,0,$m,$daysm,$y)) != 6)) {
                   $days_working_next_date = $days_working_next_date - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$daysm,$y)) != 0) && (date("w", mktime (0,0,0,$m,$daysm,$y)) != 6)) {
           $days_working_next_date++;
       }
   }
   return $days_working_next_date;
}
} else {
   echo "Data informada não é válida!!!";
}
}
function calcula_hora($inicio,$fim) {
    // Array[0] = total in minutes ...
    // Array[1] = total in hours ...
    // Array[2] = total in seconds ...
    // Array[3] = return total hour:minute:sec ...

    if (!is_array($inicio)) { $inicio = explode(":",$inicio); }
    if (!is_array($fim)) { $fim = explode(":",$fim); }

    $time_inicio    = (($inicio[0]*60)*60) + ($inicio[1]*60) + $inicio[2];
    $time_fim        = (($fim[0]*60)*60) + ($fim[1]*60) + $fim[2];

    $t[0] = floor(($time_fim - $time_inicio) / 60);
    $t[1] = floor((($time_fim - $time_inicio) / 60) / 60);
    $t[2] = $time_fim - $time_inicio;

    $h = $t[1];
    $m = $t[0] - ($t[1]*60);
    if ($m < 10) $m = "0$m";
    $s = $t[2] - (($h*60) + $m) * 60;
    if ($s < 10) $s = "0$s";
    $t[3] = "$h:$m:$s";
    return $t;
}
FUNCTION calcula_dif_hora($inicio,$fim,$data,$dataf) {
	if (!is_array($inicio)) {
	     $inicio = explode(":",$inicio);
	}
	if (!is_array($fim)){
	    $fim = explode(":",$fim);
	}
	if (!is_array($data)){
	    if (strstr("-",$data{4})){
		 $data = explode("-",$data);
	    }
	    else if (strstr("-",$data{2}))
	    {
		 $aux = explode("-",$data);
		 $data = array ($aux[2],$aux[1],$aux[0]);
	    }
	} else {
	    if (strlen($data[0]) == 2){
		 $data = array ($data[2],$data[1],$data[0]);
	    }
	}
	if (!is_array($dataf)){
	  if (strstr("-",$dataf{4})){
		$dataf = explode("-",$dataf);
	  } else if (strstr("-",$dataf{2})){
		$aux2 = explode("-",$dataf);
		$dataf = array ($aux2[2],$aux2[1],$aux2[0]);
	  }
	} else {
	      if (strlen($dataf[0]) == 2){
		  $dataf = array ($dataf[2],$dataf[1],$dataf[0]);
	      }
	}

	$time_inicio    = (($inicio[0]*60)*60) + ($inicio[1]*60) + $inicio[2];
	$time_fim        = (($fim[0]*60)*60) + ($fim[1]*60) + $fim[2];
	$t[0] = floor(($time_fim - $time_inicio) / 60);
	$t[1] = floor((($time_fim - $time_inicio) / 60) / 60);
	$h = $t[1];
	$m = $t[0] - ($t[1]*60);
	if ($data[0] != $dataf[0]) {
		 $aux2 = ($dataf[0] - $data[0])*365;
		 $valor = $valor+$aux2;
	}
	if ($data[1] != $dataf[1]){
		 $aux2 = ($dataf[1]-$data[1])*30;
		 $valor = $valor+$aux2;
	}
	if ($data[2] != $dataf[2]) {
		 $aux2 = $dataf[2]-$data[2];
		 $valor = $valor+$aux2;
	}
	$t[1] = $t[1]+$valor*24;  //$valor = numero de dias a mais
	if ($h < 0) {
	    $h=$t[1];
	}
	if ($h < 10) $h = "0$h";
	if ($m < 10) $m = "0$m";
	$dif="$h:$m";
    $minutos = ($h*60) + $m;
    return $minutos;
}

function soma_hora($hora, $segundos)
{
   $hora=explode(":","$hora");
   $h=$hora[0];
   $m=$hora[1];
   $s=$hora[2];
   $hora_alterada = date("H:i", mktime($h, $m, $s+$segundos));
   return $hora_alterada;
}
?>
