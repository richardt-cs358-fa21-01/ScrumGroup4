function submitForm() {
    var fCourseID = document.getElementById("courseId");
    var fCourseName = document.getElementById("courseName");
    var fStartTime = document.getElementById("timeStartId");
    var fEndTime = document.getElementById("timeEndId");
    var fSemesters = document.getElementById("semesters")
    var fYears = document.getElementById("years");
    var fPreference = document.getElementById("textSI");
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
    else if (!fCourseName.value) {
        alert("Please enter a course name!")
    }
    else if (!fStartTime.value) {
        alert("Please enter a course start time!");
    }
    else if (!fEndTime.value) {
        alert("Please enter a course end time!");
    }
    else if (fStartTime.value == fEndTime.value) {
        alert("Please ensure that your start and end time are not the same!");
    }
    else if (!fSemesters.value || fSemesters.value == "select") {
        alert("Please enter a semester for the course!");
    }
    else if (!fYears.value || fYears.value.length < 4) {
        alert("Please enter a year for the course! Make sure the year is at least 4 characters long!");
    }
    else if (!fPreference.value) {
        alert("Please enter a name for an SI or put none for no one!")
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