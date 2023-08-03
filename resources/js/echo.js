
Echo.join('chat')
.here((users)=>{
    console.log(users)
    this.emitter.emit('users.here', users)
})
.joining((user)=>{
    this.emitter.emit('users.joined', user)
})
.leaving((user)=>{
    this.emitter.emit('users.left', user)
})
.listen('MessageCreated', (e) => {
    this.emitter.emit('message.added', e.message)
})