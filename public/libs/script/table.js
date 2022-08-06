document.addEventListener("DOMContentLoaded",function (){
    $(".avatar").click(function (){
        $('.modal').css("display","block")
        $('.modal-content').attr('src',this.src)
    })
    $('.close').click(function (){
        $('.modal').css("display","none")
    })
})