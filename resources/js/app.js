
require('./bootstrap');
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';



const echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
import { createApp } from 'vue';

import chatForm from './components/ChatForm.vue'
import chatMessages from './components/ChatMessages.vue'

const app = createApp({
    data() {
        return {
            messages: []
        }
    },
    created() {
        this.fetchMessages();
        echo.channel('chat')
            .listen('MessageSent', (e) => {
                if (e.user.id !== 2) return; // если обычный юзер, то игнорим

                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });

    },
    methods: {
        fetchMessages() {
            axios.get('/chatbot/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);
            axios.post('/chatbot/messages', message).then(response => {
                console.log(response.data);
            });
        }
    }
});
app.component('chat-form', chatForm);
app.component('chat-messages', chatMessages);



app.mount('#root');


// export default {
//     data() {
//         return {
//             messages: []
//         }
//     },
//     created() {
//         this.fetchMessages();
//     },
//     methods: {
//         fetchMessages() {
//             axios.get('/messages').then(response => {
//                 this.messages = response.data;
//             });
//         },
//         addMessage(message) {
//             this.messages.push(message);
//
//             axios.post('/messages', message).then(response => {
//                 console.log(response.data);
//             });
//         }
//     }
// }
