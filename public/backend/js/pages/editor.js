//[editor Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the wysihtml5 Editor 


//Add text editor
$(function () {
  "use strict";

  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('long_description')
  //bootstrap WYSIHTML5 - text editor
  $('#short_description').wysihtml5();

});

