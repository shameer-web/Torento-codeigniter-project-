<style>
    /*    Datatable Hide Columns*/
    .hide_column {
        display : none;
    }
</style>
<script>
//  User List Data Table
    var Datatable=function() {

        var t=function() {
                var table = $('#news_view_table').DataTable({
                "ajax":{
                    url :"<?php echo base_url()?>admin/registrations/select", // json datasource
                    type: "post", // type of method  , by default would be get
                    data: function(d){

                    }
                },
                "bProcessing": true,
                "deferRender": true,
                "bDeferRender": true,
                "scrollX" : true,
                buttons: [
                    { extend: 'print', className: 'btn dark btn-outline' },
                    { extend: 'csv', className: 'btn purple btn-outline ' },
                    { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
                ],
                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,
                "columnDefs": [
                    // {
                    //     "targets": [ 2,5 ],
                    //     "className": "hide_column"
                    // }
                ],
                'order': [[0, 'desc']]
            });
            $(".table_filter").on("change", function() {
                table.ajax.reload();
            });
            $(".hide_column").hide();
        };
        return {
            init:function() {
                t()
            }
        }
    }

    ();
    jQuery(document).ready(function() {
            Datatable.init();
            $(".hidden").hide();
        }

    );
</script>
<script>
//  User Add / Edit Form Validation
    var FormControls=function() {

        add=function() {
            $("#form_news_add").validate( {
                rules: {
                    title: {
                        required: !0
                    }
                    , description: {
                        required: !0
                    }
                    , addedby: {
                        required: !0
                    }

                    , uploaded_file: {
                        required: !0
                    }

                }
                , invalidHandler:function(e, r) {
                    var i=$("#form_news_add_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                }
                , submitHandler:function(e) {
                    mApp.block("#user_add_modal .modal-content", {
                        overlayColor: "#000000",
                        type: "loader",
                        state: "success",
                        message: "Processing... Please wait."
                    }), setTimeout(function() {}, 3e3);
                    mApp.blockPage({
                        overlayColor: "#000000",
                        type: "loader",
                        state: "primary",
                        message: "Processing...Please Wait"
                    }), setTimeout(function() {}, 3e3);
                    this.submit();
                }
            });
            $('.m-select2,.m-select2-multiple',  $("#form_user_add")).change(function () {
                $("#form_user_add").validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
                $(this).select2("close");
            });
        };
        edit=function() {
            $("#form_news_edit").validate( {
                    rules: {
                        title: {
                            required: !0
                        }
                        ,
                        description: {
                            required: !0
                        }
                        , addedby: {
                            required: !0
                        }


                    }
                    , invalidHandler:function(e, r) {
                        var i=$("#form_user_edit_msg");
                        i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                    }
                    , submitHandler:function(e) {
                        mApp.blockPage({
                            overlayColor: "#000000",
                            type: "loader",
                            state: "primary",
                            message: "Processing...Please Wait"
                        }), setTimeout(function() {}, 3e3);
                        mApp.block("#user_edit_modal .modal-content", {
                            overlayColor: "#000000",
                            type: "loader",
                            state: "success",
                            message: "Processing... Please wait."
                        }), setTimeout(function() {}, 3e3);
                        this.submit();
                    }
                }
            );
//            $('.m-select2,.m-select2-multiple',  $("#form_user_edit")).change(function () {
//                $("#form_user_edit").validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
//                $(this).select2("close");
//            });
        };
        return {
            init:function() {
                add();
                edit();
            }
        }
    }

    ();
    jQuery(document).ready(function() {
            FormControls.init();
    });
</script>
<script>
    $('body').on('click', '#news_edit_btn', function() {
        var no = $(this).closest('tr').children('td');

        $('#news_id').val(no.eq(0).text());
        $('#title1').val(no.eq(1).text());
        $('#description1').val(no.eq(2).text());
//        $('#summernote_33').summernote({height: 300});
//        $('#summernote_33').code(no.eq(2).text());

        $('#addedby1').val(no.eq(3).text());
        $('#category1').val(no.eq(7).text()).trigger('change');
        $('#type1').val(no.eq(8).text()).trigger('change');
        $('#img').val(no.eq(5).text());


    })
    $('body').on('click', '#news_delete_btn', function() {
        var no = $(this).closest('tr').children('td');

        $('#deleteid').val(no.eq(0).text());

    })
</script>
<script>
    $('body').on('change', '#type', function() {
        $("#img_label").html('');
        $("#img_label").append("<label></label>");
        var type=$('#type :selected').val();
        $.post("<?php echo base_url()?>admin/news/select_img_size", {
            type: type
        }, function (data) {
            var obj = $.parseJSON(data);
            if (obj.status == 1) {

                   $("#img_label").append("<label> "+obj.image_size+"</label>");

            }
            $("#img_label").trigger('change');

        });

    })
</script>
<script>
    $('body').on('change', '#type1', function() {
        $("#img_label2").html('');
        $("#img_label2").append("<label></label>");
        var type=$('#type1 :selected').val();
        $.post("<?php echo base_url()?>admin/news/select_img_size", {
            type: type
        }, function (data) {
            var obj = $.parseJSON(data);
            if (obj.status == 1) {

                $("#img_label2").append("<label> "+obj.image_size+"</label>");

            }
            $("#img_label2").trigger('change');

        });

    })
</script>