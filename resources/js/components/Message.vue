<template>
    <div class="card" :class="{'own-message':message.ownMessage}">
        <div class="card-body">
            <h5>{{ message.user.name }}</h5>
            <p>{{ message.body }}</p>
            <p class="text-secondary">{{ message.created_at }}</p>
        </div>
    </div><br>
</template>

<script>
export default {
    props: ['message']
}
</script>

<style>
.own-message{
    background-color: rgb(208, 203, 203);
}
</style>