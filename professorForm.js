function submitForm() {
    var fCourseID = document.getElementById("courseId");
    var fCourseName = document.getElementById("courseName");
    var fStarTime = document.getElementById("timeStartId");
    var fEndTime = document.getElementById("timeEndId");
    var fSemesters = document.getElementById("semesters")
    var fYears = document.getElementById("years");
    var f

    var fdays = document.getElementsByClassName("days");

    var noDaysSelected = true;





    for (var i = 0; i < fdays.length; i++) {
        if (fdays[i].checked) {
            noitemsselected = false;
        }
    }
}