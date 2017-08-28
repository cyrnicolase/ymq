<template>
    <div>
        <span>请输入发送消息: </span>
        <input type="text" v-model='message' />
        <button @click="push()">发送</button>
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
        }
    },
    mounted: function() {
        //var client = mqtt.connect('http://127.0.0.1:15675/ws');
        let self = this;
        self.client = mqtt.connect('http://127.0.0.1:15675/ws');
        self.client.on('connect', function() {
            self.client.subscribe('hello/demo');
            self.client.publish('hello/demo', "I'm connected!");
        });

        self.client.on('message', function(topic, message) {
            self.box += message.toString() + "<br />";
        });

    },
    methods: {
        push() {
            // this.box += this.message + "<br />"; 
            this.client.publish('hello/demo', this.message);
        },
    }
}
</script>
