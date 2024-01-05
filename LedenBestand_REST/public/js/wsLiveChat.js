//wsLiveChat.js
<script src="/socket.io/socket.io.js"></script>

      document.addEventListener('DOMContentLoaded', () => {
        var socket = io();
        
        // Get the username from the client when they join
        var username = prompt("Enter your username:");
        socket.username = username;
        socket.emit('user_join', username);

        socket.on('connect', () => {
          console.log('Connected to server!');
        });

        socket.on('message', (data) => {
          var li = document.createElement('li');
          var bubble = document.createElement('div');

          if(data.username == socket.username){
            bubble.className = 'speech-bubble-align-right';
          }else{
            bubble.className = 'speech-bubble';
          }
          bubble.style.background = data.color;
          bubble.textContent = data.message;
          li.appendChild(bubble);
          document.getElementById('messages').appendChild(li);
        });

        socket.on('user_join', (username) => {
          console.log(username);
        });
        
        document.getElementById('form').addEventListener('submit', (e) => {
          e.preventDefault();
          var message = document.getElementById('input').value;
          socket.emit('message', socket.username + ': ' + message);
          document.getElementById('input').value = '';
        });
      });