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

$("#onearticle .content form[name='comment']").submit(function(e){
    e.preventDefault();
    var articleid = $(this).attr("data-article");
    var formSerialize = $(this).serialize();
    let name = $($(this)[0][0]).val();
    let comment = $($(this)[0][1]).val();
    $.post(
        "/blog/article/addonecomment/"+articleid,
        formSerialize,
        function (response) {
            if(response != 0){
                let content = "<div class='onecomment mt-3 pl-3'><strong>"+name+"</strong> <small>"+response+"</small><div class='text-black-50'>"+comment+"</div></div>";                 
                $("#onearticle .content .allcomments").append(content);
            }
        }
    );
});


$("#adminnav .btnsvg svg").click(function(){
    if($('.admin .theadminnav').css('width') == "30px")$('.admin .theadminnav').css('width','200px');
    else $('.admin .theadminnav').css('width','30px')
});