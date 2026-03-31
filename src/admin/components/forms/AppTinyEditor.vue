<script setup>
import Editor from '@tinymce/tinymce-vue'

const props = defineProps({
  modelValue: String,
  label: String,
  height: {
    type: Number,
    default: 400
  },
  apiKey: {
    type: String,
    default: 'no-api-key'
  }
})

const emit = defineEmits(['update:modelValue'])

const onUpdate = (val) => emit('update:modelValue', val)

const init = {
  height: props.height,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | blocks | bold italic backcolor | \
    alignleft aligncenter alignright alignjustify | \
    bullist numlist outdent indent | removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
}
</script>

<template>
  <div class="tinymce-editor-wrapper">
    <VLabel v-if="props.label" class="mb-2 d-block font-weight-medium">{{ props.label }}</VLabel>
    <Editor
      :api-key="props.apiKey"
      :init="init"
      :model-value="props.modelValue"
      @update:model-value="onUpdate"
    />
  </div>
</template>

<style scoped>
.tinymce-editor-wrapper {
  margin-bottom: 20px;
}
</style>
