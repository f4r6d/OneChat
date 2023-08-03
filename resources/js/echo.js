
Echo.join('chat')
.here((users)=>{
    console.log(users)
    emitter.emit('users.here', users)
})
.joining((user)=>{
    emitter.emit('users.joined', user)
})
.leaving((user)=>{
    emitter.emit('users.left', user)
})
.listen('MessageCreated', (e) => {
    emitter.emit('message.added', e.message)
})