<template>
    <nav class="page-nav">
        <DayItem v-for="item in dateArray"
                 :key="item.id"
                 :dayOfWeek="item.dayOfWeek"
                 :id="item.id"
                 :calendarDay="item.calendarDay"
                 :active="item.active"
                 @close-items="closeItems"
        />
    </nav>
</template>

<script>
    import DayItem from "./DayItem";
    import moment from 'moment'
    const days = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
    const dateArray = [];
    const date = moment();
    const toDay = date.format("D")

    for (let i = 0; i <= 5; i+=1) {
        const toDay = moment();
        const curDate = toDay.add(i, 'days')
        const curDayOfWeek = days[curDate.day()]
        const objDay = {
            id: i,
            calendarDay: curDate.format("D"),
            dayOfWeek: curDayOfWeek
        }
        if(i === 0) {
            objDay.active = true
        } else {
            objDay.active = false
        }
        dateArray.push(objDay)
    }


    export default {
        name: "NavComponents",
        components: {
            DayItem
        },
        data() {
            return {
                dateArray
            }
        },
        methods: {
            closeItems(data) {

                this.dateArray.map(item=>{
                    item.active=false
                   // item.dayOfWeek = 'NNN'
                  })
                this.dateArray[data].active = true
            }
        }

    }
</script>

<style scoped>

</style>
