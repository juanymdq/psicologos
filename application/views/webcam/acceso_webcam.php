
<html>
<body>    

    <?php
        require_once 'vendor/autoload.php';
        use OpenTok\OpenTok;

        $API_KEY = '3892014';
        $API_SECRET = '149db89ea715159556facbe463d24c5f5fbf4dc4';
                       
        $apiObj = new OpenTok($API_KEY, $API_SECRET);
        var_dump($apiObj);
        $session = $apiObj->createSession();
        //echo $session->getSessionId();

     
    ?>




    <!-- OpenTok.js library -->
    <script src="https://static.opentok.com/v2/js/opentok.js"></script>
    <script>

        // credentials
        var apiKey = <?=$API_KEY?>;
        //2_MX40NTgyODA2Mn5-MTU5MTIxNzc2MDMwNn5QakYwY3JpZEEya0ZFV05tQ2lnVGx5dTd-UH4
        //var sessionId = 'kpo17bb41gqo4d63ctjjmgv18r176vtp';
        
    
        var sessionId = <?=$sessionId?>;
        console.log(sessionId)
        var token = <?=$token?>;

        // connect to session
        var session = OT.initSession(apiKey, sessionId);

        // create publisher
        var publisher = OT.initPublisher();
        session.connect(token, function(err) {
        // publish publisher
        
        });
        
        // create subscriber
        session.publish(publisher);

        session.on('streamCreated', function(event) {
        session.subscribe(event.stream);
        });
        
    </script>
</body>

</html>