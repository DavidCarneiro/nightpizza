<?php
session_start();
ob_start();
include("configuracao.php");
?>
<!doctype html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<head>
	<script src="../js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" >

    $(document).ready(function(){
                $("#cep").blur(function(){
                        $("#rua").val("...")
                $("#bairro").val("...")
				$("#xd").val("Procurando seu endereço...")
            $("#cidade").val("...")
                $("#uf").val("...")
        
        consulta = $("#cep").val()
                
                $.getScript("http://www.toolsweb.com.br/webservice/clienteWebService.php?cep="+consulta+"&formato=javascript", function(){

                        rua=unescape(resultadoCEP.logradouro)
                        bairro=unescape(resultadoCEP.bairro)
                        cidade=unescape(resultadoCEP.cidade)
                        uf=unescape(resultadoCEP.uf)

                        $("#rua").val(rua)
                        $("#bairro").val(bairro)
                        $("#cidade").val(cidade)
						$("#xd").val('Rua '+rua+', '+bairro+', '+cidade)
                        $("#uf").val(uf)
        
                        });
                });
        });
		
</script>

</head>
    <style type="text/css">
    body {
        background-color:#F9F9F9;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        
    }
    div {
        width: 600px;
        margin: 5em auto;
        padding: 50px;
        background-color:#F9F9F9;
        border-radius: 1em;
    }
    a:link, a:visited {
        color: #38488f;
        text-decoration: none;
    }
    @media (max-width: 700px) {
        body {
            background-color: #fff;
        }
        div {
            width: auto;
            margin: 0 auto;
            border-radius: 0;
            padding: 1em;
        }
    }
    </style>  
	  
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
<div>
<h2><i class="fa fa-map-marker" aria-hidden="true"></i> DIGITE SEU CEP</h2>
    <p>É seu primeiro acesso, verifique a entrega em seu bairro.
	
<form action="" method="post">
<input type="text" name="cep" value="<?=$_SESSION[dv_cep];?>" id="cep" class="form-control" maxlength="8" placeholder="CEP" required /><br />
<input type="text" name="nome" class="form-control" value="<?=$_SESSION[dv_nome];?>" placeholder="Seu nome" required /><br />
<input type="text" name="email" class="form-control" value="<?=$_SESSION[dv_email];?>" placeholder="Seu email" required /><br />
<input name="xd" type="text" id="xd" size="60" disabled="disabled" style="color:#006600;border:thin solid #eaeaea;background-color:#fff;" class="form-control" />



<input name="rua" type="hidden" id="rua" size="60" />
<input name="bairro" type="hidden" id="bairro" style="border:none;border:none;" class="form-control" size="60" />
<input name="cidade" type="hidden" id="cidade" size="60" />
<input type="submit" value="Verificar" name="finalizarq" style="width:100%;margin-bottom:1%;" class="btn btn-danger" />
</form>
<?php
if($_POST['finalizarq']) {
session_start();
ob_start();
$_SESSION['dv_nome'] = $_POST['nome'];
$_SESSION['dv_email'] = $_POST['email'];
$_SESSION['dv_cep'] = $_POST['cep'];

if(!strstr($cfg[bairros], $_POST['bairro'])==TRUE) {
if(empty($_POST[bairro])) { $bairro = "em seu bairro,"; } else { $bairro = "em ".$_POST[bairro].","; }
echo '<script>alert("Não entregamos '.$bairro.' porém você pode visualizar nosso cardápio.");</script>';
echo '<body onload="window.parent.parent.location.reload();"></body>';
$_SESSION[gsw] = 1;
} else {
$_SESSION[gsw] = 1;
echo '<body onload="window.parent.parent.location.reload();"></body>';
}
}
?>
	</p>
</div>
</body>
</html>
