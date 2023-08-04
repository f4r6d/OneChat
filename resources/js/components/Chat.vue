<template>
    <div class="chat">
        <h2 style="background-color:cyan;opacity:0.5">Chat Messages:</h2>
        <messages></messages>
    </div>
    <br>
    <form action="" method="post">
        <textarea cols="120" rows="3" v-model="body" @keydown="handleMessageInput" autofocus></textarea>
    </form>
</template>

<script>
import axios from 'axios';
import moment from 'moment'
export default {
    data() {
        return {
            body: null,
            bodyBackup: null,
        }
    },
    methods: {
        handleMessageInput(e) {
            this.bodyBackup = this.body
            if (e.keyCode === 13 && !e.shiftKey) {
                e.preventDefault();
                this.send()
            }

        },
        buildTempMessage() {
            let tempId = Date.now()
            return {
                id: tempId,
                body: this.body,
                created_at: moment().format('YYYY-MM-DD HH:mm'),
                ownMessage: true,
                user: {
                    name: user.name
                }
            }
        },
        send() {
            if (!this.body || this.body.trim() === '') {
                return;
            }
            let tempMessage = this.buildTempMessage()
            emitter.emit('message.added', tempMessage)

            axios.post('/messages', { body: this.body.trim() }).catch(() => {
                this.body = this.bodyBackup
                emitter.emit('message.removed', tempMessage)
            })


            this.body = null


        }
    }

}
</script>

<style></style>