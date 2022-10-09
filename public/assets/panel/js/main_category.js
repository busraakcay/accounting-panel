$(".category_js").on("change", function (e) {
    var categoryId = $(".category_js").val();
    if (categoryId !== undefined) {
        $.ajax({
            url: $("#subCategory").val(),
            type: "get",
            data: {
                categoryId: categoryId,
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                if (JSON.parse(data).length !== 0) {
                    var subselect = '<div class="col-lg-3 clearSubCategories">';
                    subselect +=
                        '<select class="form-control" data-selected="" onchange="selectSubCategory(' +
                        categoryId +
                        ',this.value)" id="select-subcategory' +
                        categoryId +
                        '" name="category[]">';
                    subselect +=
                        ' <option value="" selected="selected">Alt Kategori Seçiniz</option>';
                    $.each(JSON.parse(data), function (key, value) {
                        subselect +=
                            ' <option value="' +
                            value.category_id +
                            '">' +
                            value.name +
                            "</option>";
                    });
                    subselect += "</select></div>";
                    $(document).ready(function () {
                        $("#select-subcategory" + categoryId).select2({
                            placeholder: "Alt Kategori Seçiniz",
                            allowClear: true,
                        });
                    });
                    $("#category_wrapper").append(subselect);
                }
            },
        });
    }
});

function selectSubCategory(categoryId, subCategory) {
    $.ajax({
        url: $("#countSubCategories").val(),
        type: "get",
        data: {
            categoryId: subCategory,
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            if (JSON.parse(data).length > 0) {
                $("#select-subcategory" + categoryId).on(
                    "change",
                    function (e) {
                        if (
                            $(".clearSubCategories" + subCategory) !== undefined
                        ) {
                            $(".clearSubCategories" + subCategory).empty();
                            $(".clearSubCategories" + subCategory).remove();
                        }
                    }
                );

                $("#select-subcategory" + categoryId).on(
                    "select2:opening",
                    function (e) {
                        $("#select-subcategory" + categoryId).attr(
                            "data-selected",
                            $("#select-subcategory" + categoryId).val()
                        );
                    }
                );

                $("#select-subcategory" + categoryId).on(
                    "change",
                    function (e) {
                        $.ajax({
                            url: $("#countSubCategories").val(),
                            type: "get",
                            data: {
                                categoryId: $(
                                    "#select-subcategory" + categoryId
                                ).attr("data-selected"),
                                _token: "{{ csrf_token() }}",
                            },
                            success: function (data) {
                                $.each(JSON.parse(data), function (key, value) {
                                    if (
                                        $(".clearSubCategories" + value) !==
                                        undefined
                                    ) {
                                        $(
                                            ".clearSubCategories" + value
                                        ).empty();
                                        $(
                                            ".clearSubCategories" + value
                                        ).remove();
                                    }
                                    $.ajax({
                                        url: $("#countSubCategories").val(),
                                        type: "get",
                                        data: {
                                            categoryId: value,
                                            _token: "{{ csrf_token() }}",
                                        },
                                        success: function (data) {
                                            $.each(
                                                JSON.parse(data),
                                                function (key, value) {
                                                    if (
                                                        $(
                                                            ".clearSubCategories" +
                                                                value
                                                        ) !== undefined
                                                    ) {
                                                        $(
                                                            ".clearSubCategories" +
                                                                value
                                                        ).empty();
                                                        $(
                                                            ".clearSubCategories" +
                                                                value
                                                        ).remove();
                                                    }
                                                }
                                            );
                                        },
                                    });
                                });
                            },
                        });
                    }
                );

                if (subCategory !== undefined) {
                    $.ajax({
                        url: $("#subCategory").val(),
                        type: "get",
                        data: {
                            categoryId: subCategory,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            if (JSON.parse(data).length !== 0) {
                                if (JSON.parse(data).length > 0) {
                                    var subselect =
                                        '<div class="col-lg-3 clearSubCategories' +
                                        subCategory +
                                        ' clearSubCategories">';
                                    subselect +=
                                        '<input type="hidden" class="parentCategoryId' +
                                        subCategory +
                                        '"  value="' +
                                        subCategory +
                                        '">';
                                    subselect +=
                                        '<select class="form-control" data-selected="" onchange="selectSubCategory(' +
                                        subCategory +
                                        ',this.value)" id="select-subcategory' +
                                        subCategory +
                                        '" name="category[]">';
                                    subselect +=
                                        ' <option value="" selected="selected">Alt Kategori Seçiniz</option>';
                                    $.each(
                                        JSON.parse(data),
                                        function (key, value) {
                                            subselect +=
                                                ' <option value="' +
                                                value.category_id +
                                                '">' +
                                                value.name +
                                                "</option>";
                                        }
                                    );
                                    subselect += "</select></div>";
                                    $(document).ready(function () {
                                        $(
                                            "#select-subcategory" + subCategory
                                        ).select2({
                                            placeholder: "Alt Kategori Seçiniz",
                                            allowClear: true,
                                        });
                                    });
                                    $("#category_wrapper").append(subselect);
                                }
                            }
                        },
                    });
                }
            }
        },
    });
}

function clearAllSubCategories() {
    if ($(".clearSubCategories") !== undefined) {
        $(".clearSubCategories").empty();
        $(".clearSubCategories").remove();
    }
}

function clearSubCategory(subCategory, index) {
    var subCatArr = JSON.parse(subCategory);
    for (let i = index; i < subCategory.length; i++) {
        $(".clearSubCategories" + subCatArr[i]).empty();
        $(".clearSubCategories" + subCatArr[i]).remove();
    }
}
