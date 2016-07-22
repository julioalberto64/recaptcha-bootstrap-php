<?php
/**
 * Created by PhpStorm.
 * User: juliomorales
 * Website: http://www.nworldt.net
 * Date: 21/07/16
 * Time: 11:44 PM
 */
// Incluir libreria de recaptcha de Google
require_once "recaptchalib.php";

// tu secret key
$publicKey = "INGRESA TU PUBLIC KEY";
$secret = "INGRESA TU SECRET KEY";


$response = null;

// comprueba la clave secreta
$reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
$showMessage = false;
// Envio de Email
if ($response != null && $response->success) {
    $showMessage = true;
    // a quien se envia el email
    $to = "MI@CORREO";
    // sujeto del email
    $subject = "Contacto";
    // quien envia el correo
    $headers = "From: INFO@SUSITIOWEB" . "\r\n";
    // quito el valor del recaptcha
    unset($_POST["g-recaptcha-response"] );

    $body = '';
    foreach ($_POST AS $key => $value)
    {
        $body .= "{$key}: {$value}\n";
    }
    if (mail($to,$subject,$body,$headers)){
        $error = false;
        $message = 'Enviado con exito';
    }else {
        $error = true;
        $message = 'Error al enviar el email';
    }
} else {
    if ($_POST) {
        $showMessage = true;
        $error = true;
        $message = 'Error al enviar el formulario intente de nuevo';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CONTACTO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://getbootstrap.com/assets/css/docs.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .form-center{
            max-width: 550px;
            padding: 15px 30px 15px 0px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="form-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <?php
                if ($showMessage) {
                    echo !$error?'<div class="bs-example-bg-classes"><p class="bg-success text-center">'.$message.'</p></div>':'';
                    echo $error?' <div class="bs-example-bg-classes"><p class="bg-danger text-center">'.$message.'</p></div>':'';
                }
                ?>

                <h2>CONTACTO</h2>
            </div>

            <form  role="form" action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Nombre" id="name" type="text" name="Nombre" autofocus required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email:</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Email" id="email" type="email" name="Email" autofocus required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label">Telefono:</label>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Telefono" id="phone" type="tel" name="Telefono" autofocus required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="col-sm-4 control-label">Mensaje :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="5" name="comentario" id="comment"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <!--pueden cambiar el lenguaje con el parametro hl-->
                        <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
                        <!--El site key de su sitio-->
                        <div class="g-recaptcha" data-sitekey="<?php echo $publicKey;?>"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-block btn-success">Enviar Formulario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>