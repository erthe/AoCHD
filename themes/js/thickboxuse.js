// use to thickbox

// common function
// close thickbox
$("#closetb").click(function() {
    tb_remove();
});

// admin function
// edit function
// conversion md5
$("#md5").click(function() {
    $("*[name=password]").val(MD5(($("*[name=password]").val())));
});