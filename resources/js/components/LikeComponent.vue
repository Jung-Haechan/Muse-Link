<template>
    <button
        class="btn ml-auto"
        @click="like"
        :class="{ 'btn-warning' : !alreadyLikeV, 'btn-success' : alreadyLikeV }"
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
            projectId: Number,
            isLoggedIn: Boolean,
            likes: Number,
            alreadyLike: Boolean,
        },
        created() {

        },
        data() {
            return {
                likeNumber: JSON.parse(this.likes),
                alreadyLikeV: JSON.parse(this.alreadyLike),
            }
        },
        methods: {
            like() {
                if(this.alreadyLikeV===false) {
                    if(this.isLoggedIn) {
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
