require('./bootstrap');

$(document).ready(function () {
    setTimeout(function() {
        $('#createStudent, #deleteProject, #createProject, #deleteStudent').fadeOut('slow',function() {
            $('#createStudent, #deleteProject, #createProject, #deleteStudent').remove();
        });
    }, 2000);

    setTimeout(function() {
        $('#createProjectErrs, #createStudentErrs').fadeOut('slow',function() {
            $('#createProjectErrs, #createStudentErrs').remove();
        });
    }, 5000);
});
