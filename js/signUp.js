const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorTxt = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //pre
}

continueBtn.onclick = ()=>{
    //start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/signup.php",true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                let data = xhr.response;
                if (data == "success"){
                    window.location.href = "users.php";
                }else{
                    errorTxt.textContent =data;
                    errorTxt.style.display = "block";
                }
            }
        }
    }
    // send data through ajax to php
    let formData = new FormData(form); //creating form data

    xhr.send(formData);
}