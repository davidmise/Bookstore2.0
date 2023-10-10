<template>
    <button
    :type="type"
    :class="classObject"
    :disabled="disabled"
    @click="onClick">
        {{ text }}
    </button>
</template>

<script>
// import { ReusableButton } from 'bootstrap';

    export default{
        name: 'ReusableButton',
        props: {
            type:{
                type: String,
                default: 'button',
            },
            text:{
                type: String,
                required: true,
            },
            classObject: {
                type: Object,
                default: () => ({}),
            },
            disabled: {
                type: Boolean,
                default: false,
            },
            onClick: {
                type: Function,
                default: () => {},
            },
        },
    };
</script>