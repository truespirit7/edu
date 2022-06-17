// resources/assets/js/components/ChatMessages.vue

<template>
    <div class="panel-body">
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong :class="`primary-font ${message.user.id === 2 ? 'bot' : ''}`">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
    </div>
</template>

<script setup>
import { toRefs, watch, computed, onMounted } from 'vue';

const props = defineProps({
    messages: {
        type: Array,
        default: () => [],
    },
});

const { messages } = toRefs(props);

const messagesCount = computed(() => messages.value.length);

let messagesBlockElement = null;

const scrollBottom = () => {
    if (!messagesBlockElement) return;
    setTimeout(() => {
        messagesBlockElement.scrollTop = messagesBlockElement.scrollHeight;
    });
};

onMounted(() => {
   messagesBlockElement = document.querySelector('.panel-body');
   setTimeout(() => {
       scrollBottom();
   }, 500);
});

watch(messagesCount, () => {
    scrollBottom();
});



/*
const scroll = () => {
    console.log(true);
};
setInterval(() => {
    messages.value.push({
        message: 'Test',
        user: {
            name: 'Danil',
        },
    });
}, 1000); */

/*export default {
    props: ['messages'],
    methods: {
        scroll() {
            console.log(true);
        }
    }
};*/
</script>

<style>
.bot {
    color: orange;
}
</style>

