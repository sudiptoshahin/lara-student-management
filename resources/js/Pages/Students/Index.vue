<script setup>
defineProps({
    students: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <section>
        <div class="">
            <h1>Students</h1>
            <button>Add Student</button>
        </div>
    </section>
</template>
