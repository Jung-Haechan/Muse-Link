<template>
    <button
        class="btn btn-warning ml-auto"
        @click="like"
    >
        <img :src="iconDir" alt="" style="width: 1.5rem;">
        <span>{{ this.likeNumber }}</span>
    </button>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['iconDir', 'projectId', 'isLoggedIn'],
        created() {
            axios.get('/project/'+this.projectId+'/like').then(res => {
                this.likeNumber = res.data.like_number;
                this.alreadyLike = res.data.already_like;
            }).catch(

            );
        },
        data() {
            return {
                likeNumber: 0,
                alreadyLike: null,
            }
        },
        methods: {
            like() {
                if(!this.alreadyLike) {
                    if(this.isLoggedIn) {
                        axios.post('/project/'+this.projectId+'/like');
                        this.likeNumber = this.likeNumber + 1;
                        this.alreadyLike = 1;
                    }
                    else {
                        alert('로그인 후 이용 가능합니다.');
                    }
                }
                else {
                    alert('이미 좋아요를 누르셨습니다.');
                }
            }
        }
    }
</script>
