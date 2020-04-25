<template>
  <form :action="submissionUrl" method="POST">
    <slot></slot>
    <div class="form-group">
      <label for="message">
        <strong>Create a post:</strong>
        <textarea class="form-control" name="message" id="message" rows="5" cols="30" v-model="message"></textarea>
      </label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Post Oink" />
    </div>
  </form>
</template>

<script>
export default {
    name: 'oink-create-form',
    props: ['submissionUrl'],
    computed: {
      message: {
        get()
        {
          return this.$attrs.value;
        },
        set(value)
        {
          this.$emit('input', value);
        }
      }
    }
}
</script>