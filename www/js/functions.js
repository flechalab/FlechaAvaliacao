$(document).ready( function() {
    $('.ranking-list a').click(function(event){
        event.preventDefault();
        alert('ranking stuff with id ' + $(this).attr('data-id'));
    });
});

function alert(string) {
    $('#myModal .modal-body').html(string);
    $('#myModal').modal('show');
}
