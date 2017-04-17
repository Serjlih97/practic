function showForms()
{
	var forms = $('._login-forms')
	if(forms.hasClass('hidden'))
		forms.removeClass('hidden');
	else
		forms.addClass('hidden');
}
function goToLogin(a)
{
	var form = $(a).parents('.form');
	form.siblings().removeClass('hidden');
	form.addClass('hidden');
}