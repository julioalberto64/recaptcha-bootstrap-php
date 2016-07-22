# recaptcha-bootstrap-php

=======================
Formulario de Contacto, Bootstrap 3, con  Google reCaptcha, php

Una forma sencilla de un formulario de php con Boostrap 3 usando [Google's reCAPTCHA](https://developers.google.com/recaptcha/). 
Los mensajes enviados se envían a una dirección de correo electrónico especificada.

El formulario esta creado para N cantidad de campos en el formulario.


## Version History

| Versions | Major Enhancement |
| -------- | ----------------- |
| 1.0      | Primera version - Use PHP, Bootstrap, RecaptchaLIB|


## Dependencies

### PHP
* version > 5.2.0
* [recaptchalib](https://github.com/google/recaptcha/blob/1.0.0/php/recaptchalib.php) (incluir in en el mismo path que el archivo index.php)

### HTML/JS
* [Bootstrap 3](https://github.com/twbs/bootstrap) version >3.1
* jQuery

## Configuración reCAPTCHA

Debe obtener un [Site Key y clave secreta de Google] (http://www.google.com/recaptcha/admin).véase la sección siguiente. 

## Configuración

Configuracion de variables en el archivo index.php

| Nombre                | Descripcio                                                         |
|-------------------- | -------------------------------------------------------------------- |
| $publicKey          | es la llave publica que le dieron el sitio de recaptcha              |
| $secret             | Es la llave secreta que el dieron en el sitio de recaptcha           |
| $to                 | Ingresa el correo que va recibir el email                            |
| $message            | Mensaje que se va a mostrar dependiendo si hay error o no            |


**Tip:** Puedes crear los inputs que quieras y validarlos con html5


## Repositorio

Puedes ver el proyecto en: (https://github.com/julioalberto64/recaptcha-bootstrap-php).

## Demo
Demo: proximanente
