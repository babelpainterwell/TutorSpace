$('#cancel-edit-profile').click(function() {
    window.location.href = "/edit_profile";

})

// The tags should be always be the same as in the school_year table! Need to manully update the fields/array!
$(function () {
    $("#major").autocomplete({
        source: majorTags
    });

    $("#schoolYear").autocomplete({
        source: schoolYearTags
    });
});


$("input[type=file]").change(function() {
    var fileInput = $(this)[0];
    var filename = fileInput.files[0].name;

    $('#file-input-text').html(filename);
});



