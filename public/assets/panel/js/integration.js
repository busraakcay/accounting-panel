$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(function() {
    const ajaxOptions = {
        type: "GET",
        dataType: "json",
        url: $("#ajax_integration_url").val(),
    };
    const toggleInputElement = $(".js-toggle-class-integration");

    toggleInputElement.on("change", function() {
        const element = $(this);
        const status = element.prop("checked") ? 0 : 1;
        const shop_id = element.data("id");
        $.ajax({
            ...ajaxOptions,
            data: { shop_id, status },
            success: (data) => {
                $(element).prop("checked", status);
            },
        });
    });
});

//Integration Select Status
function changeIntegraitonFunc() {
    var select_integration_status = $("#shop_type").val();

    if (select_integration_status == 0) {
        $("#api_key").hide();
        $("#api_password").hide();
        $("#user_name").hide();
        $("#user_password").hide();
        $("#merchant_name").hide();
        $("#merchant_id").hide();
        $("#api_secret").hide();
    }
    if (select_integration_status == 1) {
        $("#api_key").show();
        $("#api_password").show();
        $("#user_name").hide();
        $("#user_password").hide();
        $("#merchant_name").hide();
        $("#merchant_id").hide();
        $("#api_secret").hide();
    } else if (
        select_integration_status == 2 ||
        select_integration_status == 3 ||
        select_integration_status == 4
    ) {
        $("#user_name").show();
        $("#user_password").show();
        $("#merchant_id").show();
        $("#api_key").hide();
        $("#api_password").hide();
        $("#merchant_name").hide();
        $("#api_secret").hide();
    }
}