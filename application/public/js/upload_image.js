$(document).ready(function() {
    $("#inputFile").change(function () {
                    $("#fileUri").val($(this).val());
                });

});

var W3CDOM = (document.createElement && document.getElementsByTagName);

function init() {
    if (!W3CDOM) return;
    var fakeFileUpload = document.createElement('div');
    fakeFileUpload.className = 'fakefile';
    fakeFileUpload.appendChild(document.createElement('input'));
    var image = document.createElement('img');
    image.src='pix/button_select.gif';
    fakeFileUpload.appendChild(image);
    var x = document.getElementsByTagName('input');
    for (var i=0;i<x.length;i++) {
        if (x[i].type != 'file') continue;
        if (x[i].getAttribute('noscript')) continue;
        if (x[i].parentNode.className != 'fileinputs') continue;
        x[i].className = 'file hidden';
        var clone = fakeFileUpload.cloneNode(true);
        x[i].parentNode.appendChild(clone);
        x[i].relatedElement = clone.getElementsByTagName('input')[0];
        if (x[i].value)
            x[i].onchange();
        x[i].onchange = x[i].onmouseout = function () {
            this.relatedElement.value = this.value;
        }
    }
}

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('#userfile').on('change', function() {
      
    var file = $("#userfile").prop("files")[0];
    var fileName = file.name;
    var fileSize = file.size;
    alert("Uploading: "+fileName+" @ "+fileSize+"bytes");

      if (this.files[0].size > 2000000)
      {
        $('#uploadSizeModal').modal('show');
        // if(document.documentMode != null) {
        return false; 
      }
      if (!isImage(this.files[0].name)) {
        $('#uploadTypesModal').modal('show');
        return false;
      }



    });

    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);

        
        } else {
            if( log ) alert(log);
        }
        
    });
});

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'jpeg':
    case 'JPG':
    case 'JPEG':
    case 'png':
    case 'PNG':
    case 'gif':
    case 'GIF':
        //etc
        return true;
    }
    return false;
}
