import './bootstrap';

const mainContent = document.querySelector('.--content');

if(mainContent){
    const mainForm = mainContent.querySelector('form');
    mainContent.querySelectorAll('select').forEach(s => s.addEventListener('change', () =>  mainForm.submit()));
}

