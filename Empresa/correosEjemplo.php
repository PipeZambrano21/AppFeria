<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        EmailJS!
    </title>
    </meta>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </link>
</head>

<body>
    <div id="app" style="padding-top: 8rem;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Destino:
                    </label>
                    <input class="form-control" type="text" v-model="nombre_destino">
                    </input>
                </div>
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Correo:
                    </label>
                    <input class="form-control" type="email" v-model="email">
                    </input>
                </div>
                <div class="col-sm-6 col-sm-offset-3 form-group">
                    <label>
                        Mensaje:
                    </label>
                    <textarea class="form-control" v-model="message">
                        </textarea>
                </div>
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <button @click="enviar" class="btn btn-success">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js">
    </script>
    <script src="https://cdn.emailjs.com/dist/email.min.js" type="text/javascript">
    </script>
    <script>
        (function() {
            emailjs.init("user_S0nUbTMeFjFkFtpnbwgk9");
        })();
        const vue = new Vue({
            el: '#app',
            data() {
                return {
                    nombre_destino: '',
                    email: '',
                    message: '',
                }
            },
            methods: {
                enviar() {
                    let data = {
                        nombre_destino: this.nombre_destino,
                        email: this.email,
                        message: this.message,
                    };

                    emailjs.send("service_99n9rjg", "template_6xpna2m", data)
                        .then(function(response) {
                            if (response.text === 'OK') {
                                alert('El correo se ha enviado de forma exitosa');
                            }
                            console.log("SUCCESS. status=%d, text=%s", response.status, response.text);
                        }, function(err) {
                            alert('Ocurrió un problema al enviar el correo');
                            console.log("FAILED. error=", err);
                        });
                }   
            }
        });
    </script>
</body>

</html>