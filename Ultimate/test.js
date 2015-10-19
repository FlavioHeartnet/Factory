$(document).ready(function() {
    dragging_elements();
});

function dragging_elements(){
    $(function() {
        // drag
        $( "#draggable-elements li" ).draggable({
            revert: "true",
            helper: "clone",
            handle: ".icons-fonts.move",
            connectToSortable: "#dragndrop"
        });
        // sortable and drop
        $( "#dragndrop" ).sortable({
            handle: ".icons-fonts.move"
        }).droppable({
            accept: '.element',
            activeClass: 'highlight'
        });
        // remove element
        $('.dragdrop-field').on('click','.close', function(){
            $(this).closest('.element').fadeOut("slow");
        });
    });
}