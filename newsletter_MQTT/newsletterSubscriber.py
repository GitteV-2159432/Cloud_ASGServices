#newsletterSubsciber.py
from graphene import String
import paho.mqtt.client as mqtt

client = mqtt.Client(client_id="newsletterSubscriber",
                     transport='tcp',
                     protocol=mqtt.MQTTv5)

client.tls_set(tls_version=mqtt.ssl.PROTOCOL_TLS)
client.username_pw_set("Jos Claes", "Test1234")

broker = "012f87cef39d41e1b8f9056d4c2242bd.s2.eu.hivemq.cloud"
port_tcp = 8883

client.connect(broker,
                   port=port_tcp,
                   clean_start=mqtt.MQTT_CLEAN_START_FIRST_ONLY,
                    keepalive=60);

def on_connect(client, userdata, flags, rc, properties=None):
    if rc == 0:
        print("Connected to MQTT Broker!")
    else:
        print("Failed to connect, return code %d\n", rc)
client.on_connect = on_connect



def on_message(client, userdata, message, tmp=None):
    if message.qos == 0:
       print("Alles onder controle")

    newsletter = str(message.payload.decode("utf-8"))
    print(newsletter)



client.on_message = on_message
client.subscribe("newsletter")
client.loop_forever()