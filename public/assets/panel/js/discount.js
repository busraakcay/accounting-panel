//Discount Design
function changeDiscountFunc() {
    var select_discount_status = $("#discount_type").val();
    var select_discount_sub_status = $("#discount_sub_type").val();

    if (select_discount_status == 1) {
        $("#category").hide();
        $("#discount_rate").show();
    } else if (select_discount_status == "indirim") {
        $("#category").hide();
        $("#discount_rate").show();
    } else if (select_discount_status == "1alana1bedava") {
        $("#discount_rate").hide();
    }

    if (select_discount_sub_status == "default") {
        $("#category").hide();
        $("#products").hide();
        $("#price_discount").hide();
        $("#cargo").hide();
        $("#cargo_name").hide();
        $("#discount_code").hide();
    } else if (select_discount_sub_status == "6") {
        $("#category").hide();
        $("#products").hide();
        $("#price_discount").hide();
        $("#cargo").hide();
        $("#cargo_name").hide();
        $("#discount_code").hide();
    } else if (select_discount_sub_status == "1") {
        $("#category").show();
        $("#products").hide();
        $("#price_discount").hide();
        $("#cargo").hide();
        $("#cargo_name").hide();
        $("#discount_code").hide();
    } else if (select_discount_sub_status == "2") {
        $("#category").hide();
        $("#products").show();
        $("#price_discount").hide();
        $("#cargo").hide();
        $("#cargo_name").hide();
        $("#discount_code").hide();
    } else if (select_discount_sub_status == "3") {
        $("#products").hide();
        $("#category").hide();
        $("#price_discount").show();
        $("#cargo").hide();
        $("#cargo_name").hide();
        $("#discount_code").hide();
    } else if (select_discount_sub_status == "4") {
        $("#products").hide();
        $("#category").hide();
        $("#price_discount").hide();
        $("#cargo").show();
        $("#cargo_name").show();
        $("#discount_code").hide();
    } else if (select_discount_sub_status == "5") {
        $("#products").hide();
        $("#category").hide();
        $("#price_discount").hide();
        $("#cargo").hide();
        $("#cargo_name").hide();
        $("#discount_code").show();
    }
}
$(function() {
    $(".selectpicker").selectpicker();
});

//Discount Active-Passive
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(function() {
    const ajaxOptions = {
        type: "GET",
        dataType: "json",
        url: $("#ajax_discount_url").val(),
    };
    const toggleInputElement = $(".js-toggle-class-discount");

    toggleInputElement.on("change", function() {
        const element = $(this);
        const discount_status = element.prop("checked") ? 0 : 1;
        const discount_id = element.data("id");
        $.ajax({
            ...ajaxOptions,
            data: { discount_id, discount_status },
            success: (data) => {
                $(element).prop("checked", discount_status);
            },
        });
    });
});

//Discount Name Search
$(document).ready(function() {
    fetch_customer_data();

    function fetch_customer_data(query = "") {
        $.ajax({
            url: $("#ajax_search_discount").val(),
            method: "GET",
            data: { query: query },
            dataType: "JSON",
            success: function(data) {
                var x = 1;

                data.forEach(function(currentData) {
                    if (
                        $("#catselect").val() != currentData.category_id &&
                        $("#catselect").val() != 0
                    ) {
                        return;
                    }
                    $(".product").append(
                        `<tr>
                       <td>${x}</td>
                      <td><img src="../../../uploads/products/${currentData.product_img}" width=50 height=50"></td>
                      <td>${currentData.product_name}</td>
                      <td>${currentData.product_code}</td>
                      <td><a id="add_product_${currentData.product_id}"><i style='color: green' class='fas fa-plus'></i></a></td>
                      </tr>
                       `
                    );
                    $("#add_product_" + currentData.product_id).click(function(
                        evt
                    ) {
                        $(".added_product").append(
                            `<tr id="added_product_${currentData.product_id}">
                        <td>${currentData.product_name} <input type=hidden name="product[]" value=${currentData.product_id}></td>
                        <td><a id="remove_product_${currentData.product_id}"><i style='color: red' class="fas fa-minus-circle"></i></a></td>
                      </tr>`
                        );

                        $("#remove_product_" + currentData.product_id).click(
                            function(evt) {
                                $(
                                    "#added_product_" + currentData.product_id
                                ).remove();
                            }
                        );
                    });
                    x++;
                });
            },
        });
    }

    var timeout = null;
    $("#catselect").change(function() {
        $(".product").empty();
        fetch_customer_data($("#search_product_name").val());
    });
    $(document).on("keyup", "#search_product_name", function() {
        var query = $(this).val();
        if ($(this).val().length < 4) {
            return;
        }
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            $(".product").empty();
            fetch_customer_data(query);
        }, 500);
    });
});

//Discount Code Search
$(document).ready(function() {
    fetch_customer_data();

    function fetch_customer_data(query = "") {
        $.ajax({
            url: $("#ajax_search_discount_code").val(),
            method: "GET",
            data: { query: query },
            dataType: "JSON",
            success: function(data) {
                var x = 1;

                data.forEach(function(currentData) {
                    if (
                        $("#catselect").val() != currentData.category_id &&
                        $("#catselect").val() != 0
                    ) {
                        return;
                    }
                    $(".product").append(
                        `<tr>
                     <td>${x}</td>
                    <td><img src="../../../uploads/products/${currentData.product_img}" width=50 height=50"></td>
                    <td>${currentData.product_name}</td>
                    <td>${currentData.product_code}</td>
                    <td><a id="add_product_${currentData.product_id}"><i style='color: green' class='fas fa-plus'></i></a></td>
                    </tr>
                     `
                    );
                    $("#add_product_" + currentData.product_id).click(function(
                        evt
                    ) {
                        $(".added_product").append(
                            `<tr id="added_product_${currentData.product_id}">
                      <td>${currentData.product_name} <input type=hidden name="product[]" value=${currentData.product_id}></td>
                      <td><a id="remove_product_${currentData.product_id}"><i style='color: red' class="fas fa-minus-circle"></i></a></td>
                    </tr>`
                        );
                        $("#remove_product_" + currentData.product_id).click(
                            function(evt) {
                                $(
                                    "#added_product_" + currentData.product_id
                                ).remove();
                            }
                        );
                    });
                    x++;
                });
            },
        });
    }

    var timeout = null;
    $("#catselect").change(function() {
        $(".product").empty();
        fetch_customer_data($("#search_product_code").val());
    });
    $(document).on("keyup", "#search_product_code", function() {
        var query = $(this).val();
        if ($(this).val().length < 4) {
            return;
        }
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            $(".product").empty();
            fetch_customer_data(query);
        }, 500);
    });
});