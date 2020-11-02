<script>
    jQuery(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": 'toast-top-full-width',
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    });
</script>
<script>
var SnippetLogin = function() {
    var e = $("#m_login"),
        i = function(e, i, a) {
            var t = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
            e.find(".alert").remove(), t.prependTo(e), t.animateClass("fadeIn animated"), t.find("span").html(a)
        },
        a = function() {
            e.removeClass("m-login--forget-password"), e.removeClass("m-login--signin"), e.addClass("m-login--signup"), e.find(".m-login__signup").animateClass("flipInX animated")
        },
        t = function() {
            e.removeClass("m-login--forget-password"), e.removeClass("m-login--signup"), e.addClass("m-login--signin"), e.find(".m-login__signin").animateClass("flipInX animated")
        },
        r = function() {
            e.removeClass("m-login--signin"), e.removeClass("m-login--signup"), e.addClass("m-login--forget-password"), e.find(".m-login__forget-password").animateClass("flipInX animated")
        },
        n = function() {
            $("#m_login_forget_password").click(function(e) {
                e.preventDefault(), r()
            }), $("#m_login_forget_password_cancel").click(function(e) {
                e.preventDefault(), t()
            }), $("#m_login_signup").click(function(e) {
                e.preventDefault(), a()
            }), $("#m_login_signup_cancel").click(function(e) {
                e.preventDefault(), t()
            })
        },
        l = function() {
            $("#m_login_signin_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form"),
                    action = t.attr('action');
                t.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        }
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), t.ajaxSubmit({
                    url: action,
                    success: function(e, r, n, l) {
                        var obj = $.parseJSON(e);
                        if(obj.status=='1'){
                            a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(t, "success", "You Are Successfully Logged In.");
                            toastr["success"]("You Are Successfully Logged In.", "Logged In");

                            window.open('<?php echo base_url()?>' + obj.role + '/dashboard', '_self');

                        }else{
                            a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(t, "danger", "Incorrect username or password. Please try again.");
                            toastr["error"]("Incorrect username or password. Please try again.", "Incorrect Data");
                        }

                    },
                    error: function (request, status, error) {
                        a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(t, "danger", "There Has Been Some Error Occurred !. Please try again.")
                       
                    }
                }))
            })
        },
        o = function() {
            $("#m_login_forget_password_submit").click(function(a) {
                a.preventDefault();
                var r = $(this),
                    n = $(this).closest("form");
                n.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), n.valid() && (r.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), n.ajaxSubmit({
                    url: "",
                    success: function(a, l, s, o) {
                        setTimeout(function() {
                            r.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), n.clearForm(), n.validate().resetForm(), t();
                            var a = e.find(".m-login__signin form");
                            a.clearForm(), a.validate().resetForm(), i(a, "success", "Cool! Password recovery instruction has been sent to your email.")
                        }, 2e3)
                    }
                }))
            })
        };
    return {
        init: function() {
            n(), l(), o()
        }
    }
}();
jQuery(document).ready(function() {
    SnippetLogin.init()
});
</script>
<script>
    <?php if ($this->session->flashdata('flashdata_msg') != "")
    {?>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.<?php echo $this->session->flashdata('flashdata_type')?>("<?php echo $this->session->flashdata('flashdata_msg')?>","<?php echo $this->session->flashdata('flashdata_title')?>");
    <?php } ?>
</script>