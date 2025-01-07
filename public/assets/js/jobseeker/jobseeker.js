$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var baseUrl = window.location.origin;
   
    $("#cvUp_error").hide();
    $(".cvUploade").on("change", function (e) {
        const file = e.target.files[0];
        const maxFileSize = 3 * 1024 * 1024;
        const allowedExtensions = ['pdf', 'png', 'jpg']; 
        const fileExtension = file.name.split('.').pop().toLowerCase(); 
    
        $("#loader").fadeIn();
        $("#cvUp_error").show();
    
        if (file) {
            // Check file type (extension)
            if (!allowedExtensions.includes(fileExtension)) {
                $("#error-message").text('Invalid file type. Only PDF, JPG, and PNG are allowed.');
                $("#error-message").show();
                $("#cvUp_error").css('color', 'red');
                e.target.value = ''; 
            } 
            // Check file size
            else if (file.size > maxFileSize) {
                $("#error-message").text('File is too large. Maximum file size is 3MB.');
                $("#error-message").show();
                $("#cvUp_error").css('color', 'red');
                e.target.value = ''; 
            } 
            else {
                $("#show_message").text("Successfully uploaded !!!");
                $("#show_message").show();
                $("#error-message").hide();
                $("#cvUp_error").css('color', 'green');
            }
        }
    
        $("#loader").fadeOut();
    });
    
 $("#ProfileSubmit").on("click", function (event) {

     event.preventDefault();
     $("#fullname_error").hide();
     $("#job_designation_error").hide();
     $("#job_skills_error").hide();
     $("#job_lang_error").hide();
     $("#job_location_error").hide();
     $("#job_type_error").hide();
     $("#notice_error").hide();
     $("#job_expr_error").hide();
     $("#exp_sal_error").hide();
     $("#job_indus_error").hide();
     $("#job_func_area_error").hide();
     $("#national_error").hide();
     $("#country_error").hide();
     $("#city_error").hide();
     $("#dob_error").hide();
    

     var fullname = $("#fullname").val();
     var desig = $("#desig").val();
     var skill = $("#skill").val();
     var lang = $("#lang").val();
     var pre_loc = $("#pre_loc").val();
     var prefered_job_type = $("#prefered_job_type").val();
     var notice_period = $("#notice_period").val();
     var job_expr = $("#texp_year").val();
     var exp_sal = $("#exp_sal").val();
     var indus = $("#prefered_industry").val();
     var job_func_area = $("#func_area").val();
     var national = $("#national").val();
     var country = $("#country").val();
     var city = $("#city").val();
     var dob = $("#dob").val();
     var select_work_mode = $("#select_work_mode").val();

     if (fullname === "") {
         $("#fullname_error").show();
         $("#fullname")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
         return;
     }
     if (desig === null) {
         $("#job_designation_error").show();
         $("#desig")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
         return;
     }
     if (skill.length === 0) {
         $("#job_skills_error").show();
         $("#skill")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
         return;
     }
     if (lang.length === 0) {
         $("#job_lang_error").show();
         $("#lang")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
         return;
     }
     if (pre_loc === "") {
         $("#job_location_error").show();
         $("#pre_loc")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
         return;
     }
     if (prefered_job_type === "") {
         $("#job_type_error").show();
         $("#prefered_job_type")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }
     if (notice_period === "") {
         $("#notice_error").show();
         $("#notice_period")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }
     if (job_expr.trim() === "") {
         $("#job_expr_error").show();
         $("#texp_year")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }
     if (exp_sal === "") {
         $("#exp_sal_error").show();
         $("#exp_sal")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }
     if (indus.trim() === "") {
         $("#job_indus_error").show();
         $("#prefered_industry")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }


     if (job_func_area === null) {
         $("#job_func_area_error").show();
         $("#func_area")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }
     var today = new Date().toISOString().split('T')[0];

     if (dob >= today) {
        $("#dob_error").show();
        $("#dob_error")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
        return;
    }

     if (national === "") {
         $("#national_error").show();
         $("#national")[0].scrollIntoView({ behavior:'smooth', block: 'center' });

         return;
     }
     if (country === null) {
         $("#country_error").show();
         return;
     }
     if (city.trim() === "") {
         $("#city_error").show();
         $("#city")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
         return;
     }
     // var form = $("#jsProfile").serialize();
     var form = new FormData($("#jsProfile")[0]);
     $("#loader").fadeIn();
     $.ajax({
         url: baseUrl + "/jobseeker/add-js-profiledata",
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
                 $("#ProfileSubmit").addClass("d-none").removeClass("d-block");
                 swal({
                     title: response.message,
                     // text: "Please Login",
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
     });
 });

 // For Update Eduction Sections
    $("#eduSubmit").on("click", function (event) {
        event.preventDefault();
        $("#qual_error").hide();

        var qual_name = $("#qual_name").val();

        if (qual_name === "") {
            $("#qual_error").show();
            return;
        }
        var form = $("#eduDetails").serialize();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/jobseeker/add-js-education",
            type: "POST",
            data: form,
            dataType: "json",
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
                    $(".submitButton").addClass("d-none").removeClass("d-block");
                    swal({
                        title: response.message,
                        // text: "Please Login",
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
        });
    });
    $("#expSubmit").on("click", function (event) {
        event.preventDefault();

         $("#com_error").hide();
         $("#jdate_error").hide();

        var com_name = $("#com_name").val();
        var dob = $("#jdate").val();
        var today = new Date().toISOString().split('T')[0];

        if (dob >= today) {
           $("#jdate_error").show();
           $("#jdate_error")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
           return;
       }
        if (com_name === "") {
            $("#com_error").show();
            return;
        }
        var form = $("#addExpDetails").serialize();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/jobseeker/add-js-experiance",
            type: "POST",
            data: form,
            dataType: "json",
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
                    $(".submitButton").addClass("d-none").removeClass("d-block");
                    swal({
                        title: response.message,
                        // text: "Please Login",
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
        });
    });


//     // Post a job
//     $("#jsProfileSubmit").on("click", function (event) {
//         event.preventDefault();
//         var form = $("#comProfile").serialize();
//         $("#loader").fadeIn();
//         $.ajax({
//             url: baseUrl + "/jsloyer/addjs-profiledata",
//             type: "POST",
//             data: form,
//             dataType: "json",
//             headers: {
//                 "X-CSRF-TOKEN": csrfToken,
//             },
//             success: function (response) {
//                 $("#loader").fadeOut();

//                 if (response.code == 200) {
//                     $("#js_profile_view").hide();
//                     $("input")
//                         .removeClass("form-control")
//                         .addClass("form-control-plaintext")
//                         .prop("readonly", "true");
//                     $("#js_profile_edit").show();
//                     $(".textveiw").show();
//                     $(".slec").addClass("d-none");
//                     $("#jsProfileSubmit").addClass("d-none").removeClass("d-block");
//                     swal({
//                         title: response.message,
//                         // text: "Please Login",
//                         icon: "success",
//                     });
//                 } else {
//                     swal({
//                         title: response.message,
//                         text: "Please Try Again",
//                         icon: "error",
//                     });
//                 }
//             },
//         });
//     });

//     $("#job_sal").on('change', function (event) {
//         var sal_range = $(this).val();
//         if (sal_range != "") {
//             $(".sal_disply").removeClass('d-none');
//         } else {
//              $(".sal_disply").addClass('d-none');
//         }
//     });
    
//      // Post a Job
//     $("#postJob").click(function (event) {
//         event.preventDefault();
//         $("#job_title_error").hide();
//         $("#job_type_error").hide();
//         $("#job_lang_error").hide();
//         $("#job_indus_error").hide();
//         $("#job_func_area_error").hide();
//         $("#job_designation_error").hide();
//         $("#job_expr_error").hide();
//         $("#job_location_error").hide();
//         $("#job_shift_error").hide();
//         $("#job_gender_error").hide();
//         $("#job_skills_error").hide();
//         $("#job_disc_error").hide();
//         $("#job_educ_error").hide();
//         $("#job_con_person_error").hide();
//         $("#job_con_phone_error").hide();
//         $("#job_con_email_error").hide();
//         $("#job_con_email_ver_error").hide();
//         $("#job_spec_error").hide();
//         $("#vacancy_count_error").hide();

//         var job_title = $("#job_title").val();
//         var job_type = $("#job_type").val();
//         var job_lang = $("#job_lang").val();
//         var job_indus = $("#job_indus").val();
//         var job_func_area = $("#job_func_area").val();
//         var job_designation = $("#job_designation").val();
//         var job_expr = $("#job_expr").val();
//         var job_location = $("#job_location").val();
//         var job_shift = $("#job_shift").val();
//         var job_gender = $("#job_gender").val();
//         var job_skills = $("#job_skills").val();
//         var job_disc = $("#job_disc").val();
//         var job_educ = $("#job_educ").val();
//         var job_con_person = $("#job_con_person").val();
//         var job_con_phone = $("#job_con_phone").val();
//         var job_con_email = $("#job_con_email").val();
//         var vacancy_count = $("#vacancy_count").val();
   
//         var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


//         if (job_title === "") {
//             $("#job_title_error").show();
//             return;
//         }
//         if (job_type === null) {
//             $("#job_type_error").show();
//             return;
//         }
        
//         if (job_indus === null) {
//             $("#job_indus_error").show();
//             return;
//         }
//           if (job_lang === null) {
//             $("#job_lang_error").show();
//             return;
//         }
//           if (job_func_area === null) {
//             $("#job_func_area_error").show();
//             return;
//         }
   
//           if (job_designation === null) {
//             $("#job_designation_error").show();
//             return;
//         }
//         if (job_expr === null) {
//             $("#job_expr_error").show();
//             return;
//         }
//           if (job_location === null) {
//             $("#job_location_error").show();
//             return;
//         }
//         if (job_shift === null) {
//             $("#job_shift_error").show();
//             return;
//         }
//           if (job_gender === null) {
//             $("#job_gender_error").show();
//             return;
//         }
//           if (vacancy_count === '') {
//             $("#vacancy_count_error").show();
//             return;
//         }
//         if (job_skills === null) {
//             $("#job_skills_error").show();
//             return;
//         }
//          if (job_disc === "") {
//             $("#job_disc_error").show();
//             return;
//         }
//          if (job_educ === null) {
//             $("#job_educ_error").show();
//             return;
//         }
//          if (job_con_person === "") {
//             $("#job_con_person_error").show();
//             return;
//         }
//           if (job_con_phone === "") {
//             $("#job_con_phone_error").show();
//             return;
//         }
        
//         if (job_con_email === "") {
//         $("#job_con_email_error").show();
//         return;
//         }

//         if (!emailRegex.test(job_con_email)) {
//             $("#job_con_email_ver_error").show();
//             return;
//         }
//         var form = $("#addJobForm").serialize();
//         // var form = new FormData($("#regFrom")[0]);

//         $("#loader").fadeIn();
//         $.ajax({
//             url: baseUrl + "/jsloyer/add-jobs-post",
//             type: "POST",
//             data: form,
//             dataType: "json",
//             headers: {
//                 "X-CSRF-TOKEN": csrfToken,
//             },
//             success: function (response) {
//                 $("#loader").fadeOut();

//                 if (response.code == 200) {
//                     $("#addJobForm")[0].reset();
//                     swal({
//                         title: response.message,
//                         text: "",
//                         icon: "success",
//                     }).then(function () {
//                         window.location.href = baseUrl + "/js-manage-job";
//                     });
//                 } else {
//                     swal({
//                         title: response.message,
//                         text: "Please Try Again",
//                         icon: "error",
//                     });
//                 }
//             },
//             // error: function (xhr) {
//             //     // Handle the error response
//             //     console.log(xhr.responseText);
//             //     alert("An error occurred while inserting data.");
//             // },
//         });
//     });
    });


