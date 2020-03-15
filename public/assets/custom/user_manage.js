jQuery(document).ready(function(){
    $('button#add_user').click(function(){
        var username = $('input#user_add_name').val();
        var email = $('input#user_add_email').val();
        var password = $('input#user_add_password').val();
        var role = $('select#roleName_add').find(':selected').attr('value')
        
        $.post(
            '/users/add',
            {
                _token : $('input#page_token').val(),
                username : username,
                email : email,
                password:password,
                role_id : role,
            },
            function(result){
                alert('successful saved!');
                location.reload();
            }
        )

    });

    $('button#edit_user_btn').click(function (){
        var edit_username = $(this).parent().prev().prev().prev().prev().text();
        var edit_id = $(this).attr('val');
        var edit_email = $(this).parent().prev().prev().prev().text();
        var edit_password = $(this).parent().prev().prev().text();
        var edit_role = $(this).parent().prev().attr('val');
        $('input#user_edit_name').val(edit_username);
        $('input#user_edit_name').attr('val',edit_id);
        $('input#user_edit_email').val(edit_email);
        $('input#user_edit_password').val(edit_password);
        $('select#roleName_edit').find('option[value='+edit_role+']').attr('selected', 'selected')
    })

    $('button#edit_user').click(function(){
        var edit_username = $('input#user_edit_name').val();
        var edit_id = $('input#user_edit_name').attr('val');
        var edit_email = $('input#user_edit_email').val();
        var edit_password = $('input#user_edit_password').val();
        var edit_role = $('select#roleName_edit').find(":selected").attr('value');
        $.post(
            '/users/edit',
            {
                _token : $('input#page_token').val(),
                id : edit_id,
                username : edit_username,
                email : edit_email,
                password:edit_password,
                role_id : edit_role,
            },
            function(result){
                alert('successful saved!')
                location.reload();
            }
        )

    })
    $('button#delete_user_btn').click(function(){
        var edit_id = $(this).next().attr('val');
        console.log(edit_id);
        $.post(
            '/users/delete',
            {
                _token : $('input#page_token').val(),
                id : edit_id,
            },
            function(){
                alert('successful deleted!');
                location.reload();
            }
        )
    });
})