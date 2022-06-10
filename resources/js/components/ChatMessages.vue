<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="offset-4 col-4 offset-sm-1 col-sm-10">
                    <li class="list-group-item active">Chat Room <span class="badge  badge-pill badge-danger">{{ numberOfUsers }}</span> </li>
                    <div class="badge badge-pill badge-primary">{{ typing }}</div>
                    <ul class="list-group" >
                    <li v-for="value in chat.messages" ></li>

                    </ul>
                    <input type="text" class="form-control" placeholder="Type your message here..." v-model='message' @keyup.enter="send">
                    <br>
                    <a href='' class="btn btn-warning btn-sm"> Delete Chats</a>
                </div>
            </div>
        </div>
        </div>

</template>
<script>
export default{
    data() {
        return {
            message: '',
            chat: {
                messages: []
            }
        }
    },
    methods:{
        send(){
            if (this.message.length != 0) {
                this.chat.messages.push(this.message);
            }
        }
    }
}
// Vue.component('button-counter', {
//     data: function () {
//         return {
//             count: 0
//         }
//     },
//     template: '<button v-on:click="count++">Счётчик кликов — {{ count }}</button>'
// })
</script>
<script setup>

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';



const echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

echo.channel('chat')
    .listen('PublicChat', (e)=> {
        console.log(e);
    });

</script>

