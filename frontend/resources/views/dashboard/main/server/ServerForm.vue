<template>
  <SchemaForm v-bind="bind" />
</template>

<script type="text/javascript">
import View from '@devitools/Agnostic/Adapters/View'
import Schema from 'source/domains/Main/Server/Schema/ServerSchema'

/**
 */
export default {
  /**
   */
  name: 'ServerForm',
  /**
   */
  extends: View,
  /**
   */
  schema: Schema
}
</script>

<style
  lang="stylus"
  rel="stylesheet/stylus"
>
</style>
