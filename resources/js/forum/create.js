$('.btn-post-type').click(function() {
    $('.btn-selected').removeClass('btn-selected');
    $(this).addClass('btn-selected');
    $('#input-hidden-post-type').val($(this).html());
});

$('#tags').select2({
    placeholder: "Add post tags here..."
});
