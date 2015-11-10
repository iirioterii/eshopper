<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title of the document</title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<body>
<p>Ваше имя:</p>
<input type="text" id="name"/>
<p id="hello"></p>

<button id="send">Асинхронная отправка</button>

<script>
    $("#send").click(function(){
            var param = { name: $("#name").val(),
            }
            $.post("ajax.php", param, function(data){
                $("#hello").html(data);
            });
    });

</script>
</body>

</html>