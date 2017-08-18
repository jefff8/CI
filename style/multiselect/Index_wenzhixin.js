
$(function () {

    $('#sel_search_orderstatus').multipleSelect();

    $('#sel_search_orderstatus2').multipleSelect();

    $('#sel_search_orderstatus3').multipleSelect({
        placeholder: "请选择"
    });

    $('#sel_search_orderstatus4').multipleSelect({
        placeholder: "请选择",
        single: true
    });

    $('#sel_search_orderstatus5').multipleSelect({
        placeholder: "请选择",
        filter: true
    });
})
