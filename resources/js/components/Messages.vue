<template>
    <div class="container msg-page" ref="messages">
        <message v-for="message in messages" :key="message.id" :message="message"></message>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: []
        }
    },
    methods: {
        removeMessage(id){
            this.messages = this.messages.filter((message) => {
                return message.id !== id
            })
        }
    },

    mounted() {
        axios.get('messages').then((response) => {
            this.messages = response.data
        })

        emitter.on('message.added', (message) => {
            this.messages.unshift(message)
            if (message.ownMessage) {
                this.$refs.messages.scrollTop = 0
            }
        })
        emitter.on('message.removed', (message) => {
            this.removeMessage(message.id)
        })
    }
}
</script>

<style>
.msg-page {
    max-height: 420px;
    overflow-y: auto;
}
</style>