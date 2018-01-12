<script type="text/javascript">
//Geneal
function reset_form(){
    $('#form_jenis').trigger("reset");
    $('#form_sample').trigger("reset");
    $('#form_service').trigger("reset");
    $(".form-update").load(base_url+"product/load_ajax_page/service_modal");
}
var base_url = "<?php echo base_url()?>labid/admin/";
$(document).on("click",".statusUji", updateStatus)
            .on("click",".deleteUji",deleteUji)
            .on("click",".editService",get_single_service);

//=========================== Product ==============================
//Create
$('#form_jenis').submit(function(){
    var category = "jenis";
    var loader = "#body_modal_jenis_uji";
    var data = $(this).serialize();
    $.ajax({
        url : base_url+"product/add_jenis",
        data : data,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){                
                new PNotify({
                    title: 'Success notice',
                    text: data.msg,
                    addclass: 'bg-success'
                });
                $('#modal_jenis_uji').modal('hide');
                reset_form();
                $("#body-"+category).load(base_url+"product/load_ajax_page/"+category);                
            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            alert(x.responseText);
        }
    })  
});

$('#form_sample').submit(function(){
    var category = "sample";
    var loader = "#body_modal_sample_uji";
    var data = $(this).serialize();
    $.ajax({
        url : base_url+"product/add_sample",
        data : data,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){                
                new PNotify({
                    title: 'Success notice',
                    text: data.msg,
                    addclass: 'bg-success'
                });
                $('#modal_sample_uji').modal('hide');
                reset_form();
                $("#body-"+category).load(base_url+"product/load_ajax_page/"+category);
            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            //alert(x.responseText);
        }
    })  
});

$('#form_service').submit(function(){
    var category = "service";
    var loader = "#body_modal_service_uji";
    var data = $(this).serialize();
    $.ajax({
        url : base_url+"product/add_service",
        data : data,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){                
                new PNotify({
                    title: 'Success notice',
                    text: data.msg,
                    addclass: 'bg-success'
                });
                $('#modal_service_uji').modal('hide');
                reset_form()
                $("#body-"+category).load(base_url+"product/load_ajax_page/"+category);
            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            //alert(x.responseText);
        }
    })  
});

//Update
function get_single_service(){
    var id = $(this).data('id');
    var category = $(this).data('category');
    var loader = "#panel-"+category;
    var data = {'id':id}

    $.ajax({
        url : base_url+"product/get_single_service",
        data : data,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            reset_form()
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){
                $('#modal_edit_service_uji').modal('show');
                var v = data.data;
                document.forms['edit_form_service']['id_jenis'].value = v['id_jenis'];
                document.forms['edit_form_service']['id_sample'].value = v['id_sample'];
                document.getElementById("edit_id_company").value= v['id_company'];
                document.forms['edit_form_service']['id_jenis'].disabled  = true;
                document.forms['edit_form_service']['id_sample'].disabled  = true;
                document.getElementById("edit_id_company").disabled  = true;
                document.getElementById("edit_normal_price").value = v['normal_price'];
                document.getElementById("edit_normal_time").value = v['normal_time'];
                document.getElementById("edit_urgent_price").value = v['urgent_price'];
                document.getElementById("edit_urgent_time").value = v['urgent_time'];
                document.getElementById("edit_retest_price").value = v['retest_price'];
                document.getElementById("edit_retest_time").value = v['retest_time'];
                document.getElementById("edit_retest_time").value = v['retest_time'];
                document.getElementById("edit_service_description").value = v['service_description'];
                document.getElementById("edit_id_service").value = v['id_service'];
                

            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            alert(x.responseText);
        }
    }) 
}

$('#edit_form_service').submit(function(){
    var category = "service";
    var loader = "#edit_body_modal_service_uji";
    var data = $(this).serialize();
    $.ajax({
        url : base_url+"product/edit_service",
        data : data,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){                
                new PNotify({
                    title: 'Success notice',
                    text: data.msg,
                    addclass: 'bg-success'
                });
                $('#modal_edit_service_uji').modal('hide');
                reset_form()
                $("#body-"+category).load(base_url+"product/load_ajax_page/"+category);
            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            //alert(x.responseText);
        }
    })  
});


function updateStatus(){
    var id = $(this).data('id');
    var status = $(this).data('status');
    var category = $(this).data('category');
    var loader = "#panel-"+category;
    var data = {'id':id, 'status':status, 'category':category }

    $.ajax({
        url : base_url+"product/update_status",
        data : data,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){                
                new PNotify({
                    title: 'Success notice',
                    text: data.msg,
                    addclass: 'bg-success'
                });
                reset_form()
                $("#body-"+category).load(base_url+"product/load_ajax_page/"+category);
                if(category!='service'){                    
                    $("#body-service").load(base_url+"product/load_ajax_page/service");
                }
            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            alert(x.responseText);
        }
    })    
}

//Delete
function deleteUji(){
    var id = $(this).data('id');
    var category = $(this).data('category');
    var name = $(this).data('name');
    var loader = "#panel-"+category;
    var data_post = {'id':id, 'category':category }
    
    //get count data service
    $.ajax({
        url : base_url+"product/get_count_service",
        data : data_post,
        dataType :"json",
        type : "POST",
        beforeSend: function() {
            $(loader).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#1B2024',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        },
        complete: function(){
            $(loader).unblock();
        },
        success : function(data,status){
            if(data.status!="error"){
                if(data.data == '0') {
                    $notif = '<p>Are you sure you want to delete <b>'+name+'</b> ?</p>';
                } else {
                    $notif = '<p>Found <b>'+data.data+' services</b> in <b>'+name+'</b>, Are you sure you want to delete ?</p>';
                }

                var notice = new PNotify({
                    title: 'Confirmation',
                    text: $notif,
                    hide: true,
                    type: 'warning',
                    confirm: {
                        confirm: true,
                        buttons: [
                            {
                                text: 'Yes',
                                addClass: 'btn btn-sm btn-primary'
                            },
                            {
                                addClass: 'btn btn-sm btn-link'
                            }
                        ]
                    },
                    buttons: {
                        closer: false,
                        sticker: false
                    },
                    history: {
                        history: false
                    }
                })

                // On confirm
                notice.get().on('pnotify.confirm', function() {
                    $.ajax({
                        url : base_url+"product/delete_uji",
                        data : data_post,
                        dataType :"json",
                        type : "POST",
                        beforeSend: function() {
                            $(loader).block({
                                message: '<i class="icon-spinner4 spinner"></i>',
                                overlayCSS: {
                                    backgroundColor: '#1B2024',
                                    opacity: 0.8,
                                    cursor: 'wait'
                                },
                                css: {
                                    border: 0,
                                    padding: 0,
                                    backgroundColor: 'none'
                                }
                            });
                        },
                        complete: function(){
                            $(loader).unblock();
                        },
                        success : function(data,status){
                            if(data.status!="error"){                
                                new PNotify({
                                    title: 'Success notice',
                                    text: data.msg,
                                    addclass: 'bg-success'
                                });
                                $("#body-"+category).load(base_url+"product/load_ajax_page/"+category);
                                $("#body-service").load(base_url+"product/load_ajax_page/service");
                                reset_form()
                            }else{
                                new PNotify({
                                    title: 'Warning notice',
                                    text: data.msg,
                                    addclass: 'bg-warning'
                                });
                            }
                        },
                        error : function(x,t,m){
                            alert(x.responseText);
                        }
                    })   
                })

                // On cancel
                notice.get().on('pnotify.cancel', function() {
                    
                });
            }else{
                new PNotify({
                    title: 'Warning notice',
                    text: data.msg,
                    addclass: 'bg-warning'
                });
            }
        },
        error : function(x,t,m){
            alert(x.responseText);
        }
    })                     
}
//=========================== Product ==============================


</script>