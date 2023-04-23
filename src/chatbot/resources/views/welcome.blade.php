<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BotMan Studio</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
   
</head>

<body>
    <div class="container">
        <div class="content">


            <script>
                var botmanWidget = {
                    frameEndpoint: '/botman/chat'
                };
            </script>
            <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
        </div>
    </div>
</body>

</html>