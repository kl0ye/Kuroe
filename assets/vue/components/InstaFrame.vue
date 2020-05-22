<template>
  <div class="instagram">
    <iframe
      src="https://snapwidget.com/embed/822326"
      class="snapwidget-widget instagram__iframe"
      allowtransparency="true"
      frameborder="0"
      scrolling="no"
      style="border:none; overflow:hidden;  width:50%;"
    />
  </div>
</template>
<script>
 
export default {
  name: 'InstaFrame'
}
</script>

<style lang="scss">
@import "../../styles/variables.css";
.instagram {
  display: flex;
  justify-content: center;
  &__iframe {
    margin: 1rem 0 5rem;
  }
}
</style>