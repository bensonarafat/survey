<template>
    <div class="flex flex-col">
        <span class="italic">{{ current }}..</span>
        <input type="text" name="" class="question" id="" placeholder="Your question here..." @input="onInputTitle">
        <input type="text" name="" class="description" id="" placeholder="Description (optional)" @input="onInputDescription">
        <input type="text" name="" id="" class="answer" readonly disabled placeholder="Type your answer here....">
    </div>
</template>

<style scoped>
    .question, .description{
        border:none;
        box-shadow: none;
    }
    .description{
        font-style: italic;
        font-size: 13px;
        color: #949393;
    }
    .question:focus, .description:focus{
        border:none;
        box-shadow: none;
    }
    .answer{
        border: none;
        border-bottom: 1px solid rgba(0, 0, 255, 0.443);
    }
</style>
<script>
export default {
    name: "ShortTextQuestion",
    props: ["current"],
    methods: {
        onInputTitle(e) {
            this.$emit('on-input', e.target.value, 'title', this.current)
        },
        onInputDescription(e) {
            this.$emit('on-input', e.target.value, 'description', this.current)
        },
    }
}
</script>
