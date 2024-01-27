// server.js
const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server);

app.get("/", function(req, res) {
    res.sendFile(__dirname + "/client.html");
});

io.on('connection', (socket) => {
 console.log('a user connected');

 socket.on('disconnect', () => {
    console.log('user disconnected');
 });

 socket.on('message', (message) => {
    io.emit('message', {message: message, color: socket.color, username: socket.username});
 });

 socket.on("user_join", function(data) {
    this.username = data;
    this.color = '#' + Math.floor(Math.random() * 16777215).toString(16); 
    socket.broadcast.emit("user_join", data);
});
});


server.listen(3001, () => {
 console.log('listening on http://localhost:3001/');
});