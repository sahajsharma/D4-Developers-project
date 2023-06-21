<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
    </head>
</head>
<body>
<div id="editor">
	<p>This is an example editor.</p>
</div>

<button onclick="document.querySelector( '#output' ).innerText = window.editor.getData();">Click to refresh the output below:</button>

<pre id="output"></pre>
</body>

<script>
    function CustomizationPlugin( editor ) {

}

ClassicEditor
	.create( document.querySelector( '#editor' ), {
	extraPlugins: [ CustomizationPlugin ]
} )
	.then( newEditor => {
	window.editor = newEditor;
	// The following line adds CKEditor 5 inspector.
	CKEditorInspector.attach( newEditor, {
		isCollapsed: true
	} );
} )
	.catch( error => {
	console.error( error );
} );
</script>
</html>