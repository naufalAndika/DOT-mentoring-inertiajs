<template>
    <layout>
        <div>
        This is welcome page: {{ foo }}
    </div>
    </layout>
</template>

<script>
import Layout from '../Shared/Layout'

  export default {
    components: {
      Layout,
    },
    props: ['foo'],
  }
</script>
