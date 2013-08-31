Dropbox = {};
//if (!window.location.origin){ window.location.origin = window.location.protocol+"//"+window.location.host + "/"; }

Dropbox.init = function(){
	var elf = $("#file-uploader").elfinder("instance"); 
	var thDirPath = '';
	var thSelected = {};
	var thRemoved = {};
	var thAjax = function(action, dt){
		$.ajax({ type: "GET", 
<<<<<<< HEAD:store/js/dropbox.js
				url: window.location.protocol + "//" + window.location.host + "/store/dropbox/" + action,
=======
				url: window.location.protocol + "//" + window.location.host + "/index.php?r=dropbox/" + action,
>>>>>>> d750aaa2c011b8cf18ecd23976bdd13a6feeaa81:js/dropbox.js
				data : dt,
				success : function(text)
				{
					response = text;
					console.log(response);
				}
		});	
	}
	elf.bind( "upload", 
		function(event){
			console.log("upload to dropbox"); 
			var files = {};
			$.each(event.data.added, function(key, value) {
				files[key] = {};
				files[key].path = thDirPath + '/' + value.name;
				files[key].mime = value.mime;
			});
			console.log(files); 
			thAjax('upload', { file: files });
		});
		
	elf.bind( "open", 
		function(event){
			console.log("open event"); 
			thDirPath =event.data.options.path; //.replace(/Dropbox\/?/,'');
			console.log(thDirPath);
			thAjax('download', { dir: thDirPath });
		});
		
	elf.bind( "select", 
		function(event, el){
			//console.log("select files"); 
			//console.log(event.data); 
			var selected = event.data.selected;
			if (selected.length) {
				$.each(event.data.selected, function(key, value) {
					try{
						thSelected[key] = thDirPath + '/' + el.file(value).name;
					}catch(e){}
				});
			}
			//console.log(thSelected); 
		});
	elf.bind( "remove", 
			function(event){
				thRemoved = $.extend({}, thSelected);
				console.log("remove from dropbox"); 
				console.log(event); 
				console.log(thRemoved); 
				if( !event.data.added ){
					thAjax('remove', { file: thRemoved });
				}
			});

	elf.bind( "duplicate", 
		function(event){
				console.log("duplicate file"); 
				console.log(event); 
				console.log(thSelected); 
			var files = {};
			
			$.each(event.data.added, function(key, value) {
				files[key] = {};
				files[key].path = thDirPath + '/' + value.name;
				files[key].mime = value.mime;
			});
			//console.log(files); 
			//thAjax('upload', { file: files });
		});

	elf.bind( "paste", 
		function(event){
				console.log("paste file"); 
				console.log(event); 
				console.log(thSelected); 
			var files = {};
			
			$.each(event.data.added, function(key, value) {
				files[key] = {};
				files[key].path = thDirPath + '/' + value.name;
				files[key].mime = value.mime;
			});
			//console.log(files); 
			thAjax('upload', { file: files });
		});

	elf.bind( "change", 
		function(event){
				console.log("change file"); 
				console.log(event); 
				//console.log(thSelected); 
			var files = {};
			
			$.each(event.data.changed, function(key, value) {
				files[key] = {};
				files[key].path = thDirPath + '/' + value.name;
				files[key].mime = value.mime;
			});
			//return;
			console.log(files); 
			thAjax('upload', { file: files });
		});

	elf.bind( "add", 
		function(event){
				console.log("added file"); 
				console.log(event); 
				console.log(thSelected); 
			var files = {};
			
			$.each(event.data.added, function(key, value) {
				files[key] = {};
				files[key].path = thDirPath + '/' + value.name;
				files[key].mime = value.mime;
			});
			console.log(files);
			//upload if create new file/dir
			if( !event.data.removed ){ 
				thAjax('upload', { file: files });
			}
		});
		
	elf.bind( "rename", 
		function(event, el){
				console.log("rename file"); 
				console.log(event); 
			var files = {}; files.old = {}; files.renew = {};
			files.renew.path = thDirPath + '/' + event.data.added[0].name;
			files.renew.mime = event.data.added[0].mime;
			files.old.path = thRemoved[0];
			files.old.mime = files.renew.mime;
			console.log(files); 
			thAjax('rename', { file: files });
		});
		return 'ok';
}