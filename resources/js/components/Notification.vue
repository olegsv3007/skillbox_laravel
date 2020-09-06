<template>
    <div aria-live="polite" aria-atomic="true">
        <div style="position: absolute; top: 10px; right: 10px;">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" v-for="(post, index) in posts">
                <div class="toast-header">
                    <img src="" class="rounded mr-2" alt="">
                    <strong class="mr-auto">Обновлена статья "{{post.post.name}}"</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" v-bind:id="index" v-on:click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Обновлены поля:
                    <li v-for="field in post.fields">
                        {{field}}
                    </li>
                    <a v-bind:href="post.url">Открыть статью</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        mounted() {
            Echo
                .private('admin-notification')
                .listen('PostUpdate', (e) => {
                    this.posts.push({
                        post: e.post,
                        fields: e.fields,
                        url: e.url
                    });
                });
        },
        updated() {
            $('.toast').removeClass('hide');
        },
        methods: {
            close: function (e) {
                this.posts.splice(e.currentTarget.id, 1);
            }
        },
    }
</script>
