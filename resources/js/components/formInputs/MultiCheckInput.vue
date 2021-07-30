<template>
    <div class="mb-3">
        <div
            class="form-check form-check-inline"
            v-for="item in items"
            :key="item.id"
        >
            <label class="form-check-label">
                <input
                    class="form-check-input"
                    type="checkbox"
                    :value="item.id"
                    @change="onChange"
                />
                {{ item.name }}
            </label>
        </div>
    </div>
</template>

<script>
export default {
    name: "MultiCheckInput",
    props: {
        items: {
            type: Array,
            required: true
        },
        label: String,
        value: Array
    },
    data() {
        return {
            selectedValues: []
        };
    },
    methods: {
        onChange(ev) {
            const checked = ev.target.checked;

            if (checked) {
                this.selectedValues.push(ev.target.value);
            } else {
                const index = this.selectedValues.indexOf(ev.target.value);

                this.selectedValues.splice(index, 1);
            }

            this.$emit("input", this.selectedValues);
        }
    }
};
</script>