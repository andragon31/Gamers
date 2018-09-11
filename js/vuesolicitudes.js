var urlmensajes = 'https://localhost:8080/GCCHAT/php/solicitudesretos.php';
new Vue({
    el: '#solicitudes',
    created: function() {
        //this.getmensajes();
        this.traerdatos();
        //this.buscarusuario();
        //this.timer = setInterval(this.traerdatos, 1000);
        //this.timer = setInterval(this.buscarusuario, 1000);
        //this.timer = setInterval(this.enviarmensaje, 1000);
    },
    data: {
        timer:'',
        datos: 'datos',
        mensajejson: [],
        mensajes: [],
        name: '',
        idretador:'',
    },
    methods: {
        traerdatos: function(datos)
        {
            this.$http.post('php/solicitudesderetos.php',{
                datos: this.datos
            }).then(function(response){
                this.mensajejson = response.data;
            }, function(){
                alert("error");
            });
        },
        enviarrespuesta: function()
        {
            console.log(this.idretador);
        }

    },
    computed: 
    {
        buscarusuario: function () 
        {
            return this.mensajejson.filter((item) => item.NombreUsuario.toLowerCase().includes(this.name.toLowerCase()));
        }
    }
});