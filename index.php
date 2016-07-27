<?php require_once('config/config.php');?>



<!DOCTYPE html>
<head>
  <title>Pusher Test</title>

</head>

<body>


<?php
if(isset($_POST['send'])){


  require('Pusher.php');

  $options = array(
    'encrypted' => true
  );
  $pusher = new Pusher(
    '58bfd3799c27ae38b3dd',
    '6919d581ea79c4a66366',
    '224541',
    $options
  );


  $message = $_POST['message'];  

  $data['message'] = $message;

  $query = $db->query("INSERT INTO chats (sender, receiver, message) VALUES (1, 3, '$message')");
//if($queryss){
	
  $pusher->trigger('chats', 'chat_event', $data);
  echo $data['message']."<hr/>";
//}


  }
?>




<form method="post" action="">
	<input type="text" name="message">
	<input type="submit" name="send" id="btn" value="Send">
</form>


  <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    //Pusher.logToConsole = true;
$(document).ready(function(e){
  $("#btn").click(function(e){
    var pusher = new Pusher('58bfd3799c27ae38b3dd', {
      encrypted: true
    });

    var channel = pusher.subscribe('chats');
    channel.bind('chat_event', function(data) {
      alert(data.message);
    });
  });
  });
  </script>

</body>
</html>