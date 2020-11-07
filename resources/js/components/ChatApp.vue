<template>
    <div class="container">
        <div class="row card">
            <div class="card-header">
                <h2>Chat</h2>
            </div>
            <div class="chat-app card-body">
        <Conversation :contact="selectContact" :messages = "messages" />
        <ContactList :contacts="contacts" @selected="startConversationWith"/>
    </div>
        </div>
    </div>
</template>

<script>
    import Conversation from './Conversation.vue'
    import ContactList from './Contact.vue'
    export default {
        props: {
            user:{
                type: Object,
                required:true
            }
        },
        data(){
            return{
                selectContact:null,
                messages:[],
                contacts:[]
            }
        },
        mounted() {
            axios.get('/contacts')
            .then((res)=>{
                this.contacts = res.data;
            })
        },
        methods:{
            startConversationWith(contact){
                axios.get(`/conversation/${contact.id}`)
                .then((res) => {

                    this.messages = res.data
                    this.selectContact = contact
                });
            }
        },
        components:{
            Conversation,ContactList
        }
    }
</script>


<style lang="scss" scoped>
    .chat-app {
        display: flex;
    }
</style>