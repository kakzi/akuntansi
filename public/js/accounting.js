$('#group_id').change(function(){
    var groupId = $(this).val();    
    if(groupId){
        $.ajax({
            type:"GET",
            url:"/admin/sub_group_id?groupId="+groupId,
            dataType: 'JSON',
            success:function(res){               
            if(res){
                $("#sub_group_id").empty();
                $("#subDetails").empty();
                $("#sub_group_id").append('<option value="0">---Pilih Sub Group---</option>');
                $("#subDetails").append('<option value="0">---Pilih Sub Details---</option>');
                $.each( res,function( name , id ){
                $("#sub_group_id").append('<option value="'+id+'">'+name+'</option>');
                });
                } else {
                    $("#sub_group_id").empty();
                    $("#subDetails").empty();
                }
            }
        });
    } else {
        $("#sub_group_id").empty();
        $("#subDetails").empty();
    }      
});
    
$('#sub_group_id').change(function(){
    var groupId = $("#group_id").val();
    var subId = $(this).val();    
    if(subId){
        $.ajax({
            type:"GET",
            url:"/admin/getDetails?subId="+subId+"&groupId="+groupId,
            dataType: 'JSON',
            success:function(res){               
                if(res){
                    $("#subDetails").empty();
                    $("#subDetails").append('<option value="0">---Pilih Sub Details---</option>');
                    $.each(res,function(name,id){
                    $("#subDetails").append('<option value="'+ id +'">'+ name +'</option>');
                    });
                } else {
                    $("#subDetails").empty();
                }
            }
        });
    } else {
        $("#subDetails").empty();
    }      
});