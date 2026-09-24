// Keep the administrative login screen focused on authentication and approval.
const simplifyAdminLoginChrome = () => {
    const header = document.querySelector('header.fixed');
    const footer = document.querySelector('footer');

    if (!header || !footer) {
        return;
    }

    const hotline = [...header.querySelectorAll('div')]
        .filter((element) => element.textContent.includes('Emergency Hotline') && element.querySelector('a[href^="tel:"]'))
        .sort((a, b) => a.textContent.length - b.textContent.length)[0];
    hotline?.remove();

    [...header.querySelectorAll('a')]
        .find((element) => element.textContent.includes('Return to Public Portal'))
        ?.remove();

    footer.querySelector('.border-b')?.remove();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', simplifyAdminLoginChrome, { once: true });
} else {
    simplifyAdminLoginChrome();
}

// Connect the department registration panel to the Laravel approval workflow.
window.submitRegistration = async function (event) {
    event.preventDefault();

    const form = event.currentTarget;
    const fields = form.querySelectorAll('input:not([type="hidden"]), select');
    const names = ['full_name', 'employee_id', 'department', 'designation', 'email', 'password', 'password_confirmation'];

    fields.forEach((field, index) => {
        field.name = names[index];
    });

    const existingError = form.querySelector('[data-registration-error]');
    existingError?.remove();

    const token = document.querySelector('meta[name="csrf-token"]')?.content
        || document.querySelector('input[name="_token"]')?.value
        || '';
    const formData = new FormData(form);
    formData.set('_token', token);

    let response;
    let payload;

    try {
        response = await fetch('/admin/register', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-CSRF-TOKEN': token,
                Accept: 'application/json',
            },
            body: formData,
        });
        payload = await response.json();
    } catch (error) {
        const message = document.createElement('div');
        message.dataset.registrationError = 'true';
        message.className = 'p-space-md bg-red-50 border border-red-200 rounded text-sm text-red-800';
        message.textContent = 'The registration request could not reach the server. Please refresh the page and try again.';
        form.prepend(message);
        return false;
    }

    if (!response.ok) {
        const error = document.createElement('div');
        error.dataset.registrationError = 'true';
        error.className = 'p-space-md bg-red-50 border border-red-200 rounded text-sm text-red-800';
        error.textContent = payload.message || Object.values(payload.errors || {}).flat()[0] || 'Registration could not be submitted.';
        form.prepend(error);
        return false;
    }

    const alertBox = document.getElementById('regSuccessAlert');
    if (alertBox) {
        alertBox.querySelector('strong')?.replaceChildren(payload.reference);
        alertBox.classList.remove('hidden');
    }

    form.reset();
    return false;
};
