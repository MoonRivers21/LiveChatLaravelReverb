<template>
    <div class="flex flex-col h-screen">
        <div v-for="message in messages"
             :key="message.id"
             class="flex-1  overflow-y-auto max-h-fit">

            <div v-if="message.sender_id === currentUser.id" class="flex items-end justify-end mb-2">
                <div class="bg-blue-500 text-white py-2 px-4 rounded-lg">
                    {{ message.text }}
                </div>
            </div>

            <div v-else class="flex items-start mb-2">
                <img alt="User" class="h-10 w-10 rounded-full mr-2" src="https://dummyimage.com/50x50/ddd/000">
                <div class="bg-gray-200 text-gray-800 py-2 px-4 ml-2 rounded-lg">
                    {{ message.text }}
                </div>
            </div>


        </div>


        <div class="flex items-center space-x-5 py-4">
            <input v-model="newMessage" class="w-full border rounded-lg px-3 py-2"
                   placeholder="Type your message here..."
                   type="text"
                   @keyup.enter="sendMessage">

            <button class="bg-blue-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full mx-5 "
                    @click="sendMessage">
                Send
            </button>
        </div>
    </div>


</template>
<script setup>
import {onMounted, ref} from "vue";

const props = defineProps({
    friend: {
        type: Object,
        required: true
    },
    currentUser: {
        type: Object,
        required: true
    },
})

const messages = ref([]);

const newMessage = ref("");
const sendMessage = () => {
    if (newMessage.value.trim() !== "") {
        // messages.value.push({
        //     id: messages.value.length + 1,
        //     text: newMessage.value,
        //     isMe: true,
        // })
        //
        // newMessage.value = "";
        axios.post(`/messages/${props.friend.id}`, {
            message: newMessage.value,

        }).then(response => {
            messages.value.push(response.data);
            newMessage.value = "";
        })


    }
}

onMounted(() => {
    axios.get(`/messages/${props.friend.id}`).then((response) => {
        messages.value = response.data;
    })
})
</script>
