window.preview = function (input) {
    var archivoInput = document.getElementById('archivoImagen');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.png|.jpg)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Asegurese de haber seleccionado una imagen');
            archivoInput.value = '';
            return false;
        }
        
        else
        {
            if (input.files && input.files[0]) {
                $(input.files).each(function () {
                    var reader = new FileReader();
                    reader.readAsDataURL(this);
                    reader.onload = function (e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                        "<img id=imagen class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='margin-left:1rem' width='110' height='90'>" +
                        "<span class=\"remove\"> X </span>" +
                        "</span>").insertAfter("#visorImagen");
                        $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                        document.getElementById("archivoImagen").value = "";
                        });
                    }
                });
            }
        }
    }

   
