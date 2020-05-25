<template>
    <button
        class="btn ml-auto"
        @click="follow"
        :class="{ 'btn-warning' : !alreadyFollowedV, 'btn-success' : alreadyFollowedV }"
    >
        팔로우
    </button>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            followeeId: String,
            isLoggedIn: String,
            alreadyFollowed: String,
        },
        created() {

        },
        data() {
            return {
                followeeIdV: Number(this.followeeId),
                alreadyFollowedV: Boolean(this.alreadyFollowed),
                isLoggedInV: Boolean(this.isLoggedIn),
            }
        },
        methods: {
            follow() {
                if (this.isLoggedInV == true) {
                    if (this.alreadyFollowedV === false) {
                        axios.post('/user/' + this.followeeIdV + '/follow');
                        this.alreadyFollowedV = true;
                    } else {
                        axios.delete('/user/' + this.followeeIdV + '/follow');
                        this.alreadyFollowedV = false;
                    }
                } else {
                    alert('로그인 후 이용 가능합니다.');
                }

            }
        }
    }
</script>
