/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// config.uiColor = '#AADC6E';



	// config.extraPlugins = 'filebrowser';
	config.filebrowserBrowseUrl = 'backend/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = 'backend/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = 'backend/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = 'backend/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = 'backend/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = 'backend/kcfinder/upload.php?opener=ckeditor&type=flash';
	// config.filebrowserBrowseUrl = 'backend/ckfinder/browse.php';
	// config.filebrowserUploadUrl = 'backend/ckfinder/upload.php';


	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'lists', groups: [ 'list', 'indent' ] },
		{ name: 'blocks', groups: [ 'blocks', 'align' ] },
		{ name: 'paragraph', groups: [ 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Save,NewPage,Preview,Cut,Copy,Paste,Replace,Find,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,RemoveFormat,Language,Anchor,Flash,Smiley,About';
};

// CKEDITOR.replace( 'ckeditor2', {
// 	filebrowserBrowseUrl: '/plugins/ckfinder/ckfinder.html',
// 	filebrowserUploadUrl: '/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// } );

// var editor = CKEDITOR.replace( 'ckfinder' );
// CKFinder.setupCKEditor( editor );