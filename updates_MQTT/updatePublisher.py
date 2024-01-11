import paho.mqtt.client as mqtt
from flask import Flask, request

app = Flask(__name__)
# MQTT details
broker = "012f87cef39d41e1b8f9056d4c2242bd.s2.eu.hivemq.cloud"
port_tcp = 8883
topic = "update"

client = mqtt.Client(client_id="updatePublisher",
                      transport='tcp',
                      protocol=mqtt.MQTTv5)

client.tls_set(tls_version=mqtt.ssl.PROTOCOL_TLS)
client.username_pw_set("Gitte Vandevenne","Test1234")

client.connect(broker,
                port=port_tcp,
                clean_start=mqtt.MQTT_CLEAN_START_FIRST_ONLY,
                keepalive=60);

connected = False
def on_connect(client, userdata, flags, rc, properties=None):
    global connected
    if rc == 0:
        print("Connected to MQTT Broker!")
        connected = True
    else:
        print("Failed to connect, return code %d\n", rc)
client.on_connect = on_connect

@app.route('/send_update', methods=['POST'])
def send_message():
    title = request.get_json()['title']
    message = request.get_json()['message']
    update = "title/" + title + "/message/" + message
    client.publish(topic, update, qos=0)
    return {"status": update + "sent to MQTT broker"}

if __name__ == '__main__':
    app.run(port=5000)



