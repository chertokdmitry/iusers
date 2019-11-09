$(document).ready(function() {
    $('body')
        .on('change', '#type_id', function (e) {

            let user_type = (this.value);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type: 'POST',
            url: '/getdata',
            data: {
                user_type: user_type,
            },
                success:function(data){
                    $("#roles").replaceWith(data.msg);
                }
            })
        })

        .on('click', '.add-role', function (e) {
            let me = $(this),
                user_id = me.attr('data-user');
                role_id = me.attr('data-role');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/addrole',
                data: {
                    user_id: user_id,
                    role_id: role_id
                },
                success: function (data) {
                    $(data.msg).removeClass("text-secondary add-role").addClass( "text-danger remove-role");
                }
            })
        })

        .on('click', '.remove-role', function (e) {
            let me = $(this),
                user_id = me.attr('data-user');
            role_id = me.attr('data-role');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/removerole',
                data: {
                    user_id: user_id,
                    role_id: role_id
                },
                success: function (data) {
                    $(data.msg).removeClass("text-danger remove-role").addClass("text-secondary add-role");
                }
            })
        })
    });
