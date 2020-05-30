<template>
    <div class="mx-auto" style="height: 100vh; background-color: #aaaaaa;">
        <div class="bg-dark p-2 w-100 text-light fixed-top">
            <span class="font-weight-bold">{{ opponent.name }}</span>와 채팅중
            <button class="btn btn-primary mt-2" style="position: fixed; right:6px;"
                    @click="refresh">
                <img :src="refreshIconDir" alt="" style="width: 2rem;">
            </button>
        </div>
        <ul class="chat-ul overflow-auto" style="background-color: #aaaaaa;">
            <li style="width: 100%"
                v-for="message in messagesV"
                :key="message.id"
            >
                <div class="macro mb-1"
                     :class="{ 'msj-rta': message.receiver_id==opponent.id, 'msj': message.sender_id==opponent.id }"
                >
                    <div class="text"
                         :class="{ 'my-message': message.receiver_id==opponent.id, 'your-message': message.sender_id==opponent.id }"
                    >
                        <div class="text-right">
                            {{ message.content }}
                        </div>
                        <div class="text-right" style="font-size: 0.8rem"
                             :class="{ 'text-light': message.receiver_id==opponent.id, 'text-dark': message.sender_id==opponent.id }">
                            {{ message.created_at_for_js }}
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div style="position: fixed; bottom:6px; width: 100%;">
            <div class="px-1 px-sm-3">
                <input type="text" class="form-control" name="message" id=""
                       placeholder="메시지를 입력하세요"
                       v-model="text"
                       @keyup.enter="submit"
                >
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.scrollToBottom();
        },
        props: {
            opponent: {
                type: Object,
                required: true,
            },
            messages: {
                type: Array,
                required: true,
            },
            refreshIconDir: {
                type: String,
                required: true,
            },
        },
        created() {

        },
        data() {
            return {
                messagesV: this.messages,
                text: '',
            }
        },
        methods: {
            submit() {
                if (this.text) {
                    axios.post('/user/message', {
                        content: this.text,
                        receiver_id: this.opponent.id,
                    }).then(res => {
                        this.messagesV.unshift(res.data.message);
                    });
                    this.text = '';
                    this.scrollToBottom();
                }
            },
            refresh() {
                location.reload();
            },
            scrollToBottom() {
                var container = document.querySelector(".chat-ul");
                var scrollHeight = container.scrollHeight;
                container.scrollTop = scrollHeight;
            },
        }
    }
</script>

<style>
    .text {
        display: flex;
        flex-direction: column;
    }

    .my-message > div {
        color: white;
        text-align: right;
        margin-right: 5px;
    }

    .your-message > div {
        text-align: left;
        margin-left: 5px;
    }

    .your-message {
        float: left;
        padding-right: 10px;
    }

    .my-message {
        float: right;
        padding-left: 10px;
    }

    .macro {
        margin-top: 5px;
        border-radius: 5px;
        padding: 5px;
        display: flex;
    }

    /*my message*/
    .msj-rta {
        float: right;
        background: #555555;
        color: #ffffff;
    }

    /*your message*/
    .msj {
        float: left;
        background: #cccccc;
        color: #000000;
    }

    .chat-ul {
        width: 100%;
        list-style-type: none;
        padding: 18px;
        padding-bottom: 50px;
        padding-top: 50px;
        display: flex;
        flex-direction: column-reverse;
    }
</style>
