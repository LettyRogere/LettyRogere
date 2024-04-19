function sPwrd(){
    var inputPass = document.getElementById('senha')
    var btnSPass = document.getElementById('btn-senha')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text')
        btnSPass.classList.replace('bi-eye-fill', 'bi-eye-slash')
    }else{
        inputPass.setAttribute('type', 'password')
        btnSPass.classList.replace('bi-eye-slash', 'bi-eye-fill')
    }
}