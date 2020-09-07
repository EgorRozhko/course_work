$('document').ready(function(){
	$('body').on('click', '.answer-for-user', function(){
		if ($('#answer-text').val() == '') $('#warning-support').text('Напишите ответ');
		else
		{
			$.ajax({
				url: 'php/answer-for-user.php',
				type: 'POST',
				data: ({ answer_text: $('#answer-text').val(), id_question: this.id }),
				dataType: 'text',
				success: answer_for_user
			});
		}
	});
	function answer_for_user(data){ $(location).attr('href', '../page.php?file=admin-support'); }
});