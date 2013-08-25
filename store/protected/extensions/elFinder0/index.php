<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" ></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
<script type="text/javascript" src="js/elfinder.min.js"></script>

<!-- Mac OS X Finder style for jQuery UI smoothness theme (OPTIONAL) -->
<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>

<script type="text/javascript" charset="utf-8">
    $().ready(function() {
        var elf = $('#elfinder').elfinder({
            // lang: 'ru',             // language (OPTIONAL)
            url : 'php/connector.php'  // connector URL (REQUIRED)
        }).elfinder('instance');            
        elf.bind( 'search', 
            function(){ 
                console.log('search'); 
            });
    });
</script>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>