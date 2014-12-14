$(document).ready(function(){
	//$('.notify').scroll();

	$("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });

     $('button[data-dismiss="modal"]').on('click', function(){
     		$('#delete').modal('hide');
     });

});