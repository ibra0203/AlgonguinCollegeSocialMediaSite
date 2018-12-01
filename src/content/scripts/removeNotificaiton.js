// removes a notification of class 'flash-msg' with a button of id 'delete'

const del = document.querySelector('#delete');
const notification = document.querySelector('.flash-msg');
del.addEventListener('click', e => {
    e.preventDefault();
    notification.parentNode. removeChild(notification);
});