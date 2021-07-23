<template>
  <div class="mb-3">
    <label class="form-label">
      {{ label }}
    </label>
    <input
      class="form-control"
      :type="inputType"
      :placeholder="placeholder"
      :value="value"
      @input="$emit('input', $event.currentTarget.value)"
    />
  </div>
</template>

<script>
export default {
  name: "TextInput", 
  props: {
    label: String,
    value: String,
    placeholder: String,
    inputType: {
      type: String,
      default: "text",
    },
  },
};
</script>