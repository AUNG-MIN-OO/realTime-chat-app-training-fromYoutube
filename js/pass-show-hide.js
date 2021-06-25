const pswField = document.querySelector(".form .fields input[type='password']");
toggleBtn = document.querySelector(".form .fields i");

toggleBtn.onclick = ()=>{
    if (pswField.type == "password" ){
        pswField.type = "text";
        toggleBtn.classList.add("active");
    }else {
        pswField.type = "password";
        toggleBtn.classList.remove("active");
    }
}