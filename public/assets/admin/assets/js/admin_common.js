$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var baseUrl = window.location.origin;
    var assets = window.location.origin + "/assets/";
    var reader = new FileReader();
    var img = new Image();

    $(".image").on("change", function () {
        $("#img_size_error").hide();
        var logo = this.files[0];
        var size = logo.size / 1024;
        if (logo) {
            reader.onload = function (e) {
                img.src = e.target.result;
                img.onload = function () {
                    var width = img.width;
                    var height = img.height;

                    if (width < 199 && height < 199) {
                        $("#img_size_error").show();
                        //   $("#ProfileSubmit").prop("disabled", true);
                        return;
                    } else {
                        //   $("#ProfileSubmit").prop("disabled", false);
                    }
                    if (size > 3072) {
                        $("#img_size_error").show();
                        //   $("#ProfileSubmit").prop("disabled", true);
                        return;
                    } else {
                        //   $("#ProfileSubmit").prop("disabled", false);
                    }
                };
                e.preventDefault();
                $(".imagePreview").attr("src", e.target.result);
            };
            reader.readAsDataURL(logo);
        }
    });

    $("#adminLogin").click(function (e) {
        e.preventDefault();
        $("#ad_login_user_error").hide();
        $("#ad_login_pass_error").hide();
        var username = $("#username").val();
        var password = $("#password").val();
        // var formData = new FormData(form);
        var form = $("#adminLoginForm").serialize();
        if (username.trim() === "") {
            $("#ad_login_user_error").show();
            return;
        }
        if (password.trim() === "") {
            $("#ad_login_pass_error").show();
            return;
        }
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin-user-login",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#ad_login_user_error").hide();
                    $("#ad_login_pass_error").hide();
                    $("#adminLoginForm")[0].reset();
                    window.location.href = baseUrl + "/admin/admin-dashboard";
                } else {
                    swal({
                        title: response.message,
                        text: "Invalid Credentials",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });
    // Add Job Post
    $("#postJob").click(function (event) {
        event.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $("#employer_error").hide();
        $("#job_title_error").hide();
        $("#job_type_error").hide();
        $("#job_lang_error").hide();
        $("#job_indus_error").hide();
        $("#job_func_area_error").hide();
        $("#job_designation_error").hide();
        $("#job_expr_error").hide();
        $("#job_location_error").hide();
        $("#job_shift_error").hide();
        $("#job_gender_error").hide();
        $("#job_disc_error").hide();
        $("#job_educ_error").hide();
        $("#job_con_person_error").hide();
        $("#job_con_phone_error").hide();
        $("#job_con_phone_limit_error").hide();
        $("#job_con_email_error").hide();
        $("#job_con_email_ver_error").hide();
        $("#job_spec_error").hide();
        $("#vacancy_count_error").hide();

        var emp_id = $("#emp_id").val();
        var job_title = $("#job_title").val();
        var job_type = $("#job_type").val();
        var job_lang = $("#job_lang").val();
        var job_indus = $("#job_indus").val();
        var job_func_area = $("#job_func_area").val();
        var job_designation = $("#job_designation").val();
        var job_expr = $("#job_expr").val();
        var job_location = $("#job_location").val();
        // var job_gender = $("#job_gender").val();
        var job_skills = $("#job_skills").val();
        var job_disc = $("#job_disc").val();
        var job_educ = $("#job_educ").val();
        var job_con_person = $("#job_con_person").val();
        var job_con_phone = $("#job_con_phone").val();
        var job_con_email = $("#job_con_email").val();
        var vacancy_count = $("#vacancy_count").val();

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emp_id === null || emp_id === "") {
            $("#employer_error").show();
            return;
        }
        if (job_title === "") {
            $("#job_title_error").show();
            return;
        }
        if (job_type === "") {
            $("#job_type_error").show();
            return;
        }
        if (job_lang.length === 0) {
            $("#job_lang_error").show();
            return;
        }
        if (job_indus === null) {
            $("#job_indus_error").show();
            return;
        }

        if (job_func_area === null) {
            $("#job_func_area_error").show();
            return;
        }

        if (job_designation === null) {
            $("#job_designation_error").show();
            return;
        }
        if (job_expr === null) {
            $("#job_expr_error").show();
            return;
        }
        if (job_location === null) {
            $("#job_location_error").show();
            return;
        }

        if (vacancy_count === "") {
            $("#vacancy_count_error").show();
            return;
        }
        if (job_skills.length === 0) {
            $("#job_skills_error").show();
            return;
        }
        if (job_disc === "") {
            $("#job_disc_error").show();
            return;
        }
        if (job_educ === null) {
            $("#job_educ_error").show();
            return;
        }
        if (job_con_person === "") {
            $("#job_con_person_error").show();
            return;
        }
        if (job_con_phone === "") {
            $("#job_con_phone_error").show();
            return;
        }
        if (job_con_phone.length < 9 || job_con_phone.length > 9) {
            $("#job_con_phone_error").show();
            return;
        }

        if (job_con_email === "") {
            $("#job_con_email_error").show();
            return;
        }

        if (!emailRegex.test(job_con_email)) {
            $("#job_con_email_ver_error").show();
            return;
        }
        var form = $("#addJobForm").serialize();
        // var form = new FormData($("#regFrom")[0]);

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/admin-jobs-post",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();

                if (response.code == 200) {
                    $("#addJobForm")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.href =
                            baseUrl + "/admin/job-posting-list";
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
            // error: function (xhr) {
            //     // Handle the error response
            //     console.log(xhr.responseText);
            //     alert("An error occurred while inserting data.");
            // },
        });
    });
    // Delete Job Post
    $(".jobUpdate").on("click", function (event) {
        event.preventDefault();

        var form = $(".actionId").serializeArray();
        var action =$(this).data("action");
        //alert(action);
        $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/admin-jobs-action",
            type: "POST",
            data: {
                form,
                action: action,
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    if (response.action == "delete") {
                        $("#delete-selected-modal").modal("hide");
                    }
                    if (response.action == "delete") {
                        $("#approve-modal").modal("hide");
                    }
                    if (response.action == "reject") {
                        $("#reject-modal").modal("hide");
                    }

                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });

    $("#status_type, #type, #bulk_cat").change(function (event) {
        event.preventDefault();
        let type = $("#type").val();
        let bulk_cat = $("#bulk_cat").val();
        if (bulk_cat === "2" && $(this).val()) {
            $.ajax({
                url: baseUrl + "/admin/fetch-mailers-list",
                type: "POST",
                data: { status_id: $(this).val(), cat_id: type },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#loader").fadeOut();

                    if (response.code == 200) {
                        $(".multipleMails")
                            .removeClass("d-none")
                            .addClass("d-block");
                        $("#selected_emails").empty();
                        $.each(response.data, function (index, item) {
                            $("#selected_emails").append(
                                $("<option>", {
                                    value: item.email,
                                    text: item.email,
                                })
                            );
                        });
                    }
                },
            });
        } else {
            $(".multipleMails").removeClass("d-block").addClass("d-none");
        }
    });
    $("#email_template").change(function (event) {
        event.preventDefault();
        var ckeditor = CKEDITOR.instances["email_content"];
        if ($(this).val() != 0 && $(this).val() != "") {
            ckeditor.setData("");
            $("#loader").fadeIn();
            $.ajax({
                url: baseUrl + "/admin/template-content",
                type: "POST",
                data: { tempalte_id: $(this).val() },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#loader").fadeOut();

                    if (response.code == 200) {
                        $("#emails_subject").val(response.subject);
                        ckeditor.insertHtml(response.containt);
                    } else {
                        $("#emails_subject").val("");
                        ckeditor.setData("");
                    }
                },
            });
        }
    });
    $(".deleteEmail").on("click", function (event) {
        event.preventDefault();
        var form = $(".actionId").serialize();
        $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/email-temp-delete",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#delete-selected-modal").modal("hide");
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
    // Emails Send
    $("#mailsend").on("click", function (event) {
        event.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $("#bulk_cat_error").hide();
        $("#type_error").hide();
        $("#status_type_error").hide();
        $("#email_template_error").hide();
        $("#selected_emails_error").hide();
        $("#emails_subject_error").hide();
        $("#email_content_error").hide();

        var type = $("#type").val();
        var status_type = $("#status_type").val();
        var bulk_cat = $("#bulk_cat").val();
        var email_template = $("#email_template").val();
        var selected_emails = $("#selected_emails").val();
        var emails_subject = $("#emails_subject").val();
        var email_content = $("#email_content").val();
        var ckeditor = CKEDITOR.instances["email_content"];

        if (bulk_cat === "") {
            $("#bulk_cat_error").show();
            return;
        }
        if (type === "") {
            $("#type_error").show();
            return;
        }
        if (status_type === "") {
            $("#status_type_error").show();
            return;
        }
        if (email_template === "") {
            $("#email_template_error").show();
            return;
        }
        if (selected_emails === null) {
            $("#selected_emails_error").show();
            return;
        }
        if (emails_subject === null) {
            $("#emails_subject_error").show();
            return;
        }
        if (email_content === null) {
            $("#email_content_error").show();
            return;
        }
        var form = $("#EmailForm").serialize();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/send-mails",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#EmailForm")[0].reset();
                    ckeditor.setData("");
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });

    // EditPlan
    $(".editPlan").on("click", function (event) {
        event.preventDefault();
        var plan_id = $(this).data("plan_id");
        // $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/plan-modal-view",
            type: "POST",
            data: { plan_id: plan_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                // $("#loader").fadeOut();
                if (response.code == 200) {
                    var data = response.data[0];
                    $("#edit-plan-modal").modal("show");
                    $(".plan_name").val(data.plan_name);
                    $(".plan_id").attr("value", btoa(data.id));
                    $(".plan_currency").append(
                        "<option value=" +
                            data.plan_currency +
                            "selected>" +
                            data.plan_currency +
                            "</option>"
                    );
                    $(".plan_amount").val(data.plan_amount);
                    $(".plan_duration").val(data.plan_duration);
                    $(".highlight").val(data.highlight_job_limit);
                    if (data.status === "APPROVED") {
                        $(".approved").prop("checked", true);
                    }
                    if (data.status === "UNAPPROVED") {
                        $(".reject").prop("checked", true);
                    }
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
    // Add New Plan
    $(".addPlan").on("click", function (e) {
        e.preventDefault();
        $(".plan_name_error").hide();
        $(".plan_currency_error").hide();
        $(".plan_amount_error").hide();
        $(".plan_duration_error").hide();
        $(".highlight_error").hide();
        $(".validated_error").hide();
        var plan_name = $(".plan_name").val();
        var plan_currency = $(".plan_currency").val();
        var plan_amount = $(".plan_amount").val();
        var plan_duration = $(".plan_duration").val();
        var highlight = $(".highlight").val();
        var validated = $(".validated").val();
        // var form = new FormData(".planUpdate")[0];
        // var form = new FormData($(".planUpdate")[0]);
        var form = $(".planAdd").serialize();

        if (plan_name === "") {
            $(".plan_name_error").show();
            return;
        }
        if (plan_currency === "") {
            $(".plan_currency_error").show();
            return;
        }
        if (plan_amount === "") {
            $(".plan_amount_error").show();
            return;
        }
        if (plan_duration === "") {
            $(".plan_duration_error").show();
            return;
        }
        if (highlight === "") {
            $(".highlight_error").show();
            return;
        }
        if (validated === "") {
            $(".validated_error").show();
            return;
        }

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-plan-template",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#edit-plan-modal").modal("hide");
                    $("#add-plan-modal").modal("hide");
                    $(".planUpdate")[0].reset();
                    $(".planAdd")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Invalid Credentials",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });
    // Update Plan
    $(".updatePlanJs").on("click", function (e) {
        e.preventDefault();
        $(".plan_name_error").hide();
        $(".plan_currency_error").hide();
        $(".plan_amount_error").hide();
        $(".plan_duration_error").hide();
        $(".highlight_error").hide();
        $(".validated_error").hide();
        var plan_name = $(".plan_name").val();
        var plan_currency = $(".plan_currency").val();
        var plan_amount = $(".plan_amount").val();
        var plan_duration = $(".plan_duration").val();
        var highlight = $(".highlight").val();
        var validated = $(".validated").val();
        var form = $(".planUpdateJs").serialize();

        if (plan_name === "") {
            $(".plan_name_error").show();
            return;
        }
        if (plan_currency === "") {
            $(".plan_currency_error").show();
            return;
        }
        if (plan_amount === "") {
            $(".plan_amount_error").show();
            return;
        }
        if (plan_duration === "") {
            $(".plan_duration_error").show();
            return;
        }
        if (highlight === "") {
            $(".highlight_error").show();
            return;
        }
        if (validated === "") {
            $(".validated_error").show();
            return;
        }

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-plan-template",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#edit-plan-modal").modal("hide");
                    // $(".planUpdate")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Invalid Credentials",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });

    // Delete Plan
    $(".deletePlan").on("click", function (event) {
        event.preventDefault();
        var form = $(".actionId").serialize();
        $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/plan-delete",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#delete-selected-modal").modal("hide");
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
    // Status Plan Update
    $(".statusUpdate").on("click", function (event) {
        event.preventDefault();

        var form = $(".actionId").serializeArray();
        var action = $(this).data("action");
        var cat = $(this).data("cat");

        $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/plan-status-update",
            type: "POST",
            data: {
                form,
                action: action,
                cat: cat,
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    if (response.action == "delete") {
                        $("#delete-selected-modal").modal("hide");
                    }
                    if (response.action == "delete") {
                        $("#approve-modal").modal("hide");
                    }
                    if (response.action == "reject") {
                        $("#reject-modal").modal("hide");
                    }

                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
    // Add Employer Plan
    // Add New Plan
    $(".addEmpPlan").on("click", function (e) {
        e.preventDefault();
        $(".plan_name_error").hide();
        $(".plan_currency_error").hide();
        $(".plan_amount_error").hide();
        $(".plan_duration_error").hide();
        $(".highlight_error").hide();
        $(".jobs_post_error").hide();
        $(".cv_access_error").hide();
        $(".validated_error").hide();
        var plan_name = $(".plan_name").val();
        var plan_currency = $(".plan_currency").val();
        var plan_amount = $(".plan_amount").val();
        var plan_duration = $(".plan_duration").val();
        var highlight = $(".highlight").val();
        var job_post = $(".job_post").val();
        var cv_access = $(".cv_access").val();
        var validated = $(".validated").val();
        // var form = new FormData(".planUpdate")[0];
        // var form = new FormData($(".planUpdate")[0]);
        var form = $(".planAdd").serialize();
        if (plan_name === "") {
            $(".plan_name_error").show();
            return;
        }
        if (plan_currency === "") {
            $(".plan_currency_error").show();
            return;
        }
        if (plan_amount === "") {
            $(".plan_amount_error").show();
            return;
        }
        if (plan_duration === "") {
            $(".plan_duration_error").show();
            return;
        }
        if (highlight === "") {
            $(".highlight_error").show();
            return;
        }
        if (job_post === "") {
            $(".jobs_post_error").show();
            return;
        }
        if (cv_access === "") {
            $(".cv_access_error").show();
            return;
        }

        if (validated === "") {
            $(".validated_error").show();
            return;
        }

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-emp-plan-template",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code === 200) {
                    $("#edit-plan-modal").modal("hide");
                    $("#add-plan-modal").modal("hide");
                    // $(".planUpdate")[0].reset();
                    $(".planAdd")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });

    // Edit Emp Plan
    $(".editEmpPlan").on("click", function (event) {
        event.preventDefault();
        var plan_id = $(this).data("plan_id");
        // $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/emp-plan-modal-view",
            type: "POST",
            data: { plan_id: plan_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                // $("#loader").fadeOut();
                if (response.code == 200) {
                    var data = response.data[0];
                    $("#add-plan-modal").modal("show");
                    $(".plan_name").val(data.plan_name);
                    $(".plan_id").attr("value", btoa(data.id));
                    $(".plan_currency").append(
                        "<option value=" +
                            data.plan_currency +
                            "selected>" +
                            data.plan_currency +
                            "</option>"
                    );
                    $(".plan_amount").val(data.plan_amount);
                    $(".plan_duration").val(data.plan_duration);
                    $(".highlight").val(data.plan_amount);
                    $(".job_post").val(data.job_post_limit);
                    $(".cv_access").val(data.cv_access_limit);
                    if (data.status === "APPROVED") {
                        $(".approved").prop("checked", true);
                    }
                    if (data.status === "UNAPPROVED") {
                        $(".reject").prop("checked", true);
                    }
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });

    // Emp Plan Update
    $(".updatePlan").on("click", function (e) {
        e.preventDefault();
        $(".plan_name_error").hide();
        $(".plan_currency_error").hide();
        $(".plan_amount_error").hide();
        $(".plan_duration_error").hide();
        $(".highlight_error").hide();
        $(".jobs_post_error").hide();
        $(".cv_access_error").hide();
        $(".validated_error").hide();
        var plan_name = $(".plan_name").val();
        var plan_currency = $(".plan_currency").val();
        var plan_amount = $(".plan_amount").val();
        var plan_duration = $(".plan_duration").val();
        var highlight = $(".highlight").val();
        var job_post = $(".job_post").val();
        var cv_access = $(".cv_access").val();
        var validated = $(".validated").val();
        // var form = new FormData(".planUpdate")[0];
        // var form = new FormData($(".planUpdate")[0]);
        var form = $(".planAdd").serialize();

        if (plan_name === "") {
            $(".plan_name_error").show();
            return;
        }
        if (plan_currency === "") {
            $(".plan_currency_error").show();
            return;
        }
        if (plan_amount === "") {
            $(".plan_amount_error").show();
            return;
        }
        if (plan_duration === "") {
            $(".plan_duration_error").show();
            return;
        }
        if (highlight === "") {
            $(".highlight_error").show();
            return;
        }
        if (job_post === "") {
            $(".jobs_post_error").show();
            return;
        }
        if (cv_access === "") {
            $(".cv_access_error").show();
            return;
        }
        if (validated === "") {
            $(".validated_error").show();
            return;
        }

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-plan-template",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#add-plan-modal").modal("hide");
                    $(".planUpdate")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Invalid Credentials",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });

    // Seo Page Add
    $(".addPage").on("click", function (e) {
        e.preventDefault();
        $("#page_name_error").hide();
        $("#slug_error").hide();
        $("#keywords_error").hide();
        $("#h_tag_error").hide();
        $("#title_error").hide();
        $("#meta_disc_error").hide();
        $("#meta_tags_error").hide();
        $("#page_url_error").hide();
        var page_name = $("#page_name").val();
        var slug = $("#slug").val();
        var keywords = $("#keywords").val();
        var h_tag = $("#h_tag").val();
        var title = $("#title").val();
        var meta_disc = $("#meta_disc").val();
        var meta_tags = $("#meta_tags").val();
        var page_url = $("#page_url").val();

        var form = $("#seoAdd").serialize();

        if (page_name === "") {
            $("#page_name_error").show();
            return;
        }
        if (slug === "") {
            $("#slug_error").show();
            return;
        }
        if (keywords === "") {
            $("#keywords_error").show();
            return;
        }
        if (h_tag === "") {
            $("#h_tag_error").show();
            return;
        }
        if (title === "") {
            $("#title_error").show();
            return;
        }
        if (meta_disc === "") {
            $("#meta_disc_error").show();
            return;
        }
        if (meta_tags === "") {
            $("#meta_tags_error").show();
            return;
        }
        if (page_url === "") {
            $("#page_url_error").show();
            return;
        }

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-seo-page",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    // $("#seoAdd")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.href =
                            baseUrl + "/admin/admin-seo-page";
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });
    // Delete Plan
    $(".deletePage").on("click", function (event) {
        event.preventDefault();
        var form = $(".actionId").serialize();
        $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/page-delete",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#delete-selected-modal").modal("hide");
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
    $(".addConfig").on("click", function (e) {
        e.preventDefault();
        $("#google_code_error").hide();
        var google_code = $("#google_code").val();
        var form = $("#addSiteConfig").serialize();
        if (google_code === "") {
            $("#google_code_error").show();
            return;
        }
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-site-config",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    // $("#seoAdd")[0].reset();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.href =
                            baseUrl + "/admin/admin-site-setting";
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });
    $(".addElement").on("click", function (e) {
        e.preventDefault();
        $("#element1_error").hide();
        $("#element2_error").hide();
        $("#status_error").hide();
        var element1 = $("#element1").val();
        var element2 = $("#element2").val();
        var status = $("input[name=status]").val();

        console.log(status);

        if (element1 === "") {
            $("#element1_error").show();
            return;
        }
        if (element2 === "") {
            $("#element2_error").show();
            return;
        }
        if (status === "") {
            $("#status_error").show();
            return;
        }
        var form = $("#dataUpdate").serialize();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/update-elements",
            type: "POST",
            data: form,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code === 200) {
                    $("#dataUpdate")[0].reset();
                    $("#add-modal").modal("hide");
                    // loadData();
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
        });
    });
    $(document).on("click", ".editElement", function (event) {
        // event.preventDefault();
        var id = $(this).data("element_id");
        var modal_cat = $(this).data("modal_cat");
        var type = $("#type").val();
        // $("#loader").fadeIn();
        if (modal_cat === "add") {
            $("#element1, #element2")
                .css("border", "1px solid #0000002d")
                .prop("readonly", false);
            $("#dataUpdate")[0].reset();
            $(".modal-title").html("Add");
            $(".addElement").html("Add").show();
        }
        if (modal_cat === "edit") {
            $("#element1, #element2")
                .css("border", "1px solid #0000002d")
                .prop("readonly", false);
            $(".modal-title").html("Update");
            $(".addElement").html("Update").show();
        }
        if (modal_cat === "view") {
            $("#element1, #element2")
                .css("border", "none")
                .prop("readonly", true);
            $(".modal-title").html("View");
            $(".addElement").hide();
        }

        $.ajax({
            url: baseUrl + "/admin/element-modal-view",
            type: "POST",
            data: { id: id, type: type },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                // $("#loader").fadeOut();
                if (response.code == 200) {
                    var data = response.data[0];
                    if (type === "country") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.country_name);
                        $("#element2").val(data.country_code);
                    }
                    if (type === "state") {
                        $("#add-state-modal").modal("show");
                        $("#element1").val(data.state_name);
                        //  $("#element2").find("<option>").remove();
                        $("#element2").append(
                            "<option value=" +
                                data.country_id +
                                " >" +
                                data.country_name +
                                "</option>"
                        );
                    }
                    if (type === "qual") {
                        $("#add-modal").modal("show");
                        $("#element2").val(data.educational_qualification);

                        $("#element1").append(
                            "<option value=" +
                                data.qualification_level_id +
                                " selected>" +
                                data.qualification_name +
                                "</option>"
                        );
                    }
                    if (type === "martial_status") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.marital_status);
                    }
                    if (type === "designation") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.role_name);
                    }
                    if (type === "designation") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.role_name);
                    }
                    if (type === "skills") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.key_skill_name);
                    }
                    if (type === "lang") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.skill_language);
                    }
                    if (type === "job_type") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.job_type);
                    }
                    if (type === "notice") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.notice);
                    }
                    if (type === "exp") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.experiance);
                    }
                    if (type === "indus") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.industries_name);
                    }
                    if (type === "func") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.functional_name);
                    }
                    if (type === "com_type") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.company_type);
                    }
                    if (type === "com_size") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.company_size);
                    }
                    if (type === "sal_range") {
                        $("#add-modal").modal("show");
                        $("#element1").val(data.salary_range);
                    }
                    $("#element_id").attr("value", btoa(data.id));

                    if (data.status == "APPROVED") {
                        $(".status").prop("checked", true);
                    }
                    if (data.status == "UNAPPROVED") {
                        $(".reject").prop("checked", true);
                    }
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
    // Delete Elements
    $(".statusUpdateElements").on("click", function (event) {
        event.preventDefault();
        var form = $(".actionId").serializeArray();
        var action = $(this).data("action");
        var type = $("#type").val();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/element-status-update",
            type: "POST",
            data: {
                form: form,
                action: action,
                type: type,
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#delete-selected-modal").modal("hide");
                    swal({
                        title: response.message,
                        text: "",
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    swal({
                        title: response.message,
                        text: "Please Try Again",
                        icon: "error",
                    });
                }
            },
        });
    });
});
