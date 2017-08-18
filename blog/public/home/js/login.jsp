   //jQuery语言
   <script>
   alert("123");
    $(
        $('#loginDiv').hide();
        $('#btnLogin').click(function() {
              $('#loginDiv').dialog({
                width: 400,
                height: 450,
                modal: true,
                resizable: false,
                title: dialogTitle,
                close: function(e, u) {
                    $('#loginDiv').empty();
                    $(this).dialog("destroy");
              });
         });
     );
    </script>