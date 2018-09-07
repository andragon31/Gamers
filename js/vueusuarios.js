var urlmensajes = 'https://localhost:8080/GCCHAT/php/usuarios.php';
new Vue({
    el: '#usuarios',
    created: function() {
        //this.getmensajes();
        this.traerdatos();
        this.buscarusuario();
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
    },
    methods: {
        traerdatos: function(datos)
        {
            this.$http.post('php/guardarusuario.php',{
                datos: this.datos
            }).then(function(response){
                this.mensajejson = response.data;
            }, function(){
                alert("error");
            });
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