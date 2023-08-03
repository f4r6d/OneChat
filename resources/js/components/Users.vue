<template>
    <p>
    <h3>Online Users - ({{ users.length }})</h3>
    <div v-for="user in users">
        <div class="cont">
            <h5>{{ user.name }}</h5>
        </div>
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
        emitter.on('users.here', (users) => {
            console.log('hi')
            this.users = users
        })
        emitter.on('users.joined', (user) => {
            this.users.unshift(user)
        })
        emitter.on('users.left', (user) => {
            this.users = this.users.filter((u) => {
                return user.id !== u.id
            })
        })
    }
}
</script>