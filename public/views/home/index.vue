<template>
    <div>
        <div>
            <span>Nickname: </span>
            <input type="text" v-model = 'nickname' placeholder = 'Your nickname' />
        </div>
        <div>
            <span>Message: </span>
            <input type="text" v-model = 'message' placeholder = 'Your message' />
            <button @click="push()">Send</button>
        </div>
        <div>
            <button @click="connect()">Connect</button>
            <hr />
        </div>
        <div v-html='box'></div> <!-- 使用html 直接渲染-->
    </div>
</template>

<script>
var mqtt = require('mqtt');
export default {
    data() {
        return {
            message: '',
            box: '',
            client: '',
            nickname: '',
        }
    },
    mounted: function() {
        document.title = '聊天';
    },
    methods: {
        push() {
            if (!this.client) {
                alert('Please connect before publish message!');
                return;
            }
            if (!this.nickname) {
                alert('Please tell me who you are!');
                return;
            }
            this.client.publish('hello/demo', this.nickname + " saied: " + this.message);
        },
        connect() {
            if ('' === this.nickname) {
                alert('Please input your nickname!');
                return;
            }

            let self = this;
            self.client = mqtt.connect('http://127.0.0.1:15675/ws');
            self.client.on('connect', function() {
                self.client.subscribe('hello/demo');
                let connectedMessage = '---->' + self.nickname + ' Joined';
                self.client.publish('hello/demo', connectedMessage);
            });

            self.client.on('message', function(topic, message) {
                self.box += message.toString() + "<br />";
            });
        }
    }
}
</script>
