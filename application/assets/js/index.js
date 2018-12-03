$(document).ready(function(){
    $(document).on("submit", "#loginForm", function(event){
        event.preventDefault();
        
        var dat = $(this).serialize();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: 'JSON',
            success:function(data)
            {
                if(data.status == "OK")
                {
                    window.location.href = data.url;
                }
    
                if(data.status == "FAIL")
                {
                    alert(data.msg);
                }
            },
        });
    });
    
    $(document).on("submit", "#registerForm", function(event){
        event.preventDefault();
        
        var dat = $(this).serialize();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: 'JSON',
            success:function(data)
            {
                if(data.status == "OK")
                {
                    $("#registerModal").modal('toggle');
                    $("#loginModal").modal('toggle');
    
                    var group = $("#alertGroup");
                    var aler = document.createElement("div");
                    $(aler).addClass("alert alert-success");
                    $(aler).text("Zostałeś zarejestrowany!");
                    $(group).append(aler);
                    setTimeout(function(){
                        $(aler).remove();
                    }, 3000);
                }
    
                if(data.status == "FAIL")
                {
                    alert(data.msg);
                }
            },
        });
    });
    
    $(document).on("submit", "#editForm", function(event){
        event.preventDefault();
    
        var dat = $(this).serialize();
        var nick = $(this).find("input[name='edit_nickname']").val();
    
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: 'JSON',
            success:function(data)
            {
                if(data.status == "OK")
                {
                    var ealert = $("#editAlerts");
                    var suc = document.createElement("div");
                    $(suc).addClass("alert alert-success");
                    $(suc).text("Nazwa użytkownika została ustawiona!");
                    $(ealert).append(suc);
                    $("#editForm").remove();
                    $("#profile-nickname").text(nick);
                    $("#profile-update").text(data.updated);
                    setTimeout(function(){
                        $(suc).remove();
                    }, 3000);
                }
    
                if(data.status == "FAIL")
                {
                    alert(data.msg);
                }
            },
        });
    });
    
    $(document).on("submit", "#createNoteForm", function(event){
        event.preventDefault();
    
        var dat = $(this).serialize();
    
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: "JSON",
            success:function(data)
            {
                if(data.status == "OK")
                {
                    $("#notes-box").load(location.href + " #notes-box");
                    var cn = $("#cnError");
                    var err = document.createElement("div");
                    $(err).addClass("alert alert-success");
                    $(err).text("Notatka została dodana!");
                    $(cn).append(err);
                    setTimeout(function(){
                        $(err).remove();
                    }, 3000);
                }
    
                if(data.status == "FAIL")
                {
                    var cn = $("#cnError");
                    var err = document.createElement("div");
                    $(err).addClass("alert alert-danger");
                    $(err).text(data.msg);
                    $(cn).append(err);
                    setTimeout(function(){
                        $(err).remove();
                    }, 3000);
                }
            },
        });
    });
    
    $(document).on("click", ".smooth-link", function(){
        $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 1000);
    });

    $(document).on("submit", ".rem-note", function(event){
        event.preventDefault();
        
        var dat = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: "JSON",
            success:function(data)
            {
                if(data.status == "OK")
                {
                    $("#notes-box").load(location.href + " #notes-box");
                }

                if(data.status == "FAIL")
                {
                    alert(data.msg);
                }
            },
        });
    });

    $(document).on("submit", ".pin-notes", function(event){
        event.preventDefault();

        var dat = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: "JSON",
            success:function(data)
            {
                if(data.status == "OK")
                {
                    $("#notes-box").load(location.href + " #notes-box");
                }

                if(data.status == "FAIL")
                {
                    alert(data.msg);
                }
            },
        });
    });

    $(document).on("submit", ".repin-notes", function(event){
        event.preventDefault();
        
        var dat = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: dat,
            dataType: "JSON",
            success:function(data)
            {
                if(data.status == "OK")
                {
                    $("#notes-box").load(location.href + " #notes-box");
                }

                if(data.status == "FAIL")
                {
                    alert(data.msg);
                }
            },
        });
    });

    $(document).on("click", "#refreshNote", function(){
        $("#notes-box").load(location.href + " #notes-box");
    });
});