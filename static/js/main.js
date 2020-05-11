$(".delete-button").click(function(){
    var id = this.id;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "handleDelete.php?id="+id, true);
    xmlhttp.send();
    $(this).parent().remove();

});