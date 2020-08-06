var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){
    /*var btn_product_file_image = document.getElementById('btn_product_file_image');
    var product_file_image = document.getElementById('product_file_image');
    btn_product_file_image.addEventListener('click', function(){
        product_file_image.click();

    }, false);

    product_file_image.addEventListener('change',function(){
        document.getElementById('form_product_gallery').submit();
     
    });*/

   //route_active=document.getElementsByClassName('lk-'+route)[0].classList.add('active');
   btn_deleted = document.getElementsByClassName('btn-deleted');
   for(i=0; i< btn_deleted.length; i++){
       btn_deleted[i].addEventListener('click', delete_object);
   }

});

function delete_object(e){
    e.preventDefault();
    var object = this.getAttribute('data-object');
    var path = this.getAttribute('data-path');
    var url = base + '/' + path + '/' + object +'/delete';
    var url2 = base + '/' + path ;
    
    swal({
        title: "Eliminar registro",
        text: "Confirme si desea eliminar el registro.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = url;
          }
        
      });

}

$(document).ready(function(){
    editor_init('editor');
});

function editor_init(field){

    CKEDITOR.replace(field, {
        toolbar: [
            {   name: 'clipboard', items:['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']},
            {   name: 'basicstyles', items:['Bold','Italic','BulletedList','Strike','Image','Link','Unlink', 'Blockquote']},
            {   name: 'document', items:['CodeSnippet','EmojiPanel','Preview','Source']}
        ]
    });
}