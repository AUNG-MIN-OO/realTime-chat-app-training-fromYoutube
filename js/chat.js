const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); //pre
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert_chat.php",true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                inputField.value = "";//for blank of input field after sent
                scrollDown();
            }
        }
    }
    // send data through ajax to php
    let formData = new FormData(form); //creating form data

    xhr.send(formData);
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get_chat.php",true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                chatBox.innerHTML=data;
                if (!chatBox.classList.contains("active")){
                    scrollDown();
                }
                // console.log(data);
            }
        }
    }
    // send data through ajax to php
    let formData = new FormData(form); //creating form data

    xhr.send(formData);
},500);

function scrollDown (){
    chatBox.scrollTop = chatBox.scrollHeight;
}