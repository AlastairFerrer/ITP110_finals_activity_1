$(document).ready(function () {
    
    $("#form-login").on("submit", function(e){
        e.preventDefault()

        const _token = $("meta[name ='csrf-token']").attr('content')
        const email = $("#email").val()
        const password = $("#password").val()

        $.ajax({
            url:"/login",
            method: "POST",
            data: { _token, email, password },
            error: function(){
                window.location.reload()
            },
            success: function(res){
                $('#success').html(res.message)
                if(res.status === 200){
                    alert(res.message)
                    window.location.href = '/blob'
                }
            }
        })
    })

    $("#form-logout").on("submit", function(e){
        e.preventDefault()

        const _token = $("meta[name ='csrf-token']").attr('content')

        $.ajax({
            url:"/logout",
            method: "POST",
            data: { _token },
            error: function(res){
                alert(res.responseJSON.message)
            },
            success: function(res){
                alert(res.message)
                if(res.status === 200){
                    window.location.href = '/show-login'
                }
            }
        })
    })

    $("#form-register").on("submit", function(e){
        e.preventDefault()

        const _token = $("meta[name ='csrf-token']").attr('content')
        const name = $("#name").val()
        const email = $("#email").val()
        const password = $("#password").val()

        $.ajax({
            url:"/register",
            method: "POST",
            data: { _token, name, email, password },
            success: function(res){
                alert(Object.values(res.responseJSON.message))
            },
            error: function(res){
                alert(Object.values(res.responseJSON.error))
            }
        })

        $("#name").val("")
        $("#email").val("")
        $("#password").val("")
        $("#password_confirmation").val("")
    })

    $('#form-createBlob').on('submit', function(e){
        e.preventDefault()

        const _token = $("meta[name ='csrf-token']").attr('content')
        const title = $('#title').val()
        const content = $('#content').val()

        $.post({
            url:'/blob/post',
            data: { _token, title, content },
            success: function(){
                window.location.reload()
            },
            error: function(res){
               $('#error-create-blog').html(Object.values(res.responseJSON.error))
            }
        })
    })

});
