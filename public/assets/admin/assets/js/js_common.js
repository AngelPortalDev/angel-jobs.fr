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

    $(".addJobseeker").click(function (event) {
        event.preventDefault();
        $("#bk_com_name_error").hide();
        $("#bk_fname_error").hide();
        $("#bk_email_error").hide();
        $("#bk_email_ptrn_error").hide();
        $("#mob_code_error").hide();
        $("#contact_no_error").hide();
        $("#password_error").hide();
        // $("#c_password_error").hide();
        // $("#cpassord_error").hide();
        // $("#tnc_error").hide();

        var com_name = $("#com_name").val();
        var fullname = $("#fullname").val();
        var bk_email = $("#email_signup").val();
        var mob_code = $("#mob_code").val();
        var contact_no = $("#contact_no_signup").val();
        var password = $("#password").val();
        // var c_password = $("#c_password").val();
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
        if (mob_code === "" || mob_code === null) {
            $("#mob_code_error").show();
            return;
        }
        if (contact_no === "") {
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

        var form = $("#addJobseeker").serialize();
        // var form = new FormData($("#regFrom")[0]);
        if (
            com_name != "" &&
            fullname != "" &&
            bk_email != "" &&
            contact_no != "" &&
            password != ""
        ) {
            $("#loader").fadeIn();
            $.ajax({
                url: baseUrl + "/admin/jobseeker-add",
                type: "POST",
                data: form,
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#loader").fadeOut();
                    if (response.code == 200) {
                        $("#addJobseeker")[0].reset();
                        $("#signup-modal").modal("hide");
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
    
     $("#ProfileSubmit").on("click", function (event) {
         //alert("ghfghgf");
         event.preventDefault();
         $("#fullname_error").hide();
         $("#mob_code_error").hide();
         $("#mobile_error").hide();
         $("#com_name_error").hide();
        
         
        //alert("ghfghgf");
         var fullname = $("#fullname").val();
         var mob_code = $("#mob_code").val();
         var mobile = $("#mobile").val();
         var com_name = $("#com_name").val();
        


         if (fullname === "") {
             $("#fullname_error").show();
             return;
         }
         if (mob_code === null) {
             $("#mob_code_error").show();
             return;
         }
         if (mobile === "") {
             $("#mobile_error").show();
             return;
         }
         if(com_name === ""){
            $("#com_name_error").show();
            return;
         }
         
         $("#loader").fadeIn();
         // var form = $("#jsProfile").serialize();
         var form = new FormData($("#jsProfile")[0]);
        
         $.ajax({
             url: baseUrl + "/admin/jobseeker-edit",
             type: "POST",
             data: form,
             dataType: "json",
             contentType: false,
             processData: false,
             headers: {
                 "X-CSRF-TOKEN": csrfToken,
             },
             success: function (response) {
                 $("#loader").fadeOut();
                 if (response.code == 200) {
                     $("#emp_profile_view").hide();
                     $("input")
                         .removeClass("form-control")
                         .addClass("form-control-plaintext")
                         .prop("readonly", "true");
                     $("#emp_profile_edit").show();
                     $(".textveiw").show();
                     $(".slec").addClass("d-none");
                     $("#ProfileSubmit")
                         .addClass("d-none")
                         .removeClass("d-block");
                     swal({
                         title: response.message,
                         // text: "Please Login",
                         icon: "success",
                     }).then(function () {
                          window.location.reload();
                       // window.href = baseUrl + 'admin/get-jobseeker-data';
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
                 url: baseUrl + "/js-mail-exist/" + email,
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

         if (contact_no != "") {
             $("#loader").show();
             $.ajax({
                 url: baseUrl + "/js-mobile-exist",
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
     $(".deleteJs").on("click", function (event) {
         event.preventDefault();
         var form = $(".actionId").serialize();
         $("#loader").fadeIn();

         $.ajax({
             url: baseUrl + "/admin/jobseeker-delete",
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
             url: baseUrl + "/admin/jobseeker-plan-check",
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
         var form = $(".actionId").serializeArray();
         var selectedItems = form.filter(item => item.name === 'userId[]');  
         if (selectedItems.length > 1) {
             swal({
                 title: "Select only one jobseeker",
                 text: "Please Try Again",
                 icon: "error",
             });
             return false;  
         } 
         $("#loader").fadeIn();
         $.ajax({
             url: baseUrl + "/admin/jobseeker-plan-assign",
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
