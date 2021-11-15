<!DOCTYPE html>
<html>
<head>
    <title>[CONTATO] {{ config('app.name') }}</title>
    <meta charset="utf-8">
</head>
<body>
    <span style='font-weight:bold;font-size:16px;font-family:Verdana;'>Nome:</span> <span style='color:#000;font-size:14px;font-family:Verdana;'>{{ $nome }}</span><br>
    <span style='font-weight:bold;font-size:16px;font-family:Verdana;'>E-mail:</span> <span style='color:#000;font-size:14px;font-family:Verdana;'>{{ $email }}</span><br>
@if($telefone)
    <span style='font-weight:bold;font-size:16px;font-family:Verdana;'>Telefone:</span> <span style='color:#000;font-size:14px;font-family:Verdana;'>{{ $telefone }}</span><br>
@endif
    <span style='font-weight:bold;font-size:16px;font-family:Verdana;'>Mensagem:</span> <span style='color:#000;font-size:14px;font-family:Verdana;'>{{ $mensagem }}</span>
</body>
</html>
