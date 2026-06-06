import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useDemoStore = defineStore('demo', () => {
    // Estado del modal de la demo
    const isModalOpen = ref(false);
    
    // Estado del formulario y errores
    const form = ref({
        pharmacy_name: '',
        whatsapp: '',
    });
    
    const errors = ref({
        pharmacy_name: null,
        whatsapp: null,
    });

    const isSubmitting = ref(false);

    // Acciones para abrir/cerrar el modal
    const openModal = () => {
        isModalOpen.value = true;
        // Limpiar formulario y errores al abrir
        form.value.pharmacy_name = '';
        form.value.whatsapp = '';
        errors.value.pharmacy_name = null;
        errors.value.whatsapp = null;
    };

    const closeModal = () => {
        isModalOpen.value = false;
    };

    return {
        isModalOpen,
        form,
        errors,
        isSubmitting,
        openModal,
        closeModal,
    };
});
