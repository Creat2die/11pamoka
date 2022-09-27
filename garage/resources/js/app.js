import './bootstrap';
import axios from 'axios';
import { Modal } from 'bootstrap';

const mainContent = document.querySelector('.--content');
if (mainContent) {
    const mainForm = mainContent.querySelector('form');
    mainContent.querySelectorAll('select')
        .forEach(s => s.addEventListener('change', () => mainForm.submit()));
}



const breakdown = document.querySelector('#breakdown');
if (breakdown) {
    const trucksList = breakdown.querySelector('#trucks-list');
    const mechanicId = breakdown.querySelector('[name=mechanic_id]');
    const submitButton = breakdown.querySelector('[data-submit]');

    mechanicId.addEventListener('change', () => {
        if (mechanicId.value === '0') {
            trucksList.innerHTML = '';
        } else {
            axios.get(breakdownUrl + '/trucks-list/' + mechanicId.value)
                .then(res => {
                    trucksList.innerHTML = res.data.html;
                })
        }

    });
    submitButton.addEventListener('click', () => {
        const data = {};
        breakdown.querySelectorAll('[data-create]')
            .forEach(i => {
                data[i.getAttribute('name')] = i.value;
            });
        axios.post(breakdownUrl + '/create', data)
            .then(res => {
                console.log(res.data);
                getList();
            })
            .catch(error => {
                console.log('viskas blogai');
            })
    });
    window.addEventListener('load', () => {
        getList();
    });
}

const getList = () => {
    const breakdownsList = document.querySelector('#breakdowns-list');
    axios.get(breakdownUrl + '/list')
        .then(res => {
            breakdownsList.innerHTML = res.data.html;
            deleteEvent();
            modalEvent();
        })
}

const deleteEvent = () => {
    document.querySelectorAll('.delete--button')
        .forEach(b => {
            b.addEventListener('click', () => {
                axios.delete(breakdownUrl + '/' + b.dataset.id)
                    .then(res => {
                        if (res.data.refresh == 'list') {
                            getList();
                        }
                    })
            });
        });
}

const modalEvent = () => {
    const modal = document.querySelector('#edit-modal');
    const fadeModal = new Modal(modal);
    document.querySelectorAll('.edit--button')
        .forEach(b => {
            b.addEventListener('click', () => {
                axios.get(breakdownUrl + '/modal/' + b.dataset.id)
                .then(res =>{
                    modal.querySelector('.modal-dialog').innerHTML = res.data.html;
                    fadeModal.show();
                })
            })
        })

}