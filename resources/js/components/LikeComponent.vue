<template>
    <button
        class="btn ml-auto"
        @click="like"
        :class="{ 'btn-outline-dark' : !alreadyLikeV, 'btn-warning' : alreadyLikeV }"
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
        props: {
            iconDir: String,
            projectId: String,
            isLoggedIn: String,
            likes: String,
            alreadyLike: String,
        },
        created() {

        },
        data() {
            return {
                likeNumber: Number(this.likes),
                alreadyLikeV: this.alreadyLike === 'true',
                isLoggedInV: this.isLoggedIn === 'true',
            }
        },
        methods: {
            like() {
                if(this.alreadyLikeV===false) {
                    if(this.isLoggedInV===true) {
                        axios.post('/project/'+this.projectId+'/like');
                        this.likeNumber = this.likeNumber + 1;
                        this.alreadyLikeV = true;
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
