<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div v-if="loading"> loading</div>
                <div class="panel panel-default" v-for="post in posts">

                    <div class="panel-heading">{{ post.title }}</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                posts : [],
                loading:true
            }
        },
        mounted() {

            axios.get('posts/getPost').then((response) => this.posts=response.data,this.loading=false);


        }
    }
</script>