<template>
    <div class="conversation">
        <h2>{{ contact?contact.name:'Select a Contact' }}</h2>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
        
    </div>
</template>
<script>
import MessagesFeed from './MessagesFeed.vue'
import MessageComposer from './MessageComposer.vue'
export default {
    props:{
        contact:{
            type:Object,
            default:null
        },
        messages:{
            type:Array,
            default:[]
        }
    },
    methods:{
        sendMessage(text){
            console.log(text);
        }
    },
    components:{MessagesFeed, MessageComposer}
}
</script>

<style lang="scss" scoped>
    .conversation{
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h2{
            font-size: 20px;
            margin: 0;
            padding: 10px;
            border-bottom: 1px dashed lightgray;
        }
        
    }
</style>