    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <!-- Jasny -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>
    <!-- CodeMirror -->
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
    <!-- SUMMERNOTE PARA TEXTAREAEDITOR-->
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
    </script>

    <!-- Bootstrap markdown para textarea-->
    <script src="js/plugins/bootstrap-markdown/bootstrap-markdown.js"></script>
    <script src="js/plugins/bootstrap-markdown/markdown.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });
        });
    </script>
    <script>
        function edit(id){
            window.location.href = window.location.pathname + '?edit=' + id;
        }
        function add(){
            window.location.href = window.location.pathname + '?add=1';
        }
        function dele(id){
            var baseUrl = window.location.protocol + "//" + window.location.host + "/";
            window.location.href = baseUrl + "Bienestar/Acciones/<?php echo $tabla;?>.php" + '?delete=' + id + "&<?php echo $tabla."=".$tabla;?>";
        }
        function exit(){
            var baseUrl = window.location.protocol + "//" + window.location.host + "/";
            window.location.href = baseUrl + "Bienestar/<?php echo $tabla;?>";
        }
        function view(id){
            window.location.href = window.location.pathname + '?view=' + id;
        }
        function menu(nombre){
            var baseUrl = window.location.protocol + "//" + window.location.host + "/";
            window.location.href = baseUrl + "Bienestar/" + nombre;
        }


        Dropzone.options.dropzoneForm = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
        };

        $(document).ready(function(){

            var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
                lineNumbers: true,
                matchBrackets: true
            });

            var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
                lineNumbers: true,
                matchBrackets: true
            });

       });

        function subirImagen() {
            var fileInput = document.getElementById('foto');
            var archivo = fileInput.files[0];
            var formData = new FormData();
            formData.append('imagen', archivo);
            $.ajax({
                url: 'Acciones/API.php',  // Reemplaza con la ruta correcta de tu script PHP
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    mensajeDiv.innerHTML = response;
                },
                error: function(error) {
                    console.error('Error al subir la imagen:', error);
                    mensajeDiv.innerHTML = "Hubo un error al subir la imagen.";
                }
            });
        }
    </script>
<?php include "conexion/Cerrar_Conexion.php"; ?>