module.exports = {
  // Global page headers: https://go.nuxtjs.dev/config-head
  target: 'static',
  ssr: false,
  head: {
    title: 'portfolio',
    htmlAttrs: {
      lang: 'fr'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        rel: 'stylesheet',
        href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
      },
      { rel: 'icon', type: 'image/png', href: '/favicon.png' },
    ]
  },

  script: [
    {
      src: 'https://code.jquery.com/jquery-3.6.0.min.js',
      integrity: 'sha384-KyZXEAg3QhqLMpG8r+Knujsl5/6en8XCp+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3',
      crossorigin: 'anonymous'
    },
    {
      src: 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js',
      integrity: 'sha384-oBqDVmMz4fnFO9gybBud6bA2z3svU+AKfVA6iDPlWp7G9z8g/FGj1ICYl+hl5j4K',
      crossorigin: 'anonymous'
    },
    {
      src: 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js',
      integrity: 'sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65',
      crossorigin: 'anonymous'
    }
  ],

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    '@nuxtjs/netlify-files',

    // With options
    ['@nuxtjs/netlify-files', { /* module options */ }]
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    'bootstrap-vue/nuxt',
    '@nuxtjs/google-fonts',
  ],

  googleFonts: {
    families: {
      'Montserrat': [400, 700]
    }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    generate: {
      dir: 'dist',
      // autres options de génération
    }
  },

  generate: {
    fallback: true
  }

}
