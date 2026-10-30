function search_student(){
    const searchInput = document.getElementById('search');

    let currentValue = searchInput.value.toLowerCase().trim();
    let rows = document.querySelectorAll('tbody tr');

    rows.forEach(row =>{
        if (row.innerText.toLowerCase().includes(currentValue.trim())){
            console.log(row.innerText);
            row.style.display = '';
        }
        else{
            row.style.display = 'none';
        }
    });
}