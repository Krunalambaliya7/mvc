var Base = function(){

};

Base.prototype = {

	url : null,
	params : {},
	method : 'post',

	setUrl : function(url){
		this.url = url;
		return this;
	},

	getUrl : function(){
		return this.url;
	},

	setMethod : function(method){
		this.method = method;
		return this;
	},

	getMethod : function(){
		return this.method;
	},

	setParams : function(params){
		this.params = params;
		return this;
	},

	getParams : function(key){
		if (typeof key == 'undefined') {
			return this.params;
		}
		if (typeof this.params[key] == 'undefined') {
			return null;
		}
		return this.params;
	},

	addParam : function(key,value){
		this.params[key] = value;
		return this;
	},

	removeParam : function(key){
		if (typeof this.params[key] != 'undefined') {
			delete this.params[key];
		}
		return this;
	},

	resetParams : function(){
		this.params = {};
		return this;
	},

	load : function() {
		var request = $.ajax({
			method : this.getMethod(),
			url : this.getUrl(),
			data : this.getParams(),
			success : function(response){
				$.each(response.element,function(i,element){
					$(element.selector).html(element.html);
				});
			}
		});
	},

	setForm : function() {
		var id = '#'+$('form').attr('id');
		this.setParams($(id).serializeArray());
		this.setMethod($(id).attr('method'));
		this.setUrl($(id).attr('action'));
		this.load();
	},

	remove : function(obj) {
		$(obj).parent().parent().remove();
	},

	add : function() {
		var newTr = $('#newTable').children().children().clone();
		$('#oldTable').prepend(newTr);
	},

	setCms : function(){
		var id = '#'+$('form').attr('id');
		cmsContent = CKEDITOR.instances['Cms[content]'].getData();
		this.setParams($(id).serializeArray());
		this.setMethod($(id).attr('method'));
		this.setUrl($(id).attr('action'));

		$.each(this.params,function(i,val){
			if(val['name']=='Cms[content]'){
				val['value'] = cmsContent;
			}
		});
		return this;
	}

}

