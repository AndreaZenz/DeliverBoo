<template>
  <div class="mb-3 toggle">
    <div
      class="form-check form-check-inline"
      v-for="(item, index) in itemsList"
      :key="item.id"
    >
      <div class="hide">
        <input
          class="form-check-input"
          type="checkbox"
          :value="item.id"
          @change="onChange"
          :id="item.name"
          @click="checked(index)"
        />
      </div>
      <div class="label" v-bind:class="{ color: item.active }">
        <label  :for="item.name"><i :class="item.fontAwesome">  {{ item.name }} </i></label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MultiCheckInput",
  props: {
    items: {
      type: Array,
      required: true,
      active: false,
    },
    label: String,
    value: Array,
  },
  data() {
    return {
      selectedValues: [],
      active: false,
      itemsList: [],
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
    },
    checked(index) {
      this.itemsList[index].active = !this.itemsList[index].active;
    },
  },
  mounted(){
    axios
        .get("/api/types")
        .then((resp) => {
          this.itemsList = resp.data.results;
        })
        .catch((er) => {
          console.error(er);
          alert("Non posso recuperare le tipologie di ristorante");
        });
    },
};
</script>