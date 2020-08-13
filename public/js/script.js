$(document).ready( function () {
    $('.admin .DataTables').DataTable({
        "pageLength": 2
    });
} );

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

$("#mybasket .oneproduct button.modifyquantity").click(function(){
    let operator = $(this).attr("data-operator");
    let span = $(this).parent().find("span");
    let quantity = parseInt(span.text(),10);
    if(operator == "plus")quantity++;
    if(operator == "minus")quantity--;
    if(quantity < 0)quantity = 0;
    span.text(quantity);
});



//admin

$("#adminnav .btnsvg svg").click(function(){
    if($('.admin .theadminnav').css('width') == "30px")$('.admin .theadminnav').css('width','200px');
    else $('.admin .theadminnav').css('width','30px')
});

$(".admin .pagination span").click(function(){
    let page = $(this).attr("data-page");
    page = page * 2;
    let page1 = page - 1;
    let page2 = page1 - 1;
    let trs = $(".admin table tbody tr");
    trs.each(function(i,el){
        if($(el).attr("data-key") == page1 || $(el).attr("data-key") == page2){
            $(el).removeClass("d-none");
        }else{
            $(el).addClass("d-none");
        }
    });
});

$(".admin input#searchbyname").keyup(function(){
    let search = $(this).val();
    let trs = $(".admin table tbody tr");
    trs.addClass("d-none");
    if(search == ""){
        trs.each(function(i,el){
            if($(el).attr("data-key") == 0 || $(el).attr("data-key") == 1){
                $(el).removeClass("d-none");
            }
        });
    }else{
        trs.each(function(i,el){
            let text = $(el).find("td.name").text().toLowerCase()
            if(text.includes(search.toLowerCase())){
                $(el).removeClass("d-none");
            }
        });
    }
    
});