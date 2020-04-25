<template>
  <form :action="editUrl" method="POST">
    <slot></slot>
    <div v-if="isGif" class="form-group">
      <div>
        <img :src="message" />
        <button class="btn btn-warning" @click="resetMessage">Reset</button>
        <input type="hidden" name="message" v-model="message" />
        <input type="hidden" name="is_gif" :value="isGif" />
      </div>
    </div>
    <div v-else class="form-group">
      <label for="message">
        <strong>Edit Post:</strong>
        <textarea class="form-control" name="message" id="message" rows="5" cols="30" v-model="message"
        ></textarea>
      </label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Update Oink" />
    </div>
  </form>
</template>

<script>
export default {
  name: "oink-edit-form",
  props: ["editUrl", "originalMessage"],
  mounted () {
    this.message = this.originalMessage;
  },
  computed: {
    message: {
      get() {
        this.isStringAGIFUrl(this.$attrs.value);
        return this.$attrs.value;
      },
      set(value) {
        this.$emit("input", value);
      }
    }
  },
  methods: {
    isStringAGIFUrl(string) {
      if (string.includes("http") && string.includes(".gif")) {
        this.isGif = true;
        return true;
      }
      this.isGif = false;
      return false;
    },
    resetMessage() {
      this.message = "";
    }
  },
  data() {
    return {
      isGif: false
    };
  }
};
</script>

<style scoped>
</style>