<template>
    <span>
        <datetime format="YYYY-MM-DD h:i:s" firstDayOfWeek="1" :value="setValue" name="schedule_on" required></datetime>
    </span>
</template>

<script>
    import datetime from 'vuejs-datetimepicker';

    export default {
        components: { datetime },
        props: {
            schedule_on: String
        },
        data: function () {
            return {
                val: ''
            }
        },
        computed:  {
            setValue: function () {
                if(this.schedule_on) {
                    return this.schedule_on
                }
                return this.val
            }
        },
    };
</script>
