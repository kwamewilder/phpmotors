// setting the functions
getTheDate();
lastModifiedDoc();

// gets the current date
function getTheDate() {

    let d = new Date();

    let theYear = d.getFullYear().toString();

    document.querySelector(".getDate").innerHTML = "&copy " + theYear;
}

//gets the date for when the document was last modified

function lastModifiedDoc() {
    let lastEdit = document.lastModified.toString();
    document.querySelector(".lastModifiedDate").innerHTML = "Last Updated: " + lastEdit;
}