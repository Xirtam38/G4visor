<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="<?= $GLOBALS['PathScr'] ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $GLOBALS['PathScr'] ?>css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= $GLOBALS['PathScr'] ?>css/main.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?= $GLOBALS['PathScr'] ?>js/jquery.js"></script>


    <!-- TinyMce JS -->
    <script type="text/javascript" src="<?= $GLOBALS['PathScr'] ?>tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
	selector: "textarea.editor",
	plugins: [
	    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	    "searchreplace wordcount visualblocks visualchars code fullscreen",
	    "insertdatetime media nonbreaking save table contextmenu directionality",
	    "emoticons template paste textcolor colorpicker textpattern"
	],
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	toolbar2: "preview media | forecolor backcolor emoticons",
	theme: "modern"
     });
     function ajaxLoad() {
	var ed = tinyMCE.get('content');

	// Do you ajax call here, window.setTimeout fakes ajax call
	ed.setProgressState(1); // Show progress
	window.setTimeout(function() {
	    ed.setProgressState(0); // Hide progress
	    ed.setContent('HTML content that got passed from server.');
	}, 3000);
    }

    function ajaxSave() {
	var ed = tinyMCE.get('content');

	// Do you ajax call here, window.setTimeout fakes ajax call
	ed.setProgressState(1); // Show progress
	window.setTimeout(function() {
	    ed.setProgressState(0); // Hide progress
	    alert(ed.getContent());
	}, 3000);
    }
    </script>

    <!-- Custom Fonts -->
    <link href="<?= $GLOBALS['PathScr'] ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>