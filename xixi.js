$(document).ready(function() {
    function alertResponse(responseString){
        dialog(responseString);
    }
    function dialog(str){
        $('#myModal .modal-body').eq(0).html(str);
        $('#myModal').modal('show');
    }
});


