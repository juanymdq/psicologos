
<html>
<body>
    <!-- OpenTok.js library -->
    <script src="https://static.opentok.com/v2/js/opentok.js"></script>
    <script>

    // credentials
    var apiKey = '45828062';
                var sessionId = '2_MX40NTgyODA2Mn5-MTU5MTIxNzc2MDMwNn5QakYwY3JpZEEya0ZFV05tQ2lnVGx5dTd-UH4';
                var token = 'T1==cGFydG5lcl9pZD00NTgyODA2MiZzaWc9OTEyYzVlNDBkZDU1NGFkZjUyMWM1NGUzMWUxNjU5MmRhZGRmNjZiOTpzZXNzaW9uX2lkPTJfTVg0ME5UZ3lPREEyTW41LU1UVTVNVEl4TnpjMk1ETXdObjVRYWtZd1kzSnBaRUV5YTBaRlYwNXRRMmxuVkd4NWRUZC1VSDQmY3JlYXRlX3RpbWU9MTU5MTIxNzc2MCZub25jZT0wLjY1MDQ5ODgzNTk0ODIzNjkmcm9sZT1wdWJsaXNoZXImZXhwaXJlX3RpbWU9MTU5MTMwNDE2MA==';

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