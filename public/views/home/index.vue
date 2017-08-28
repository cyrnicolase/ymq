<template>
    <div>
        <span>请输入发送消息: </span>
        <input type="text" v-model='message' />
        <button @click="push()">发送</button>
        <div v-html='box'></div> <!-- 使用html 直接渲染-->
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
            box: '',
        }
    },
    methods: {
        push() {
            this.box += this.message + "<br />"; 
        },
    }
}
</script>
