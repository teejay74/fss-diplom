<template>
    <li><input
        type="radio"
        class="conf-step__radio"
        :value="item.name"
        v-model="checked"
        :name="name"
        @change="chooseHall"
        ><span class="conf-step__selector" >{{ item.name }}</span></li>
</template>

<script>
    export default {
        name: "HallConfigItemComponent",
        data() {
            return {
                checked: this.chooseItem()
            }
        },
        props: ['item', 'id', 'name'],
        methods: {
            chooseHall() {
                this.$emit('sendHall', this.item)
            },
            chooseItem() {
                if(this.id === 0)  {
                    this.$emit('sendHall', this.item)
                    return this.item.name
                }
            }
        }
    }
</script>

<style scoped>

</style>
