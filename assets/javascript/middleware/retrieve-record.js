
document.querySelector('.loading-indicator-bg').style.display = 'flex';
    
axios.post('retrieve-record.php')
.then((response) => {
    if(response.data.success) {
        (response.data.payload.length)? document.getElementById('nodata').style.display = "none" : document.getElementById('nodata').style.display = "flex";  

        response.data.payload.forEach((item, index) => {
            createTableRow(index + 1, item);
        });

        setTimeout(() => {
            document.querySelector('.loading-indicator-bg').style.display = 'none';
        }, 1000);
    } else {
        throw "Error";
    }
})
.catch((error) => {
    document.querySelector('.loading-indicator-bg').style.display = 'none';
    document.querySelector('.error-indicator-bg').style.display = 'flex';
})

function createTableRow(index, data) {

    const table = document.getElementById('information-table');

    const tr = document.createElement('tr');
    const indexFeild = document.createElement('td');
    const fathersNameFeild = document.createElement('td');
    const mothersNameFeild = document.createElement('td');
    const addressFeild = document.createElement('td');
    const cpNumberFeild = document.createElement('td');
    const occupationFeild = document.createElement('td');
    const annualIncomeFeild = document.createElement('td');
    const actionFeild = document.createElement('td');

    const editBtn = document.createElement('a');
    const deleteBtn = document.createElement('span');

    actionFeild.classList.add('action');
    editBtn.classList.add("toggle", "edit");
    editBtn.href = `/edit-record.php?parentId=${data.parentId}`;
    deleteBtn.classList.add("toggle", "remove");

    editBtn.innerHTML = `<i class="fas fa-edit"></i>`;
    deleteBtn.innerHTML = `<i class="fas fa-minus-square"></i>`;

    deleteBtn.onclick = function() {
        deleteMiddleware.delete(data.parentId);
    }
    
    actionFeild.appendChild(editBtn);
    actionFeild.appendChild(deleteBtn)

    indexFeild.textContent = index;
    fathersNameFeild.textContent = data.fathersName;
    mothersNameFeild.textContent = data.mothersName;
    addressFeild.textContent = data.address;
    cpNumberFeild.textContent = data.cpNumber;
    occupationFeild.textContent = data.occupation;
    annualIncomeFeild.textContent = data.annualIncome;

    tr.appendChild(indexFeild);
    tr.appendChild(fathersNameFeild);
    tr.appendChild(mothersNameFeild);
    tr.appendChild(addressFeild);
    tr.appendChild(cpNumberFeild);
    tr.appendChild(occupationFeild);
    tr.appendChild(annualIncomeFeild);
    tr.appendChild(actionFeild);

    table.appendChild(tr);

}