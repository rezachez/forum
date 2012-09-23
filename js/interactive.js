jQuery(function(){
    $('.comments').tooltip({
        placement: 'bottom'
    });
    $('#redactor_content').redactor({
        imageUpload: './upload.php',
        imageGetJson: false
    });
});