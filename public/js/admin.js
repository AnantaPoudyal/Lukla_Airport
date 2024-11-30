function openEditForm(idTemp){
console.log(idTemp);
let aboutmeDiv = document.getElementById("edit-form-"+idTemp);
aboutmeDiv.style.display = "block";
console.log(aboutmeDiv);
}


function closeEditForm(idTemp){
    let aboutmeDiv = document.getElementById("edit-form-"+idTemp);
    console.log(idTemp);
    aboutmeDiv.style.display = "none";
}


function openInsertForm(){
    let aboutmeDiv = document.getElementById("add-form");
aboutmeDiv.style.display = "block";
}

function closeInsertForm(){
    let aboutmeDiv = document.getElementById("add-form");
    aboutmeDiv.style.display = "none";
}
