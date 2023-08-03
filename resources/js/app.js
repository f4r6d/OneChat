import './bootstrap';

import { createApp } from 'vue';

import Example from './components/Example.vue';
import Chat from './components/Chat.vue';
import Messages from './components/Messages.vue';
import Message from './components/Message.vue';
import Users from './components/Users.vue';

const app = createApp();

app.component('example', Example);
app.component('chat', Chat);
app.component('messages', Messages);
app.component('message', Message);
app.component('users', Users);

app.mount("#app");
