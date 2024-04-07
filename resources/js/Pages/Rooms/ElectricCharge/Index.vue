<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});
</script>
