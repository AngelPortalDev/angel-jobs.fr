$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var baseUrl = window.location.origin;
    var reader = new FileReader();
    var img = new Image();
    function loadJobseeker(records, page, count,lastPage) {
        $("#jobseekerCount").html(count + " Jobseekers Found");
        $("#jobseekerResults").html(records);
        let paginationHtml = "<ul class='pagination'>";   
       
        if (page > 1) {
            paginationHtml += `<li class="page-item">
                <a href="#" class="btn btn-primary page-linkem prev-page" data-page="${page - 1}">Previous</a>
            </li>`;
        } else {
            paginationHtml += `<li class="page-item disabled">
                <a class="btn btn-primary disabled">Previous</a>
            </li>`;
        }       
        for (let i = 1; i <= lastPage; i++) {
            paginationHtml += `<li class="page-item ${i === page ? 'active' : ''}">
                <a href="#" class="btn btn-primary page-linkem" data-page="${i}">${i}</a>
            </li>`;
        } 
        if (page < lastPage) {
            paginationHtml += `<li class="page-item">
                <a href="#" class="btn btn-primary page-linkem next-page" data-page="${page + 1}">Next</a>
            </li>`;
        } else {
            paginationHtml += `<li class="page-item disabled">
                <a class="btn btn-primary disabled">Next</a>
            </li>`;
        }    
        paginationHtml += "</ul>";    
        $("#paginationLinks").html(paginationHtml);


    }
    function manageJobs() {
        $.ajax({
            url: baseUrl + "/emp-manage-job",
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
                if (length != 0) {
                    $.each(response, function (index, value) {
                        // let img = "{{ asset('images/logo/svg/" + records[index].profile_img + "') }}";
                        $("#jobResults").append(
                            "<li><div class='post-bx'><div class='d-flex m-b30'><div class='job-post-company'><a href='javascript:void(0);'><span><img alt='' src=" +
                                assets +
                                "images/employer/" +
                                records[index].profile_img +
                                "></span></a></div><div class='job-post-info'><h4 ><a href='" +
                                baseUrl +
                                "/job-details-view/" +
                                btoa(records[index].id) +
                                "'>" +
                                records[index].job_title +
                                "</a></h4><ul><li><i class='fas fa-map-marker-alt'></i> " +
                                records[index].location_hiring_name +
                                "</li><li><i class='far fa-bookmark'></i> " +
                                records[index].job_type_name +
                                "</li><li><i class='far fa-clock'></i> Published 11 months ago</li></ul></div></div><div class='d-flex'><div class='job-time me-auto'><a href='javascript:void(0);'><span>" +
                                records[index].job_type_name +
                                "</span></a></div><div class='salary-bx'><span>" +
                                records[index].job_salary_to_name +
                                "</span></div></div><label class='like-btn'><input type='checkbox'><span class='checkmark'></span></label></div></li>"
                        );
                    });
                    $.each(page, function (index, value) {
                        $("#jobResults").append(
                            "<li class=''><a href='javascript:void(0);'>" +
                                page[index].page +
                                "</a></li>"
                        );
                    });
                } else {
                    $("#jobResults").append("<li>No Jobs Found</li>");
                }
            },
        });
    }
    $(".basic").on("click", function (e) {
        $(".basics").removeClass("d-none");
        $(".educations").addClass("d-none");
        $(".experiences").addClass("d-none");
        $(".profiles").addClass("d-none");
        $(".personal_detailss").addClass("d-none");
    });

    $(".education").on("click", function (e) {
        $(".basics").addClass("d-none");
        $(".educations").removeClass("d-none");
        $(".experiences").addClass("d-none");
        $(".profiles").addClass("d-none");
        $(".personal_detailss").addClass("d-none");
    });
    $(".experience").on("click", function (e) {
        $(".basics").addClass("d-none");
        $(".educations").addClass("d-none");
        $(".experiences").removeClass("d-none");
        $(".profiles").addClass("d-none");
        $(".personal_detailss").addClass("d-none");
    });
    $(".profile-summary").on("click", function (e) {
        $(".basics").addClass("d-none");
        $(".educations").addClass("d-none");
        $(".experiences").addClass("d-none");
        $(".profiles").removeClass("d-none");
        $(".personal_detailss").addClass("d-none");
    });
    $(".personal_details").on("click", function (e) {
        $(".basics").addClass("d-none");
        $(".educations").addClass("d-none");
        $(".experiences").addClass("d-none");
        $(".profiles").addClass("d-none");
        $(".personal_detailss").removeClass("d-none");
    });

    $("#ProfileSubmit").on("click", function (event) {

        $("#fullname_error").hide();
        $("#com_name_error").hide();
        $("#license_no_error").hide();
        $("#img_size_error").hide();
        $("#pan_no_error").hide();
        $("#about_company_error").hide(); 
        event.preventDefault();

        var fullname = $("#full_name").val();
        var com_name = $("#emp_com_name").val();
        var license_no = $("#license_no").val();
        var pan_no = $("#pan_no").val();
        var about_company = $("#about_company").val();

        if (fullname === "") {
            $("#fullname_error").show();
            $("#full_name")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (com_name === "") {
            $("#com_name_error").show();
            $("#full_name")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        // if (license_no === "") {
        //     $("#license_no_error").show();
        //     $("#license_no")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        //     return;
        // }
        if(license_no != ""){
            if(license_no.length < 15){
                $("#license_no_error").text("GST No should be at least 15 characters");
                $("#license_no_error").show();
                $("#license_no")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
                return;
            }
            if(license_no.length > 15){
                $("#license_no_error").text("GST No should not be more than 15 characters");
                $("#license_no_error").show();
                $("#license_no")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
                return;
            }
        }        
        if(pan_no.length < 10){
            $("#pan_no_error").text("PAN No should be at least 10 characters");
            $("#pan_no_error").show();
            $("#pan_no")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
            return;
        }
        if(pan_no.length>10){
            $("#pan_no_error").text("PAN No should not be more than 10 characters");
            $("#pan_no_error").show();
            $("#pan_no")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
            return;
        }
        if(pan_no === ""){
            $("#pan_no_error").show();
            $("#pan_no")[0].scrollIntoView({ behavior:'smooth', block: 'center' });
            return;
        }
        if (about_company === "" || about_company.length > 500) {
                $("#about_company_error").show();
                $("#about_company_error")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }
        
        //    var form = $("#comProfile").serialize();
        var form = new FormData($("#comProfile")[0]);
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/employer/addemp-profiledata",
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
                    $("input, textarea")
                        .removeClass("form-control")
                        .addClass("form-control-plaintext")
                        .prop("readonly", "true");
                    $("#emp_profile_edit").show();
                    $(".textveiw").show();
                    $(".slec").addClass("d-none");
                    $("#empProfileSubmit")
                        .addClass("d-none")
                        .removeClass("d-block");
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

    // Post a job
    $("#empProfileSubmit").on("click", function (event) {
        event.preventDefault();
        var form = $("#comProfile").serialize();
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/employer/addemp-profiledata",
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
                    $("input, textarea")
                        .removeClass("form-control")
                        .addClass("form-control-plaintext")
                        .prop("readonly", "true");
                    $("#emp_profile_edit").show();
                    $(".textveiw").show();
                    $(".slec").addClass("d-none");
                    $("#empProfileSubmit")
                        .addClass("d-none")
                        .removeClass("d-block");
                    swal({
                        title: response.message,
                        // text: "Please Login",
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
    $(".job_delete").on("click", function (event) {
        event.preventDefault();
        var enc_id = $(this).data("enc_id");
        var del_row = $(this).data("del_row");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Job!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $("#loader").fadeIn();
                $.ajax({
                    url: baseUrl + "/employer/emp-job-delete",
                    type: "POST",
                    data: { enc_id: enc_id },
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    success: function (response) {
                        $("#loader").fadeOut();
                        if (response.code == 200) {
                            $(".tr_no_" + del_row).remove();
                            // swal({
                            //     title: response.message,
                            //     // text: "Please Login",
                            //     icon: "success",
                            // });
                        } else {
                            swal({
                                title: response.message,
                                text: "Please Try Again",
                                icon: "error",
                            });
                        }
                    },
                });
            }
        });
    });
    $(".job_update").on("click", function (event) {
        event.preventDefault();
        var enc_id = $(this).data("enc_id");
        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/employer/emp-job-viewJob",
            type: "POST",
            data: { enc_id: enc_id },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                    swal({
                        title: response.message,
                        // text: "Please Login",
                        icon: "success",
                    }).then(function () {
                        window.location.href =
                            baseUrl + "/employer/emp-post-a-job-update";
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

    $(".job_inactive").on("change", function (event) {
        event.preventDefault();
        var enc_id = $(this).data("enc_id_inc");
        var row = $(this).data("row");
        var status = $(this).val();

        $("#loader").fadeIn();
        $.ajax({
            url: baseUrl + "/employer/emp-job-inactiveJob",
            type: "POST",
            data: { enc_id: enc_id, status: status },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            // context: $(".job_inactive"),
            success: function (response) {
                $("#loader").fadeOut();

                if (response.code == 200) {
                    if (response.message === "Inactive") {
                        $("#flexSwitchCheckDefault_" + row).val("Live");
                        $(".statusChange" + row)
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(
                                response.message +
                                    " <i class='fa fa-circle'></i>"
                            );
                    } else {
                        $("#flexSwitchCheckDefault_" + row).val("Inactive");
                        $(".statusChange" + row)
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(
                                response.message +
                                    " <i class='fa fa-circle'></i>"
                            );
                    }
                    swal({
                        title: response.message,
                        // text: "Please Login",
                        icon: "success",
                    });
                    //     .then(function () {
                    //     window.location.href =
                    //         baseUrl + "/employer/emp-manage-job";
                    // });
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

    $("#job_sal").on("change", function (event) {
        var sal_range = $(this).val();
        if (sal_range != "") {
            $(".sal_disply").removeClass("d-none");
        } else {
            $(".sal_disply").addClass("d-none");
        }
    });
    // Shorlisted
    // $(".shortlist").on("click", function (event) {
    $(document).on("click", ".shortlist", function (e) {
        e.preventDefault();
        var js_id = $(this).data("js_id");
        var job_id = $(this).data("job_id") ?? 0;
        var short_action = $(this).data("short_action");
        var row = $(this).data("row");
        if (js_id !== null && js_id !== 0) {
            $("#loader").fadeIn();
            $.ajax({
                url: baseUrl + "/employer/emp-job-shortlist",
                type: "POST",
                data: {
                    js_id: js_id,
                    job_id: job_id,
                    short_action: short_action,
                },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                context: $(".shortlist"),
                success: function (response) {
                    $("#loader").fadeOut();
                    if (response.code == 200) {
                        if (atob(short_action) === "No") {
                            
                            $("#candidate_" + row).remove();
                            // setTimeout(
                            //     window.location.reload(),4000
                            // );
                            
                        }
                        // $(this).html("<span>" + response.message + "</span>");
                        // $(this).removeAttr("data-job_id");
                        // $(this).removeAttr("data-js_id");
                        // $(this).removeClass("shortlist");
                        // $(this).find("a").remove();

                        if (response.message === "Shortlisted") {
                            $(this).find("i").removeClass("far").addClass("fa");
                            $(this).attr("data-short_action", btoa("No"));
                            $(this).data("short_action", btoa("No"));
                            //window.location.reload(),4000
                            // if (dashjs === 0) {
                            //     setTimeout(
                            //         location.reload.bind(location),
                            //         1000
                            //     );
                            // }
                        } else {
                            $(this).find("i").removeClass("fa").addClass("far");
                            $(this).attr("data-short_action", btoa("Yes"));
                            $(this).data("short_action", btoa("Yes"));
                        }
                        swal({
                            title: response.message,
                            text: "",
                            icon: "success",
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        swal({
                            title: response.message,
                            text: "Please Try Again",
                            icon: "error",
                        }).then(() => {
                            location.reload();
                        });
                    }
                }.bind(this),
            });
        } else {
            swal({
                title: "Something Went Wrong",
                text: "Please Try Again",
                icon: "error",
            });
        }
    });

    // $('.job_language').select2({
    //     maximumSelectionLength: 3,
    //     placeholder: 'Skills, Keywords',
    //     closeOnSelect: false,
    //     allowClear: true,
      
    //   });

     $("#gstpan").click(function (event) {
        swal({
            title: "Please Add Information First",
            text: "You need to add GST No or Pan No.",
            icon: "error",
        }).then(function () {
            window.location.href =baseUrl + "/employer/get-employer-profile";
        });
    });

    // Post a Job
    $("#postJob").click(function (event) {
        event.preventDefault();    
       
     
        $("#job_title_error").hide();
        $("#job_type_error").hide();
        $("#job_lang_error").hide();
        $("#job_lang_limit_error").hide();
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
        $("#select_work_mode_error").hide();
        $("#job_skills_limit_error").hide();


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
        // var content = quill.root.innerHTML;
        // var job_disc = $("#job_disc").val(content);
        var job_disc = $("#job_disc").val();
        var job_educ = $("#job_educ").val();
        var job_con_person = $("#job_con_person").val();
        var job_con_phone = $("#job_con_phone").val();
        var job_con_email = $("#job_con_email").val();
        var vacancy_count = $("#vacancy_count").val();
        var select_work_mode = $("#select_work_mode").val();

        $('#job_lang').on('change', function() {
            $("#job_lang_limit_error").hide();
                var selected = $(this).find('option:selected');
                if (selected.length > 3) {
                    selected.last().prop('selected', false);
                    $("#job_lang_limit_error").show();
                }else{
                    $("#job_lang_limit_error").hide();
                }
            });

        $('#job_skills').on('change', function() {
            $("#job_skills_limit_error").hide();
                var selected = $(this).find('option:selected');
                if (selected.length > 3) {
                    selected.last().prop('selected', false);
                    $("#job_skills_limit_error").show();
                }else{
                    $("#job_skills_limit_error").hide();
                }
            });


            // let jobs  = job_skills.length;
            // console.warn(jobs);
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    
        if (job_title === "") {
            $("#job_title_error").show();
            $("#job_title")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_type === "") {
            $("#job_type_error").show();
            $("#job_type")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_lang.length === 0) {
            $("#job_lang_error").show();
            $("#job_lang")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        
        if (job_indus === null) {
            $("#job_indus_error").show();
            $("#job_indus")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }

        if (job_func_area === null) {
            $("#job_func_area_error").show();
            $("#job_func_area")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }

        if (job_designation === null) {
            $("#job_designation_error").show();
            $("#job_designation")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_expr === null) {
            $("#job_expr_error").show();
            $("#job_expr")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_location === null) {
            $("#job_location_error").show();
            $("#job_location")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (select_work_mode.length === 0) {
            $("#select_work_mode_error").show();
            $("#select_work_mode")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (vacancy_count === "") {
            $("#vacancy_count_error").show();
            $("#vacancy_count")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_skills.length === 0) {
            $("#job_skills_error").show();
            $("#job_skills")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_disc === "") {
            $("#job_disc_error").show();
            $("#job_disc")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_educ === null) {
            $("#job_educ_error").show();
            $("#job_educ")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_con_person === "") {
            $("#job_con_person_error").show();
            $("#job_con_person")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_con_phone === "") {
            $("#job_con_phone_error").show();
            $("#job_con_phone")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
        if (job_con_phone.length < 8 || job_con_phone.length > 10) {
            $("#job_con_phone_error").show();
            return;
        }
        if (job_con_email === "") {
            $("#job_con_email_error").show();
            $("#job_con_email")[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
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
            url: baseUrl + "/employer/add-jobs-post",
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
                        window.location.href = baseUrl + "/employer/emp-manage-job";
                    });
                } else if (response.code == 202) {
                    swal({
                        title: response.message,
                        text: "Please renew the plan",
                        icon: "error",
                    }).then(function () {
                        window.location.href = baseUrl + "/employer-plans";
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
    $("#immidate_join").on("click", function (e) {
        $("#immidiate_shuffle").toggleClass("d-none");
    });

    // Jobseeker Found on Employer Section Left filter
    $(".jsfound_left_filters").on("change","input[type='checkbox'], input[type='radio']",function (e) {
            
            e.preventDefault();
            $("#loader").fadeIn();
            var form = $(".jsfound_left_filters").serialize();
          $("#jobseekerResults li").slideUp();
            $.ajax({
                url: baseUrl + "/employer/emp-browse-jobseeker",
                type: "GET",
                dataType: "json",
                data: form,
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (res) {
                    $("#loader").fadeOut();
                    var records = res.html;
                    var page = res.page;                    
                    var count = res.count;           
                    var lastpage = res.last_page;         // console.warn(page+'<= this is page'+count+'this is count');            
                    loadJobseeker(records, page, count,lastpage);
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(error);
                    $("#result").html("An error occurred.");
                },
            });
        }
    );

    $(document).on("click", ".page-linkem", function (e) {
        e.preventDefault();
       
        $("#loader").fadeIn();
        
        const page = $(this).data("page");
        const form = $(".jsfound_left_filters").serialize() + `&page=${page}`;    
        $.ajax({
            url: "/employer/emp-browse-jobseeker",
            type: "GET",
            dataType: "json",
            data: form,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                $("#loader").fadeOut();
                loadJobseeker(res.html, res.page, res.count, res.last_page);
            },
            error: function () {
                $("#loader").fadeOut();
                $("#jobseekerResults").html("<li>No Jobs Found</li>");
            },
        });
    });
});

// Function to fetch jobs for a specific page
// function fetchJobs(page) {
//     // Make an AJAX request
//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', '/searchJobs?page_no=' + page, true);
//     xhr.onload = function () {
//         if (xhr.status >= 200 && xhr.status < 300) {
//             // Parse the JSON response
//             var response = JSON.parse(xhr.responseText);
//             // Update job list container with fetched data
//             document.getElementById('jobListContainer').innerHTML = response.html;
//             // Update pagination container with pagination links
//             document.getElementById('paginationContainer').innerHTML = response.pagination;
//         } else {
//             console.error('Request failed with status:', xhr.status);
//         }
//     };
//     xhr.onerror = function () {
//         console.error('Request failed');
//     };
//     xhr.send();
// }

// Initial load of jobs for the first page
//fetchJobs(1);

// Event delegation for pagination links
// document.getElementById('paginationContainer').addEventListener('click', function (event) {
//     if (event.target.tagName === 'A') {
//         event.preventDefault();
//         var page = event.target.getAttribute('data-page');
//         fetchJobs(page);
//     }
// });
