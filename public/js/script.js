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
            error: function(res){
                alert(res.responseJSON.message)
            },
            success: function(res){
                alert(res.message)
                if(res.status === 200){
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
                alert(Object.values(res.responseJSON))
            },
            error: function(res){
                alert(Object.values(res.responseJSON))
            }
        })

        $("#name").val("")
        $("#email").val("")
        $("#password").val("")
        $("#password_confirmation").val("")
    })


    // $()
});
