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
    $("#gst_license, #owner_id").change(function () {
        var allowedExtensions = ["pdf", "png", "jpg", "jpeg"];
        var maxSize = 2 * 1024 * 1024;
        var gst_licence = $("#gst_license")[0].files;
        var owner_id = $("#owner_id")[0].files;
    
        $("#gst_license_file_error, #gst_license_size_error, #gst_license_encrypted_error").hide();
        $("#owner_id_file_error, #owner_id_size_error, #owner_id_encrypted_error").hide();
    
        var encryptedFilesCount = 0; 
        function checkFile(file, type) {
            if (!file) return false;
    
            var fileName = file.name;
            var fileExtension = fileName.split(".").pop().toLowerCase();
    
            // Extension Check
            if (!allowedExtensions.includes(fileExtension)) {
                $("#" + type + "_file_error").show();
                disableSubmit();
                return;
            }
    
            // Size Check
            if (file.size > maxSize) {
                $("#" + type + "_size_error").show();
                disableSubmit();
                return;
            }
    
            // Read File for Encrypted PDFs
            if (fileExtension === "pdf") {
                var reader = new FileReader(); // ✅ FIX: Define the reader instance
    
                reader.onload = function (e) {
                    var data = new Uint8Array(e.target.result);
                    var text = new TextDecoder("utf-8").decode(data);
    
                    // Check for "Encrypted" keyword in the PDF metadata
                    if (text.includes("/Encrypt")) {
                        $("#" + type + "_encrypted_error").show();
                        encryptedFilesCount++; // Increase encrypted file count
                        disableSubmit();
                    } 
    
                    // If both files are checked and no encryption found, enable submit
                    if (encryptedFilesCount === 0) {
                        enableSubmit();
                    }
                };
    
                reader.readAsArrayBuffer(file);
            }
        }
        function disableSubmit() {
            $("#regSubmit, #ProfileSubmit").attr("disabled", "true");
        }
        function enableSubmit() {
            $("#regSubmit, #ProfileSubmit").removeAttr("disabled");
        }       
        encryptedFilesCount = 0;
    
        if (gst_licence.length > 0) checkFile(gst_licence[0], "gst_license");
        if (owner_id.length > 0) checkFile(owner_id[0], "owner_id");
    });
    $(".addEmployer").click(function (event) {
        event.preventDefault();
        $("#bk_com_name_error").hide();
        $("#bk_fname_error").hide();
        $("#bk_email_error").hide();
        $("#bk_email_ptrn_error").hide();
        $("#contact_no_error").hide();
        $("#password_error").hide();
        $("#c_password_error").hide();
        $("#cpassord_error").hide();
        $("#tnc_error").hide();

        var com_name = $("#com_name").val();
        var fullname = $("#fullname").val();
        var bk_email = $("#email_signup").val();
        var contact_no = $("#contact_no_signup").val();
        var password = $("#emp_password").val();
        var c_password = $("#c_password").val();
        // var mob_code = $("#mob_code").val();
        var passwordRegex =
            /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (com_name === "") {
            $("#bk_com_name_error").show();
            return;
        }
        if (fullname === "") {
            $("#bk_fname_error").show();
            return;
        }
        if (bk_email === "") {
            $("#bk_email_error").show();
            return;
        }
        if (!emailRegex.test(bk_email)) {
            $("#bk_email_ptrn_error").show();
            return;
        }
        if (contact_no === "") {
            $("#contact_no_error").show();
            return;
        }
        if (contact_no.length < 9) {
            $("#contact_no_error").show();
            return;
        }
        if (contact_no.length > 9) {
            $("#contact_no_error").show();
            return;
        }
        if (password.trim() === "") {
            $("#password_error").show();
            return;
        }
        if (!passwordRegex.test(password)) {
            $("#password_error").show();
            return;
        }

        //var form = $("#addEmployer").serialize();
        var form = new FormData($("#addEmployer")[0]);
        if (
            com_name != "" &&
            fullname != "" &&
            bk_email != "" &&
            contact_no != "" &&
            password != ""
        ) {
            $("#loader").fadeIn();
            $.ajax({
                url: baseUrl + "/admin/employer-add",
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#loader").fadeOut();
                    if (response.code == 200) {
                        $("#addEmployer")[0].reset();
                        $("#add-employer-modal").modal("hide");
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
                // error: function (xhr) {
                //     // Handle the error response
                //     console.log(xhr.responseText);
                //     alert("An error occurred while inserting data.");
                // },
            });
        } else {
            alert("Mandatory Field Missing !!!");
        }
    });
    $("#email_signup").on("focusout", function (e) {
        e.preventDefault();
        $("#bk_email_error").hide();
        $("#bk_email_ptrn_error").hide();
        $("#email_exists_error").hide();
        var email = $(this).val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            $("#bk_email_error").show();
            return;
        }
        if (!emailRegex.test(email)) {
            $("#bk_email_ptrn_error").show();
            return;
        }
        if (email != "") {
            $("#loader").show();
            $.ajax({
                url: baseUrl + "/emp-mail-exist/" + email,
                type: "GET",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#loader").hide();
                    if (response.count > 0) {
                        $("#email_exists_error").show();
                        $("#regSubmit").attr("disabled", "true");
                        $("#email_signup").css("border-color", "red");
                        $("#email_signup").attr("value", "");
                    } else {
                        $("#regSubmit").removeAttr("disabled");
                        $("#email_signup").css("border-color", "green");
                        // $("#email_signup").attr("value", psno);
                    }
                },
            });
        }
    });
    $("#contact_no_signup").on("focusout", function (e) {
        e.preventDefault();

        $("#contact_no_error").hide();
        $("#mob_code_error").hide();
        $("#mob_exists_error").hide();
        var contact_no = $(this).val();
        var mob_code = $("#mob_code_signup").val();
        if (mob_code === "") {
            $("#mob_code_error").show();
            return;
        }
        // if (contact_no.length <= 8 && contact_no.length >= 8) {
        //     $("#contact_no_error").show();
        //     return;
        // }
        if (contact_no === "") {
            $("#contact_no_error").show();
            return;
        }
        if (contact_no.length < 9) {
            $("#contact_no_error").show();
            return;
        }
        if (contact_no.length > 9) {
            $("#contact_no_error").show();
            return;
        }

        if (contact_no != "") {
            $("#loader").show();
            $.ajax({
                url: baseUrl + "/emp-mobile-exist",
                type: "POST",
                data: { mob_code: mob_code, contact_no: contact_no },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#loader").hide();
                    if (response.count > 0) {
                        $("#mob_exists_error").show();
                        $("#regSubmit").attr("disabled", "true");
                        $(this).css("border-color", "red");
                        $(this).attr("value", "");
                    } else {
                        $("#regSubmit").removeAttr("disabled");
                        $(this).css("border-color", "green");
                        // $(this).attr("value", psno);
                    }
                },
            });
        }
    });
    $(".deleteEmp").on("click", function (event) {
        event.preventDefault();
        var form = $(".actionId").serialize();
        $("#loader").fadeIn();

        $.ajax({
            url: baseUrl + "/admin/employer-delete",
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
    // Plan Check
    $("#plan_id").on("change", function (e) {
        e.preventDefault();
        var plan_id = $(this).val();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/employer-plan-check",
            type: "POST",
            data: { plan_id: plan_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    $("#amount_recieved").val(response.amount);
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
    //Assign Plan
    $(".planAdd").on("click", function (event) {
        event.preventDefault();
        $("#plan_id_error").hide();
        $("#amount_error").hide();
        $("#transc_error").hide();
        var plan_id = $("#plan_id").val();
        var amount_recieved = $("#amount_recieved").val();
        var trans_id = $("#trans_id").val();
        if (plan_id != 0 && plan_id === "") {
            $("#plan_id_error").show();
            return;
        }
        if (amount_recieved === "") {
            $("#amount_error").show();
            return;
        }
        if (trans_id === "") {
            $("#transc_error").show();
            return;
        }

        var form = $(".actionId").serializeArray();
        var selectedItems = form.filter(item => item.name === 'userId[]');  
        if (selectedItems.length > 1) {
            swal({
                title: "Select only one employer",
                text: "Please Try Again",
                icon: "error",
            });
            return false;  
        } 
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/admin/employer-plan-assign",
            type: "POST",
            data: {
                form: form,
                plan_id: plan_id,
                amount_recieved: amount_recieved,
                trans_id: trans_id,
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                console.log(response.code);
                if (response.code == 200) {
                    $("#assing-plan-modal").modal("hide");
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
