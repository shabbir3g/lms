


  $(document).ready(function(){



  $(".commentList").animate({ scrollTop: 100000 }, "slow");



  	$("form#chatmessage").submit(function(){


  	var message = $('form#chatmessage input').val();

	$.ajax({

	  		url 	: '../chat.php',
	  		type 	: 'POST',
	  		data 	: {'chat'	: message},
	  		success : function(data){

	  			$('.sound').html(data);

	  			$('form#chatmessage input').val('');

	  			$(".commentList").animate({ scrollTop: 100000 });

	  		}

	  	});

  		return false;


  	});

  	setInterval(function(){


  		$('#chatdetails ul.commentList').load('../show.php');


  	}, 200);


  });


  function triggerClick(){

	document.querySelector('#book_image').click();

}

function displayImage(e){
	if(e.files[0]){

		var reader = new FileReader();

		reader.onload = function(e){

			document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
		}

		reader.readAsDataURL(e.files[0]);

	}
}


function triggerupClick(e) {
  document.querySelector('#profileupImage').click();
}
function displayupImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileupDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}




  $('.titleBox .close').click(function(){

	$('.actionBox').slideToggle();

});






