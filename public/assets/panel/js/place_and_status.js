$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(function () {
    const ajaxOptions = {
        type: "GET",
        dataType: "json",
        url: $("#ajax_status_url").val(),
    };
    const toggleInputElement = $(".js-toggle-class-status");

    toggleInputElement.on("change", function () {
        const element = $(this);
        const status = element.prop("checked") ? 1 : 0;
        const id = element.data("id");
        $.ajax({
            ...ajaxOptions,
            data: { id, status },
            success: (data) => {
                $(element).prop("checked", status);
            },
        });
    });
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(function () {
    const ajaxOptions = {
        type: "GET",
        dataType: "json",
        url: $("#ajax_mode_url").val(),
    };
    const toggleInputElement = $(".js-toggle-class-mode");

    toggleInputElement.on("change", function () {
        const element = $(this);
        const mode = element.prop("checked") ? 1 : 0;
        const id = element.data("id");
        $.ajax({
            ...ajaxOptions,
            data: { id, mode },
            success: (data) => {
                $(element).prop("checked", mode);
            },
        });
    });
});

$(function () {
    $("#place").on("focusout", "[name=place]", function (e) {
        var id = $(this).data("id");
        var place = $(this).val();
        $.ajax({
            method: "GET",
            url: $("#ajax_place_url").val(),
            data: {
                id: id,
                place: place,
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                $(".place_loader").remove();
            },
        });
    });
});

function changeBestseller(id, path) {
    $.ajax({
        url: path,
        method: "GET",
        data: {
            id: id,
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            //console.log(data);
            if (data == 1) {
                $("#bestseller" + id).removeClass("btn-danger");
                $("#bestseller" + id).addClass("btn-success");
            } else {
                $("#bestseller" + id).removeClass("btn-success");
                $("#bestseller" + id).addClass("btn-danger");
            }
        },
    });
}

function changeShowcase(id, path) {
    $.ajax({
        url: path,
        method: "GET",
        data: {
            id: id,
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            //console.log(data);
            if (data == 1) {
                $("#showcase" + id).removeClass("btn-danger");
                $("#showcase" + id).addClass("btn-success");
            } else {
                $("#showcase" + id).removeClass("btn-success");
                $("#showcase" + id).addClass("btn-danger");
            }
        },
    });
}

function changeNewproduct(id, path) {
    $.ajax({
        url: path,
        method: "GET",
        data: {
            id: id,
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            //console.log(data);
            if (data == 1) {
                $("#newproduct" + id).removeClass("btn-danger");
                $("#newproduct" + id).addClass("btn-success");
            } else {
                $("#newproduct" + id).removeClass("btn-success");
                $("#newproduct" + id).addClass("btn-danger");
            }
        },
    });
}

function changeBestCategory(id, path) {
    $.ajax({
        url: path,
        method: "GET",
        data: {
            id: id,
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            //console.log(data);
            if (data == 1) {
                $("#bestCategory" + id).removeClass("btn-danger");
                $("#bestCategory" + id).addClass("btn-success");
            } else {
                $("#bestCategory" + id).removeClass("btn-success");
                $("#bestCategory" + id).addClass("btn-danger");
            }
        },
    });
}
