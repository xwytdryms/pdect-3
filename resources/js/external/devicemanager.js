        document.addEventListener('DOMContentLoaded', function () {
        // Function to open modal
        function openModal(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Function to close modal
        function closeModal(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Get all edit buttons
        const editButtons = document.querySelectorAll('[data-modal-toggle="editDeviceModal"]');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const deviceId = this.getAttribute('data-device-id');
                const deviceName = this.getAttribute('data-device-name');
                const deviceAddress = this.getAttribute('data-device-address');
                const deviceLongitude = this.getAttribute('data-device-longitude');
                const deviceLatitude = this.getAttribute('data-device-latitude');
                const deviceDescription = this.getAttribute('data-device-description');

                document.getElementById('name').value = deviceName;
                document.getElementById('address').value = deviceAddress;
                document.getElementById('longitude').value = deviceLongitude;
                document.getElementById('latitude').value = deviceLatitude;
                document.getElementById('description').value = deviceDescription;

                // If you need to submit the form with the correct device ID
                const form = document.querySelector('#editDeviceModal form');
                form.action = `/editdevice/${deviceId}`;

                // Open the modal
                const modal = document.getElementById('editDeviceModal');
                openModal(modal);
            });
        });

        // Handle closing the modal
        const closeButton = document.querySelector('#editDeviceModal [data-modal-toggle="editDeviceModal"]');
        if (closeButton) {
            closeButton.addEventListener('click', function () {
                const modal = document.getElementById('editDeviceModal');
                closeModal(modal);
            });
        }

        // Close the modal when clicking outside the modal content
        // const modal = document.getElementById('editDeviceModal');
        // modal.addEventListener('click', function (event) {
        //     if (event.target === modal) {
        //         closeModal(modal);
            // }
        // });
    });

