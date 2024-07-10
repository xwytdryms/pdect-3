document.addEventListener('DOMContentLoaded', () => {
    // Function to toggle modal visibility
    const toggleModal = (modalId, action) => {
        const modal = document.getElementById(modalId);
        if (action === 'show') {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    };

    // Add Device Modal
    const addDeviceButton = document.getElementById('addDevice');
    const addDeviceModal = document.getElementById('addDeviceModal');

    addDeviceButton.addEventListener('click', () => {
        toggleModal('addDeviceModal', 'show');
    });

    // Edit Device Modal
    document.querySelectorAll('#editDevice').forEach(button => {
        button.addEventListener('click', () => {
            toggleModal('editDeviceModal', 'show');
        });
    });

    // Close modals
    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
        button.addEventListener('click', (e) => {
            const modalId = button.getAttribute('data-modal-toggle');
            toggleModal(modalId, 'hide');
        });
    });

    // Actions Dropdown
    const actionsDropdownButton = document.getElementById('actionsDropdownButton');
    const actionsDropdown = document.getElementById('actionsDropdown');

    actionsDropdownButton.addEventListener('click', () => {
        actionsDropdown.classList.toggle('hidden');
    });

    // Close dropdown on outside click
    document.addEventListener('click', (event) => {
        if (!actionsDropdown.contains(event.target) && !actionsDropdownButton.contains(event.target)) {
            actionsDropdown.classList.add('hidden');
        }
    });
});
