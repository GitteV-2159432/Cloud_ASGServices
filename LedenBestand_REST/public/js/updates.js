var client = mqtt.connect("wss://012f87cef39d41e1b8f9056d4c2242bd.s2.eu.hivemq.cloud:8884/mqtt", {
    username: 'Receiver',
    password: 'Test1234',
    clientId: 'web-client-' + Math.random().toString(16).substring(2, 10)
});

const updates = [];
const existingID = {};

client.on('connect', function () {
    console.log('Connected to MQTT Broker');
    client.subscribe('update');
    addsamples();
    displayUpdates();
});

client.on('message', function (topic, msg) {
    var update = msg.toString();

    var updateParts = update.split("/");
    var title = updateParts[1];
    var message = updateParts[3];

    const updateID = generateID();
    console.log('Received message:', topic, update, updateID);
    console.log(title);
    console.log(message);

    const time = new Date().toLocaleString();

    updates.push({id: updateID, title: title, message: message, time: time});
    displayUpdates();
});

function generateID() {
    var id = Math.random()*10;
    if(!existingID[id]){
        existingID[id] = 1;
        return id;
    }else{generateID();}
}

function displayUpdates(){
    const list = document.getElementById('updates');
    list.innerHTML = '';

    updates.forEach(message => {
        const updateDiv = document.createElement('div');
        updateDiv.className =  'update';

        const titleDiv = document.createElement('div');
        titleDiv.className = 'updateTitle';
        titleDiv.textContent = message.title;

        const messageDiv = document.createElement('div');
        messageDiv.className = 'updateMessage'
        messageDiv.textContent = message.message;

        const timeDiv = document.createElement('div');
        timeDiv.className = 'updateTime';
        timeDiv.textContent = message.time;

        updateDiv.appendChild(titleDiv);
        updateDiv.appendChild(messageDiv);
        updateDiv.appendChild(timeDiv);


        list.insertBefore(updateDiv, list.firstChild);
    });
}

function addsamples(){
    var updateID = generateID();
    var title ="Nieuw academiejaar";
    var message = "Het nieuwe academiejaar is weer begonnen! Welkom!";
    var time = new Date(2023, 9, 18, 10, 49, 48).toLocaleString();
    updates.push({id: updateID, title: title, message: message, time: time});

    var updateID = generateID();
    var title ="Examens";
    var message = "Veel succes met de examens allemaal!";
    var time = new Date(2024, 1, 13, 8, 6, 17).toLocaleString();
    updates.push({id: updateID, title: title, message: message, time: time});
}
