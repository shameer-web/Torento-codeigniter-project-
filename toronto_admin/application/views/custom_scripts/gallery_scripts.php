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
                var table = $('#gallery_view_table').DataTable({
                "ajax":{
                    url :"<?php echo base_url()?>admin/gallery/select", // json datasource
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
                    {
                        "targets": [ 1 ],
                        "className": "hide_column"
                    }
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
            $("#form_gallery_add").validate( {
                rules: {
                    title: {
                        required: !0
                    }
                    , description: {
                        required: !0
                    }
                    , uploaded_file: {
                        required: !0
                    }

                }
                , invalidHandler:function(e, r) {
                    var i=$("#form_gallery_add_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                }
                , submitHandler:function(e) {
                    mApp.block("#gallery_add_modal .modal-content", {
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
            $('.m-select2,.m-select2-multiple',  $("#form_testimonial_add")).change(function () {
                $("#form_user_add").validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
                $(this).select2("close");
            });
        };
        edit=function() {
            $("#form_gallery_edit").validate( {
                    rules: {
                        title: {
                            required: !0
                        },
                        description{
                            required: !0
                        }



                    }
                    , invalidHandler:function(e, r) {
                        var i=$("#form_gallery_edit_msg");
                        i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                    }
                    , submitHandler:function(e) {
                        mApp.blockPage({
                            overlayColor: "#000000",
                            type: "loader",
                            state: "primary",
                            message: "Processing...Please Wait"
                        }), setTimeout(function() {}, 3e3);
                        mApp.block("#gallery_edit_modal .modal-content", {
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

     $('body').on('click', '#gallery_edit_btn', function() {
        var no = $(this).closest('tr').children('td');
        

       $('#gallery_id').val(no.eq(0).text());
       // $('#image').val(no.eq(1).text());

        $('#title').val(no.eq(3).text());
        $('#description').val(no.eq(4).text());



    })








    // $('body').on('click', '#gallery_edit_btn', function() {
    //     var no = $(this).closest('tr').children('td');

    //    $('#gallery_id').val(no.eq(0).text());

       
    //     $('#category').val(no.eq(1).text()).trigger('change');

    //      $('#uploaded_file').val(no.eq(2).text());
    //       $('#title').val(no.eq(3).text());


    

    // })



    //  $(document).ready(function(){
    //  $('#gallery_edit_btn').on('click',function(){
    //    $('#gallery_edit_modal').modal('show');


    //    $tr =$(this).closest('tr');
    //    var data =$tr.children("td").map( function(){
    //     return $(this).text();
    //    }).get();
    //    console.log.(data);

    //    $(#gallery_id).val(data[0]);
    //    $(#category).val(data[1]);
    //     $(#uploaded_file).val(data[1]);
    //      $(#title).val(data[1]);

    //  })

    // })



    $('body').on('click', '#gallery_delete_btn', function() {
        var no = $(this).closest('tr').children('td');

        $('#deleteid').val(no.eq(0).text());

    })
</script>
