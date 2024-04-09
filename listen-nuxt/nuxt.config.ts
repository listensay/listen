// https://nuxt.com/docs/api/configuration/nuxt-config
import nitroPublic from "nitro-public-module";

export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: ["@ant-design-vue/nuxt"],
  nitro: {
    modules: [nitroPublic()],
  },
})