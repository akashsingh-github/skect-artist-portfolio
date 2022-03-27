//get modal
// alert("sir so gaya")
var priceModal = document.getElementById('price-table-modal');
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
modalBtn.addEventListener('click', function(){
    priceModal.classList.add('show-price-table');
});
//listen for close modal
getclosePriceTableModal.addEventListener('click', closePriceTableModal);
//listen for we=indow outside click
window.addEventListener('click', outsideClick);

getOpenImageUploadModal.addEventListener('click', function(){
    getImageUploadModal.style.display = 'block';
    modal.style.display='none';
})

getCloseImageUploadModal.addEventListener('click', function(){
    getImageUploadModal.classList.remove('show-image-upload');
    // alert("Hii");
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

function outsideClick(e){
    if(e.target == priceModal){
        priceModal.classList.remove('show-price-table');
    }
    if(e.target == getImageUploadModal){
        getImageUploadModal.classList.remove('show-image-upload');
    }
    if(e.target == getSignInModal){
        getSignInModal.classList.remove('show-sign-in-modal');
    }
    if(e.target == getRegisterModal){
        getRegisterModal.classList.remove('register-modal-show');
    }
}