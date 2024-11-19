jQuery(document).ready(function () {
    new DataTable(".datatable", {
        ordering: false,
        lengthChange: false
    });

    if (notification) {
        Swal.fire({
            title: notification.title,
            text: notification.text,
            icon: notification.icon
        });
    }

    $("#login_form").submit(function () {
        const username = $("#login_username").val();
        const password = $("#login_password").val();

        is_loading(true, "login");

        var formData = new FormData();

        formData.append('username', username);
        formData.append('password', password);

        formData.append('action', 'login');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    setTimeout(function () {
                        $("#login_alert").removeClass("d-none");

                        is_loading(false, "login");
                    }, 1500);
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#register_form").submit(function () {
        const name = $("#register_name").val();
        const username = $("#register_username").val();
        const password = $("#register_password").val();
        const confirm_password = $("#register_confirm_password").val();

        is_loading(true, "register");

        if (password != confirm_password) {
            $("#register_alert").text("Passwords do not match");
            $("#register_alert").removeClass("d-none");

            $("#register_password").addClass("is-invalid");
            $("#register_confirm_password").addClass("is-invalid");

            is_loading(false, "register");
        } else {
            var formData = new FormData();

            formData.append('name', name);
            formData.append('username', username);
            formData.append('password', password);

            formData.append('action', 'register');

            $.ajax({
                url: 'server',
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        setTimeout(function () {
                            $("#register_alert").text("Username is already in use");
                            $("#register_alert").removeClass("d-none");

                            $("#register_username").addClass("is-invalid");

                            is_loading(false, "register");
                        }, 1500);
                    }
                },
                error: function (_, _, error) {
                    console.error(error);
                }
            });
        }
    })

    $("#register_username").keydown(function () {
        $("#register_alert").addClass("d-none");

        $("#register_username").removeClass("is-invalid");
    })

    $("#register_password").keydown(function () {
        $("#register_alert").addClass("d-none");

        $("#register_password").removeClass("is-invalid");
        $("#register_confirm_password").removeClass("is-invalid");
    })

    $("#register_confirm_password").keydown(function () {
        $("#register_alert").addClass("d-none");

        $("#register_password").removeClass("is-invalid");
        $("#register_confirm_password").removeClass("is-invalid");
    })

    $("#new_booking_submit_2").click(function () {
        $("#new_booking_form").submit();
    })

    $("#logout").click(function () {
        var formData = new FormData();

        formData.append('action', 'logout');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    if ((page == "my_bookings") || (page == "manage_bookings") || (page == "manage_vans") || (page == "manage_messages")) {
                        location.href = "/";
                    } else {
                        location.reload();
                    }
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#new_booking_form").submit(function () {
        if (!user_id) {
            Swal.fire({
                title: "Oops...",
                text: "You need to login first.",
                icon: "error"
            });
        } else {
            const origin = $("#new_booking_origin").val();
            const destination = $("#new_booking_destination").val();
            const trip_date = $("#new_booking_trip_date").val();
            const trip_time = $("#new_booking_trip_time").val();
            const fare = $("#new_booking_fare").val();

            $("#new_booking_modal_origin").val(origin);
            $("#new_booking_modal_destination").val(destination);
            $("#new_booking_modal_trip_date").val(trip_date);
            $("#new_booking_modal_trip_time").val(trip_time);
            $("#new_booking_modal_fare").text(fare);

            $("#new_booking_modal").modal("show");
        }
    })

    $(".needs-login").click(function () {
        Swal.fire({
            title: "Oops...",
            text: "You need to login first.",
            icon: "error"
        });
    })

    $("#new_booking_modal_form").submit(function () {
        const passenger_id = $("#new_booking_modal_passenger_id").val();
        const van_id = $("#new_booking_modal_van_id").val();
        const origin = $("#new_booking_modal_origin").val();
        const destination = $("#new_booking_modal_destination").val();
        const trip_date = $("#new_booking_modal_trip_date").val();
        const trip_time = $("#new_booking_modal_trip_time").val();
        const fare = $("#new_booking_modal_fare").text();

        is_loading(true, "new_booking_modal");

        var formData = new FormData();

        formData.append('passenger_id', passenger_id);
        formData.append('van_id', van_id);
        formData.append('origin', origin);
        formData.append('destination', destination);
        formData.append('trip_date', trip_date);
        formData.append('trip_time', trip_time);
        formData.append('fare', fare);

        formData.append('action', 'new_booking_modal');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#new_booking_destination").change(function () {
        const destination = $(this).val();

        let fare = 0;

        switch (destination) {
            case "Oras":
                fare = 100;
                break;
            case "Dolores":
                fare = 50;
                break;
            case "Taft":
                fare = 50;
                break;
            case "Sulat":
                fare = 100;
                break;
            case "San Julian":
                fare = 150;
                break;
            case "Borongan":
                fare = 200;
                break;
            default:
                fare = 0;
                break;
        }

        $("#new_booking_fare").val(fare);
    })

    $("#new_booking_trip_date").change(function () {
        const selectedDate = new Date($(this).val());
        const currentDate = new Date();

        currentDate.setHours(0, 0, 0, 0);

        if (selectedDate <= currentDate) {
            Swal.fire({
                title: "Oops...",
                text: "The Travel Date must be a future date.",
                icon: "error"
            });

            $(this).val('');
        }
    })

    $("#new_booking_trip_time").change(function () {
        const timeValue = $(this).val().toLowerCase().trim();
        const timeRegex = /^(\d{1,2}):(\d{2})(am|pm)$/;

        const match = timeValue.match(timeRegex);

        if (!match) {
            Swal.fire({
                title: "Invalid Format",
                text: "Please enter a valid time (e.g., 6:00am or 6:00pm).",
                icon: "error"
            }).then(() => {
                $(this).val('').focus();
            });
            return;
        }

        const [, hoursStr, minutesStr, period] = match;
        let hours = parseInt(hoursStr, 10);
        const minutes = parseInt(minutesStr, 10);

        if (period === "pm" && hours !== 12) {
            hours += 12;
        } else if (period === "am" && hours === 12) {
            hours = 0;
        }

        const isValidTime = hours >= 5 && (hours < 17 || (hours === 17 && minutes === 0));

        if (!isValidTime) {
            Swal.fire({
                title: "Invalid Time",
                text: "The departure time must be between 5:00 AM and 5:00 PM.",
                icon: "error"
            }).then(() => {
                $(this).val('').focus();
            });
        }
    })

    $("#new_booking_modal_destination").change(function () {
        const destination = $(this).val();

        let fare = 0;

        switch (destination) {
            case "Oras":
                fare = 100;
                break;
            case "Dolores":
                fare = 50;
                break;
            case "Taft":
                fare = 50;
                break;
            case "Sulat":
                fare = 100;
                break;
            case "San Julian":
                fare = 150;
                break;
            case "Borongan":
                fare = 200;
                break;
            default:
                fare = 0;
                break;
        }

        $("#new_booking_modal_fare").text(fare);
    })

    $("#new_booking_modal_trip_date").change(function () {
        const selectedDate = new Date($(this).val());
        const currentDate = new Date();

        currentDate.setHours(0, 0, 0, 0);

        if (selectedDate <= currentDate) {
            Swal.fire({
                title: "Oops...",
                text: "The Travel Date must be a future date.",
                icon: "error"
            });

            $(this).val('');
        }
    })

    $("#new_booking_modal_trip_time").change(function () {
        const timeValue = $(this).val().toLowerCase().trim();
        const timeRegex = /^(\d{1,2}):(\d{2})(am|pm)$/;

        const match = timeValue.match(timeRegex);

        if (!match) {
            Swal.fire({
                title: "Invalid Format",
                text: "Please enter a valid time (e.g., 6:00am or 6:00pm).",
                icon: "error"
            }).then(() => {
                $(this).val('').focus();
            });
            return;
        }

        const [, hoursStr, minutesStr, period] = match;
        let hours = parseInt(hoursStr, 10);
        const minutes = parseInt(minutesStr, 10);

        if (period === "pm" && hours !== 12) {
            hours += 12;
        } else if (period === "am" && hours === 12) {
            hours = 0;
        }

        const isValidTime = hours >= 5 && (hours < 17 || (hours === 17 && minutes === 0));

        if (!isValidTime) {
            Swal.fire({
                title: "Invalid Time",
                text: "The departure time must be between 5:00 AM and 5:00 PM.",
                icon: "error"
            }).then(() => {
                $(this).val('').focus();
            });
        }
    })

    $(".unavailable").click(function () {
        Swal.fire({
            title: "Oops...",
            text: "This van is currently unavailable.",
            icon: "error"
        });
    })

    $(document).on("click", ".confirm_cancel_booking", function () {
        const booking_id = $(this).attr("booking_id");
        let status = $(this).attr("status");

        Swal.fire({
            title: "Are you sure?",
            text: "You are going to " + status + " this booking.",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, " + status + " it!"
        }).then((result) => {
            if (result.isConfirmed) {
                if (status == "CONFIRM") {
                    status = "confirmed";
                } else {
                    status = "cancelled";
                }

                var formData = new FormData();

                formData.append('booking_id', booking_id);
                formData.append('status', status);

                formData.append('action', 'update_status');

                $.ajax({
                    url: 'server',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function (_, _, error) {
                        console.error(error);
                    }
                });
            }
        });
    })

    $(".book_now").click(function () {
        const van_id = $(this).attr("van_id");

        $("#new_booking_modal_origin").val("Can-Avid Terminal");
        $("#new_booking_modal_van_id").val(van_id);

        $("#new_booking_modal").modal("show");
    })

    $(".van_details").click(function () {
        const van_id = $(this).attr("van_id");

        is_loading(true, "none");

        $("#van_details_modal").modal("show");

        var formData = new FormData();

        formData.append('van_id', van_id);

        formData.append('action', 'get_van_data');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $("#van_details_brand").text(response.message.brand);
                    $("#van_details_model").text(response.message.model);
                    $("#van_details_capacity").text(response.message.capacity);

                    let status = response.message.status;
                    let capitalizedStatus = status.charAt(0).toUpperCase() + status.slice(1);

                    $("#van_details_status").text(capitalizedStatus);

                    let status_color = response.message.status == "available" ? "text-success" : "text-danger";

                    $("#van_details_status").removeClass("text-success");
                    $("#van_details_status").removeClass("text-danger");

                    $("#van_details_status").addClass(status_color);

                    $("#van_details_image").attr("src", "uploads/vans/" + response.message.image);

                    is_loading(false, "none");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $(".no-function").click(function () {
        Swal.fire({
            title: "Oops...",
            text: "This function is not yet available.",
            icon: "error"
        });
    })

    $("#contact_form").submit(function () {
        const name = $("#contact_name").val();
        const email = $("#contact_email").val();
        const subject = $("#contact_subject").val();
        const message = $("#contact_message").val();

        $("#contact_submit").val("Please Wait..");
        $("#contact_submit").attr("disabled", true);

        var formData = new FormData();

        formData.append('name', name);
        formData.append('email', email);
        formData.append('subject', subject);
        formData.append('message', message);

        formData.append('action', 'send_message');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#account_settings").click(function () {
        const user_id = $(this).attr("user_id");

        is_loading(true, "account_settings");

        $("#account_settings_modal").modal("show");

        var formData = new FormData();

        formData.append('user_id', user_id);

        formData.append('action', 'get_user_data');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $("#account_settings_id").val(response.message.id);
                    $("#account_settings_name").val(response.message.name);
                    $("#account_settings_username").val(response.message.username);
                    $("#account_settings_old_password").val(response.message.password);

                    is_loading(false, "account_settings");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#account_settings_form").submit(function () {
        const name = $("#account_settings_name").val();
        const username = $("#account_settings_username").val();
        const password = $("#account_settings_password").val();
        const id = $("#account_settings_id").val();
        const old_password = $("#account_settings_old_password").val();

        is_loading(true, "account_settings");

        var formData = new FormData();

        formData.append('name', name);
        formData.append('username', username);
        formData.append('password', password);
        formData.append('id', id);
        formData.append('old_password', old_password);

        formData.append('action', 'update_account');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    $("#account_settings_alert").removeClass("d-none");
                    $("#account_settings_username").addClass("is-invalid");

                    is_loading(false, "account_settings");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#account_settings_username").keydown(function () {
        $("#account_settings_alert").addClass("d-none");
        $("#account_settings_username").removeClass("is-invalid");
    })

    $("#new_van_image").change(function (event) {
        try {
            const reader = new FileReader();

            reader.onload = function (e) {
                $('#new_van_image_display').attr('src', e.target.result);
            };

            reader.readAsDataURL(event.target.files[0]);
        } catch {
            $('#new_van_image_display').attr('src', "uploads/vans/default-item-image.png");
        }
    })

    $("#new_van_form").submit(function () {
        const model = $("#new_van_model").val();
        const brand = $("#new_van_brand").val();
        const capacity = $("#new_van_capacity").val();
        const status = $("#new_van_status").val();
        const image = $("#new_van_image").prop("files")[0];

        is_loading(true, "new_van");

        var formData = new FormData();

        formData.append('model', model);
        formData.append('brand', brand);
        formData.append('capacity', capacity);
        formData.append('status', status);
        formData.append('image', image);

        formData.append('action', 'new_van');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    $("#new_van_alert").removeClass("d-none");

                    $("#new_van_model").addClass("is-invalid");
                    $("#new_van_brand").addClass("is-invalid");

                    is_loading(false, "new_van");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#new_van_model").keydown(function () {
        $("#new_van_alert").addClass("d-none");

        $("#new_van_model").removeClass("is-invalid");
        $("#new_van_brand").removeClass("is-invalid");
    })

    $("#new_van_brand").keydown(function () {
        $("#new_van_alert").addClass("d-none");

        $("#new_van_model").removeClass("is-invalid");
        $("#new_van_brand").removeClass("is-invalid");
    })

    $(document).on("click", ".delete_van", function () {
        const van_id = $(this).attr("van_id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();

                formData.append('van_id', van_id);

                formData.append('action', 'delete_van');

                $.ajax({
                    url: 'server',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function (_, _, error) {
                        console.error(error);
                    }
                });
            }
        });

    })

    $(document).on("click", ".edit_van", function () {
        const van_id = $(this).attr("van_id");

        is_loading(true, "update_van");

        $("#update_van_modal").modal("show");

        var formData = new FormData();

        formData.append('van_id', van_id);

        formData.append('action', 'get_van_data');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $("#update_van_id").val(response.message.id);
                    $("#update_van_model").val(response.message.model);
                    $("#update_van_brand").val(response.message.brand);
                    $("#update_van_capacity").val(response.message.capacity);
                    $("#update_van_status").val(response.message.status);
                    $("#update_van_old_image").val(response.message.image);

                    $("#update_van_image_display").attr("src", "uploads/vans/" + response.message.image);

                    is_loading(false, "update_van");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#update_van_image").change(function (event) {
        try {
            const reader = new FileReader();

            reader.onload = function (e) {
                $('#update_van_image_display').attr('src', e.target.result);
            };

            reader.readAsDataURL(event.target.files[0]);
        } catch {
            $('#update_van_image_display').attr('src', "uploads/vans/" + $("#update_van_old_image").val());
        }
    })

    $("#update_van_form").submit(function () {
        const model = $("#update_van_model").val();
        const brand = $("#update_van_brand").val();
        const capacity = $("#update_van_capacity").val();
        const status = $("#update_van_status").val();
        const image = $("#update_van_image").prop("files")[0];

        const id = $("#update_van_id").val();
        const old_image = $("#update_van_old_image").val();

        is_loading(true, "update_van");

        var formData = new FormData();

        formData.append('model', model);
        formData.append('brand', brand);
        formData.append('capacity', capacity);
        formData.append('status', status);
        formData.append('image', image);
        formData.append('id', id);
        formData.append('old_image', old_image);

        formData.append('action', 'update_van');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    $("#update_van_alert").removeClass("d-none");

                    $("#update_van_model").addClass("is-invalid");
                    $("#update_van_brand").addClass("is-invalid");

                    is_loading(false, "update_van");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $("#update_van_model").keydown(function () {
        $("#update_van_alert").addClass("d-none");

        $("#update_van_model").removeClass("is-invalid");
        $("#update_van_brand").removeClass("is-invalid");
    })

    $("#update_van_brand").keydown(function () {
        $("#update_van_alert").addClass("d-none");

        $("#update_van_model").removeClass("is-invalid");
        $("#update_van_brand").removeClass("is-invalid");
    })

    $(document).on("click", ".view_message", function () {
        const message_id = $(this).attr("message_id");

        is_loading(true, "view_message");

        $("#view_message_modal").modal("show");

        var formData = new FormData();

        formData.append('message_id', message_id);

        formData.append('action', 'view_message');

        $.ajax({
            url: 'server',
            data: formData,
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    const originalDate = "2024-11-16 23:06:20";
                    const date = new Date(response.message.created_at);
                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    };
                    const created_at = date.toLocaleString('en-US', options);

                    $("#view_message_created_at").text(created_at);
                    $("#view_message_name").text(response.message.name);
                    $("#view_message_email").text(response.message.email);
                    $("#view_message_subject").text(response.message.subject);
                    $("#view_message_message").text(response.message.message);

                    is_loading(false, "view_message");
                }
            },
            error: function (_, _, error) {
                console.error(error);
            }
        });
    })

    $(document).on("click", ".delete_message", function () {
        const message_id = $(this).attr("message_id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();

                formData.append('message_id', message_id);

                formData.append('action', 'delete_message');

                $.ajax({
                    url: 'server',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function (_, _, error) {
                        console.error(error);
                    }
                });
            }
        });
    })

    function is_loading(state, form) {
        if (state) {
            $(".main-form").addClass("d-none");
            $(".loading").removeClass("d-none");

            $("#" + form + "_submit").attr("disabled", true);
        } else {
            $(".main-form").removeClass("d-none");
            $(".loading").addClass("d-none");

            $("#" + form + "_submit").removeAttr("disabled");
        }
    }
})