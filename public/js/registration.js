$(document).ready (function(){
    $("#success-alert").hide();

});
$(document).ready (function(){
    $("#error-alert").hide();

});
$(document).ready (function(){
    $("#btn_delete").hide();

});
$(document).ready(function() {
    /**
     * Mise en forme du formulaire 
     * 
    */
    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $("#form_colorid").hide();
    $("#form_carid").hide();
    $("#label_colorid").hide();
    $("#label_carid").hide();

});

/**
 * LISTENER
 * 
 */

$('#form_save').click(function () {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
    setTimeout(Reload, 5000);

})


$('#form_hasdriverlicence').click(function () {
//$('#form_hasdriverlicence').prop('click', function () {
    $("#form_colorid").show();
    $("#form_carid").show();
    $("#label_colorid").show();
    $("#label_carid").show();
})



