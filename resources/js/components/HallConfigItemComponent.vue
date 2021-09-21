<template>
    <li><input
        type="radio"
        class="conf-step__radio"
        name="chairs-hall"
        :value="item.name"
        v-model="checked"
        @change="chooseHall"
        ref="hallItem"><span class="conf-step__selector" >{{ item.name }}</span></li>
</template>

<script>
    export default {
        name: "HallConfigItemComponent",
        data() {
            return {
                checked: this.chooseItem()
            }
        },
        props: ['item', 'id'],
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
