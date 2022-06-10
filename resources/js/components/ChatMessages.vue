// resources/assets/js/components/ChatMessages.vue

<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['messages']
};
</script>
<!--<script setup>-->

<!--import Echo from 'laravel-echo';-->
<!--import Pusher from 'pusher-js';-->



<!--const echo = new Echo({-->
<!--    broadcaster: 'pusher',-->
<!--    key: process.env.MIX_PUSHER_APP_KEY,-->
<!--    cluster: process.env.MIX_PUSHER_APP_CLUSTER,-->
<!--    forceTLS: true-->
<!--});-->

<!--echo.channel('chat')-->
<!--    .listen('MessageSent', (e)=> {-->
<!--        console.log(e);-->
<!--        this.messages.push({-->
<!--            message: e.message.message,-->
<!--            user: e.user-->
<!--        });-->
<!--    });-->

<!--</script>-->

