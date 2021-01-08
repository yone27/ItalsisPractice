const addForm = document.getElementById('entityclassPL')
const showAlert = document.getElementById('showAlert')

// add new user fetch request
addForm.addEventListener('submit', async e => {
    e.preventDefault()
    const formData = new FormData(addForm)
    formData.append('add', 1)
    // if (addForm.checkValidity() === false) {
    //     e.preventDefault()
    //     e.stopPropagation()
    //     addForm.classList.add('was-validated')
    //     return false
    // } else {
    //addUserBtn.value = 'please wait...'
    const data = await fetch('action.php', {
        method: 'POST',
        body: formData
    })
    const res = await data.text()
    console.log(res);
showAlert.innerHTML = res
    // reset form, hide modal,
    // showAlert.innerHTML = res
    //addUserBtn.value = 'Add user'
    //addForm.reset()
    //addForm.classList.remove('was-validated')
    //fetchAllUsers()
    // document.getElementById('modal1').click()
    // }

})
