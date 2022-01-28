$(".btn-acquista").ready(function ($) {
	var value = '@Request.RequestContext.HttpContext.Session["logged"]';
    console.log(value);
}); 
