document.addEventListener('DOMContentLoaded', function() {
    const studentRadio = document.getElementById('student-radio');
    const facultyRadio = document.getElementById('faculty-radio');
    const formInner = document.getElementById('form-inner');

    studentRadio.addEventListener('change', function() {
        if (studentRadio.checked) {
            facultyRadio.checked = false;
            formInner.style.transform = 'rotateY(0deg)';
        } else {
            studentRadio.checked = true;
        }
    });

    facultyRadio.addEventListener('change', function() {
        if (facultyRadio.checked) {
            studentRadio.checked = false;
            formInner.style.transform = 'rotateY(180deg)';
        } else {
            facultyRadio.checked = true;
        }
    });

    const studentForm = document.getElementById('student-form');
    const facultyForm = document.getElementById('faculty-form');

    studentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        submitForm(studentForm, 'student');
    });

    facultyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        submitForm(facultyForm, 'faculty');
    });

    function submitForm(form, userType) {
        const formData = new FormData(form);
        fetch('dbconnection.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === 'success') {
                alert(`${userType.charAt(0).toUpperCase() + userType.slice(1)} registered successfully!`);
                form.reset();
            } else {
                alert(`Error: ${data}`);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
