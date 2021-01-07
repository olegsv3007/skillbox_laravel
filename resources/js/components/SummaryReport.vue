<template>
    <ol>
        <li v-for="item in report">
            {{item[0]}}: {{item[1]}}
        </li>
    </ol>
</template>
<script>
    export default {
        props: ['userId'],
        data() {
            return {
                report: {},
            }
        },
        mounted() {
            Echo
                .private('report.' + this.userId)
                .listen('SummaryReportReady',(e) => {
                    this.report = Object.entries(e.reportData);
                });
        }
    }
</script>
