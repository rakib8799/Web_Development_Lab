const nameErr = 'name_err';
const emailErr = 'email_err';
const genderErr = 'gender_err';
const courseErr = 'course_err';
const batchErr = 'batch_err';
const imageErr = 'image_err';
const successIcon = '<i class="fa-solid fa-check"></i>';

function errorHandler(name,text){
    document.getElementById(name).innerHTML = text;
}

function getValue(name){
    const value = document.getElementById(name).value;
    return value;
}

function getName(name){
    const studentName = document.getElementsByName(name);
    return studentName;
}

function validateName(){
    const name = getValue('name');
    if(name.length===0){
        errorHandler(nameErr,'Name is required');
        return false;
    }
    if(!name.match(/[a-zA-Z]+(\s[a-zA-Z]+)+/)){
        errorHandler(nameErr,'Write full name');
        return false;
    }
     errorHandler(nameErr,successIcon);
    return true;
}
function validateEmail(){
    const email =  getValue('email');
    if(email.length===0){
        errorHandler(emailErr,'Email is required');
        return false;
    }
    if(!email.match(/[\w]+([\._\-]?[\w])*[@][a-zA-Z]+[\.][a-z]{2,3}/)){
        errorHandler(emailErr,'Email is invalid');
        return false;
    }
    errorHandler(emailErr,successIcon);
    return true;
}
function validateGender(){
    const gender =getName('gender');
    if(gender[0].checked===false && gender[1].checked===false && gender[2].checked===false){
        errorHandler(genderErr,'Gender must be filled');
        return false;
    }
    errorHandler(genderErr,successIcon);
    return true;
}
function validateCourse(){
    const course = getValue('course');
    if(course===""){
        errorHandler(courseErr,'Course must be filled');
        return false;
    }
    errorHandler(courseErr,successIcon);
    return true;
}
function validateBatch(){
    const batch = getName('batch[]');
    // console.log(batch);
    // let values=[];
    let check = false;
    for(let i=0;i<batch.length;i++){
        if(batch[i].checked){
            // console.log(batch[i].value);
            // values.push(batch[i].value);
            // batch[i].value = batch[i].checked.value;
            check = true;
        }
    }
    if(check===false){
        errorHandler(batchErr,'Batch is required');
        return false;
    }
    errorHandler(batchErr,successIcon);
    return true;
}
function validateImage(){
    const image = document.getElementById('image').files;
    const image1 = document.getElementById('image').files[0];
    // console.log(image1?.size);
    // const {name} = image1;
    // console.log(name);
    if(image.length===0){
        errorHandler(imageErr,'Image is required');
        return false;
    }
    if(!image1?.name.match(/^.+\.(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/)){
        errorHandler(imageErr,'Invalid image file');
        return false;
    }
    if(image1?.size>=5242880){
        errorHandler(imageErr,'File can not be larger than 5MB');
        return false;
    }
    errorHandler(imageErr,successIcon);
    return true;
}

function formData() {
    if(!validateName() || !validateEmail() || !validateGender() || !validateCourse() || !validateBatch() || !validateImage())
        return false;
    else
        return true;
}

// function updateFormData(){
//     if(!validateName() || !validateEmail() || !validateGender() || !validateCourse() || !validateBatch() || !validateImage())
//         return false;
//     else
//         return true;
// }


// function updateFile() {
//     const input = document.getElementById('image').files;
//     const output = document.getElementById('image');
//     // var output = document.getElementById('fileList');
  
//     // output.innerHTML = '<ul>'
//     for (let i = 0; i < input.length; i++) {
//       output.innerHTML +=  input.name;
//     }  
// }

function showPreview(e){
    if(e.target.files.length>0){
        const src = URL.createObjectURL(e.target.files[0]);
        const preview = document.getElementById("preview_image");
        preview.src = src;
        preview.style.display = "block";
    }
}