$(document).ready(function() {
    dragging_elements();
});

function dragging_elements() {
    $(function() {
        // drag
        $("#draggable-elements li").draggable({
            revert: "true",
            helper: "clone",
            handle: ".move",
            connectToSortable: "#dragndropT1 , #dragndropT2 ,#dragndropT3 ,#dragndropT4"
        });

        $(".dragndropT1").sortable({
            handle: ".move"
        }).droppable({
            accept: '.element',
            activeClass: 'highlight'
        });
        // remove element
        $('.dragdrop-field').on('click', '.close', function() {
            $(this).closest('.element').fadeOut("slow");
        });
    });
}