<template>
  <vue-instagram
    :token="accessToken"
    :count="6"
    media-type="image"
  >
    <template
      slot="feeds"
      slot-scope="props"
    >
      <li class="fancy-list">
        {{ props.feed.link }}
      </li>
    </template>
    <template
      slot="error"
      slot-scope="props"
    >
      <div class="fancy-alert">
        {{ props.error.error_message }}
      </div>
    </template>
  </vue-instagram>
</template>
<script>
import VueInstagram from 'vue-instagram';
 
export default {
  name: 'Portfolio',
  components: {
    VueInstagram
  },
  data () {
    return {
      accessToken: 'IGQVJVS3RIMHVDdUJPeUdKdVRsWUJibnlueVFyX2lqaHgtLWNQMlpyUlJmbjZAOX2dBZAjM1czlwRVBqb3NOSFJXTEc0VVZAsQXdrVzljUDNqTTRtZAE0tblBfb1NaZAEE4QTR2RjF3UXg5TTdMUHFxN0F4MQZDZD'
    }
  }
}
</script>