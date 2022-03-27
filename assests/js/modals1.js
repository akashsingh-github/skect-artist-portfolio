//get modal
alert("sir so gaya")
var modal = document.getElementById('price-table-modal');
var getImageUploadModal = document.getElementById('image-upload-modal');
var getSignInModal = document.getElementById('sign-in-modal');
var getRegisterModal = document.getElementById('register-modal');
//get modalBtn
var modalBtn = document.getElementById('openTableModal');
var getOpenRegisterModal = document.getElementById('open-register-modal');
var getOpenImageUploadModal = document.getElementById('openImageModal');
var getSignInBtnModalBtn = document.getElementById('open-sign-in-modal');
//get closeBtn
var getclosePriceTableModal = document.getElementById('closePriceTableModal');

var getCloseImageUploadModal = document.getElementById('closeImageModal');

//listen for open click
modalBtn.addEventListener('click', openModal);
//listen for close modal
getclosePriceTableModal.addEventListener('click', closePriceTableModal);
//listen for we=indow outside click
window.addEventListener('click', outsideClick);

getOpenImageUploadModal.addEventListener('click', function(){
    getImageUploadModal.style.display = 'block';
    modal.style.display='none';
})

getCloseImageUploadModal.addEventListener('click', function(){
    getImageUploadModal.style.display = 'none';
    alert("sign-in clicked!!!")
})

getSignInBtnModalBtn.addEventListener('click', function(){
    getSignInModal.classList.add('show-sign-in-modal');
})

getOpenRegisterModal.addEventListener('click', function(){
    // getSignInModal.style.display = 'none';
    getSignInModal.classList.remove('show-sign-in-modal');
    // getRegisterModal.style.display = 'block';
    getRegisterModal.classList.add('register-modal-show');
})

function closePriceTableModal(){
    modal.style.display = 'none';
    // alert("close the btn");
    // getImageUploadModal.style.display = 'block';
}
function outsideClick(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
    if(e.target == getImageUploadModal){
        getImageUploadModal.style.display = 'none';
    }
    if(e.target == getSignInModal){
        getSignInModal.classList.remove('show-sign-in-modal');
    }
    if(e.target == getRegisterModal){
        getRegisterModal.classList.remove('register-modal-show');
    }
}