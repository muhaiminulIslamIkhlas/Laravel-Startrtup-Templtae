<script>
    $('#checkPermissionAll').click(function(){
        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    })

    function checkPermissionByGroup(classname, checkThis){
        const getIdName = $("#"+checkThis.id);
        const classCheckBox = $('.'+classname+' input');
        if(getIdName.is(':checked')){
            classCheckBox.prop('checked',true);
        }else{
            classCheckBox.prop('checked',false);
        }
    }
</script>
