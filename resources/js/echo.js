Echo.channel('points').listen('PointEdited', (e) => {

    if (e.id === '0') {
        const locs = document.getElementsByClassName('tile')

        for (const l of locs) {
            l.style.backgroundColor = null;
            l.style.opacity = null;
        }

    } else {

        const loc = document.getElementById(e.id)

        if (loc.style.backgroundColor) {
            loc.style.backgroundColor = null;
            loc.style.opacity = null;
        } else {
            loc.style.backgroundColor = 'rgb(0,255,255)';
            loc.style.opacity = 0.5;
        }

    }

})


Echo.join('chat')
    .here((users) => {
        emitter.emit('users.here', users)
    })
    .joining((user) => {
        emitter.emit('users.joined', user)
    })
    .leaving((user) => {
        emitter.emit('users.left', user)
    })
    .listen('MessageCreated', (e) => {
        emitter.emit('message.added', e.message)
    })
