$("#fileUpload").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#image-holder");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image",
                "width": "250px",
                "height":"250px",
                "border": "none"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }
});

window.onload = function(){
    var valor = $("#image-holder").text();
    if(valor!=null && valor!='')
    {
        var image_holder = $("#image-holder");
        image_holder.empty();
        $("<img />", {
            "src": "http://127.0.0.1:8000/storage/"+valor,
            "class": "thumb-image",
            "width": "250px",
            "height":"250px",
            "border": "none"
        }).appendTo(image_holder);
        image_holder.show();
    }
}
