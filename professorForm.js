function submitForm() {
    var fCourseID = document.getElementById("courseId");
    var fProfessorId = document.getElementById("professorId");
    var fduration = document.getElementById("duration");
    var fStartTime = document.getElementById("startTime")
    var fSemesters = document.getElementById("semesters");
    var fYears = document.getElementById("years");
    var fStudentId = document.getElementById("studentId");
    var courseForm = document.forms["professorForm"];

    var fdays = document.getElementsByClassName("days");

    var noDaysSelected = true;

    for (var i = 0; i < fdays.length; i++) {
        if (fdays[i].checked) {
            noitemsselected = false;
        }
    }

    if (!fCourseID.value) {
        alert("Please enter a valid Course id!")
    }
    else if (!fProfessorId.value) {
        alert("Please enter a professor Id!")
    }
    else if (!fStartTime.value) {
        alert("Please enter a start time for the course!");
    }
    else if (!fduration.value) {
        alert("Please enter a course duration!");
    }
    else if (!fSemesters.value || fSemesters.value == "select") {
        alert("Please enter a semester for the course!");
    }
    else if (!fYears.value || fYears.value.length < 4) {
        alert("Please enter a year for the course! Make sure the year is at least 4 characters long!");
    }
    else if (!fStudentId.value) {
        alert("Please enter an id for the student!")
    }
    else if (noDaysSelected.value == true) {
        alert("Please select at least one day for your course!")
    }
    else {
        if (confirm("Are you aready to submit your class?")) {
            courseForm.submit();
        }
    }
}