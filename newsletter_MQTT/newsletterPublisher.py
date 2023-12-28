#newsletterPublisher.py
import paho.mqtt.client as mqtt

client = mqtt.Client(client_id="newsletterPublisher",
                      transport='tcp',
                      protocol=mqtt.MQTTv5)

client.tls_set(tls_version=mqtt.ssl.PROTOCOL_TLS)
client.username_pw_set("Gitte Vandevenne","Test1234")


broker = "012f87cef39d41e1b8f9056d4c2242bd.s2.eu.hivemq.cloud"
port_tcp = 8883


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

client.loop_start()

counter = 0
def send_newsletter(client, userdata, message_id, properties=None):
    global counter
    counter = counter + 1
    if counter == 5:
        print("Just sent message nr", message_id)
        counter = 0
client.on_publish = send_newsletter


import time
while True:
    if connected:
        message = "Beste A.S.G.'er, In deze nieuwsbrief vind je de activiteiten voor de komende week"
        client.publish("newsletter", message,qos=0)
    time.sleep(20)
