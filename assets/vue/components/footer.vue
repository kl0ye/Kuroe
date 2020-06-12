<template>
  <footer class="footer">
    <div class="footer__contenu text-center">
      <div class="footer__social-link">
        <a
          href="http://www.facebook.com"
          title="Facebook"
          target="_blank"
        >
          <inline-svg
            class="footer__facebook"
            :src="require('../../img/svg/facebook.svg').default"
            :width="size" 
            :height="size"
            :color="color"
          />
        </a>
        <a
          href="http://www.twitter.com"
          title="Twitter"
          target="_blank"
        >
          <inline-svg
            class="footer__twitter"
            :src="require('../../img/svg/twitter.svg').default"
            :width="size" 
            :height="size"
            :color="color"
          />
        </a>
        <a
          href="https://www.instagram.com/_kur0e/"
          title="Instagram"
          target="_blank"
        >
          <inline-svg
            class="footer__insta"
            :src="require('../../img/svg/instagram.svg').default"
            :width="size" 
            :height="size"
            :color="color"
          />
        </a>
        <a
          href="http://www.linkedin.com"
          title="Linkedin"
          target="_blank"
        >
          <inline-svg
            class="footer__linkedin"
            :src="require('../../img/svg/linkedin.svg').default"
            :width="size" 
            :height="size"
            :color="color"
          />
        </a>
        <a
          href="http://www.youtube.com"
          title="Youtube"
          target="_blank"
        >
          <inline-svg
            class="footer__youtube"
            :src="require('../../img/svg/youtube.svg').default"
            :width="size" 
            :height="size"
            :color="color"
          />
        </a>
      </div>
      <p class="footer__text">
        Chloé Poineau, apprentie Jedi<br>
        OpenClassrooms 2020
      </p>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  data () {
    return {
      size: 50,
      color: '#FCFCFC'
    }
  }
}
</script>
<style lang="scss">
@import "../../styles/variables.css";
.footer {
    background-color: var(--bg-footer);
    height: 25rem;
    display: flex;
    justify-content: center;
    align-items: center;
    &__contenu {
      width: 50%;
    }
    &__social-link {
      margin-top: 2.5rem;
      display: flex;
      justify-content: space-evenly;
    }
    &__text {
      margin-top: 2.5rem;
      margin-bottom: 0;
      font-size: 1.5rem;
      color: var(--bg-white);
    }
}
</style>
