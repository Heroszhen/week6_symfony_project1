$("#oneproduct button.btnproduct").click(function(){
    let productid = $(this).attr("data-product");
    $.get(
        "/addproductinbasket/"+productid,
        function (response) {
            document.location.reload(true);
        }
    );
});


$("input.image").change(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            //lire le contenu de fichiers de façon asynchrone
            var reader = new FileReader();
            reader.fileName = input.files[0].name
            reader.onload = function (e) {
                //$(".showimagefile img").attr('src',e.target.fileName);
                $(".showimagefile img").attr('src',e.target.result);
            }
            //démarrer la lecture du contenu pour le blob indiqué
            reader.readAsDataURL(input.files[0]);
        }
    }
    readURL(this);
});


$("#adminnav .btnsvg svg").click(function(){
    if($('.admin .theadminnav').css('width') == "30px")$('.admin .theadminnav').css('width','200px');
    else $('.admin .theadminnav').css('width','30px')
});