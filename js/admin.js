$( document ).ready(function() {
	//Initialize
	$('.add-form').initialize();
	//Add
    $('.add-form').addThis();
	//Update
	$('.item').updateThis();
	//Delete
	$('.item .delete').deleteThis();
	//Linky
	$('.item .linky').click(function(e){
		e.preventDefault();
		window.open($(this).attr('href'));
	});
});

(function($){
  $.fn.initialize = function() {
	$(this).find('.title').focus(function() { 
		if($(this).val() == 'Enter the title here...') $(this).val('');
	}).blur(function() {
		if($(this).val() == '') $(this).val('Enter the title here...');
	});
	$(this).find('textarea').autosize();
	$(this).find('textarea').focus(function() { 
		if($(this).val() == 'Enter the content here...') $(this).val('');
	}).blur(function() {
		if($(this).val() == '') $(this).val('Enter the content here...');
	});
  }; 
})(jQuery);

(function($){
  $.fn.addThis = function() {
	$(this).find('.cancel').click(function(e){
		e.preventDefault();
		$('.add-form').trigger('reset');
	});
	$(this).submit(function(e){
		e.preventDefault();
		//var formData = new FormData($(this)[0]);
		
		$('.subtract').css({'display': 'block', 'height': $(this).height() + 'px', 'margin-top': '-' + $(this).height() + 'px'});
		$('.subtract').animate({'opacity': 1}, 250);
		
		$(this).ajaxSubmit({
			url: 'addnews.php',
			iframe: true,
        	type: 'POST',
			success: function(data){
			  alert(data);
			  $.get('lastnews.php', function(response){
				$('.item .delete').unbind('click');
				$('.item').unbind('click');
				$('.add-form').trigger('reset');
			    $('.subtract').animate({'opacity': 0}, 250);
			    $('.subtract').css('display', 'none');
				$('.add').after(response);
				$('.item .delete').deleteThis();
				$('.item').updateThis();
			  });
			},
			error: function(){
			  alert('An error occured. Please refresh the page and try again.');
			}
		});
		
		/*$.ajax({
			url: 'addnews.php',
			data: formData,
			type: 'POST',
			async: false,
			success: function(data){
			  alert(data);
			  $.get('lastnews.php', function(response){
				$('.item .delete').unbind('click');
				$('.item').unbind('click');
				$('.add-form').trigger('reset');
			    $('.subtract').animate({'opacity': 0}, 250);
			    $('.subtract').css('display', 'none');
				$('.add').after(response);
				$('.item .delete').deleteThis();
				$('.item').updateThis();
			  });
			},
			cache: false,
			contentType: false,
			processData: false
		});	*/
	});
  }; 
})(jQuery);

(function($){
  $.fn.updateThis = function() {
	$(this).click(function(e){
		e.preventDefault();
		if(e.target.className == 'delete' || e.target.className == 'fa fa-close' || e.target.className == 'linky' || e.target.className == 'fa fa-external-link-square') return;
		var $theForm = $('<div class="add">' + $('.add').html() + '</div>');
		var theItem = this;
		$('.add').animate({'opacity': 0}, 250, function(){
			$(this).removeClass('add').addClass('hidden');
			var id;
			
			$('.item').unbind('click');
			$('.item .delete').unbind('click');
			
			$.get('idnews.php?id='+$(theItem).attr('id'), function(response){
				var news = jQuery.parseJSON(response);
				id = news.id;
				$theForm.find('.title').val(news.title);
				$theForm.find('.content').val(news.content);
				$theForm.find('.imagery').append('<img src="../../uploads/' + news.image + '" />').attr('href', '../../uploads/' + news.image);
				$theForm.initialize();
				$(theItem).addClass('hiddenitem').after($theForm);
				$theForm.find('.cancel').click(function(){
					$theForm.remove();
					$('.hidden').removeClass('hidden').addClass('add').animate({'opacity': 1}, 250);	
					$('.hiddenitem').removeClass('hiddenitem');
					$('.item').updateThis();
					$('.item .delete').deleteThis();
				});
			});
			
			$theForm.find('.add-form').submit(function(e){
				e.preventDefault();
				//var formData = new FormData($(this)[0]);
				//formData.append('id', id);
				
				$('.subtract').css({'display': 'block', 'height': $(this).siblings('form').height + 'px'});
				$('.subtract').animate({'opacity': 1}, 250);
		
				$(this).ajaxSubmit({
					url: 'updatenews.php',
					data: { id: id},
					iframe: true,
					type: 'POST',
					success: function(data){
					  alert(data);
					  $.get('lastnews.php', function(response){
						$theForm.remove();
						$('.hidden').removeClass('hidden').addClass('add').animate({'opacity': 1}, 250);
					 	$('.add-form').trigger('reset');
						$('.hiddenitem').remove();
						$('.subtract').animate({'opacity': 0}, 250);
						$('.subtract').css('display', 'none');
						$('.add').after(response);
						$('.item .delete').deleteThis();
						$('.item').updateThis();
					  });
					},
					error: function(){
					  alert('An error occured. Please refresh the page and try again.');
					}
				});
				
				/*$.ajax({
					url: 'updatenews.php',
					data: formData,
					type: 'POST',
					async: false,
					success: function(data){
					  alert(data);
					  $.get('lastnews.php', function(response){
						$theForm.remove();
						$('.hidden').removeClass('hidden').addClass('add').animate({'opacity': 1}, 250);
					 	$('.add-form').trigger('reset');
						$('.hiddenitem').remove();
						$('.subtract').animate({'opacity': 0}, 250);
						$('.subtract').css('display', 'none');
						$('.add').after(response);
						$('.item .delete').deleteThis();
						$('.item').updateThis();
					  });
					},
					cache: false,
					contentType: false,
					processData: false
				});*/
			});
		});
	});
  }; 
})(jQuery);

(function($){
   $.fn.deleteThis = function() {
      $(this).click(function(e){
		e.preventDefault();
		if(confirm('Are you sure you want to delete this? This cannot be undone.')){
			var thisItem = this;
			$.ajax({
				url: 'deletenews.php',
				data: {'id': $(this).attr('id')},
				type: 'POST',
				success: function(data){
				  $(thisItem).parent().fadeOut(250).remove();
				},
				error: function(){
				  alert('An error occured. Please refresh the page and try again.');
				}
			});
		}
	  });
   }; 
})(jQuery);