$(document).ready(function() {
    $("body").on("click", "button.addApp", function() {
        var bt = $(this);
        var app = $(this).attr("relapp");
        var uid = $(this).attr("reluid");
        console.log('app=' + app + "&uid=" + uid);
        $.ajax({
            url: '?v=acl&action=addApptoUser',
            data: 'app=' + app + "&uid=" + uid,
            type: 'POST',
            success: function(res) {
                console.log(res);
                $("ul#asignedApps").append(res);
                bt.parent().parent().remove();
            }
        });



    });


    $("body").on("click", "button.removeApp", function() {
        var bt = $(this);
        var app = $(this).attr("relapp");
        var uid = $(this).attr("reluid");
        console.log('app=' + app + "&uid=" + uid);
        $.ajax({
            url: '?v=acl&action=removeApptoUser',
            data: 'app=' + app + "&uid=" + uid,
            type: 'POST',
            success: function(res) {
                console.log(res);
                $("ul#availableApps").append(res);
                bt.parent().parent().remove();
            }
        });



    });

    $("input#filterAvailableApps").keyup(function() {
        var textfilter = $.trim($(this).val()).toLowerCase();
        if (textfilter.length == 0) {
            $("#availableApps li").show();
        } else {
            $("#availableApps li ").each(function(index) {
                var li = $(this);
                var liText = " " + $.trim($(this).text()).toLowerCase();

                if (liText.indexOf(textfilter) > 0) {
                    li.show();
                } else {
                    li.hide();
                }
            });
        }


        //console.log(appsList);
    });

    $("input#filterAsignedApps").keyup(function() {
        var textfilter = $.trim($(this).val()).toLowerCase();
        if (textfilter.length == 0) {
            $("#asignedApps li").show();
        } else {
            $("#asignedApps li ").each(function(index) {
                var li = $(this);
                var liText = " " + $.trim($(this).text()).toLowerCase();

                if (liText.indexOf(textfilter) > 0) {
                    li.show();
                } else {
                    li.hide();
                }
            });
        }


        //console.log(appsList);
    });

});
