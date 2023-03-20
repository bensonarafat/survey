<template>
    <div class="flex flex-col">
        <span class="italic">{{ current }}..</span>
        <input type="text" name="" class="question" id="" placeholder="Your question here...">
        <input type="text" name="" class="description" id="" placeholder="Description (optional)">
        <input type="text" name="" id="" class="answer" placeholder="Address">
        <input type="text" name="" id="" class="answer" placeholder="Town/City">
        <input type="text" name="" id="" class="answer" placeholder="Address">
        <input type="text" name="" id="" class="answer" placeholder="Zip Code">
        <input type="text" name="" id="" class="answer" placeholder="Country">
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
    name: "AddressQuestion",
    props: ["current"],
    methods: {
    }
}
</script>
