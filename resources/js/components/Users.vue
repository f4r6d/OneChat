<template>
    <p>
    <h3>Online Users - ({{ users.length }})</h3>
    <div v-for="user in users">
        <a href="#">{{ user.name }}</a>
    </div>
    </p>
</template>

<script>
export default {
    data() {
        return {
            users: []
        }
    },

    mounted() {
        this.emitter.on('users.here', (users) => {
            console.log('hi')
            this.users = users
        })
        this.emitter.on('users.joined', (user) => {
            this.users.unshift(user)
        })
        this.emitter.on('users.left', (user) => {
            this.users = this.users.filter((u) => {
                return user.id !== u.id
            })
        })
    }
}
</script>