var element_column = document.querySelectorAll('.element_column');
var filter_button = document.querySelectorAll('#filter_button .btnbtn');
var search_item = document.getElementById('search_item');

Array.from(filter_button).forEach(function(element){
    element.addEventListener('click', function(event){
        for(let i=0; i<filter_button.length; i++){
            filter_button[i].classList.remove('active');
        }
        this.classList.add('active');


        // var name_filter = element.dataset.filter;

        // Array.from(element_column).forEach(function(ele){
        //     if(ele.dataset.item === name_filter || name_filter === 'all'){
        //         ele.style.display = 'flex';
        //     }
        //     else{
        //         ele.style.display = 'none';
        //     }
        // })
    })
    

   
})
// search 
search_item.addEventListener('keyup',searchItem);

function searchItem(){
    let valueItem = search_item.value.toLowerCase();
    Array.from(element_column).forEach(function(ele){
        let nameItem = ele.querySelector('.infor').firstElementChild.textContent;
        if(nameItem.toLowerCase().indexOf(valueItem) !== -1){
            ele.style.display = 'flex';
        }
        else{
            ele.style.display = 'none';
        }
    })
    checkEmpty(element_column);

}
function checkEmpty(element){
    let count = 0;
    for(let i=0; i<element.length; i++){
        if(element[i].style.display === 'flex'){
            count++;
        }
    }
    if(count === 0 ){
        document,querySelector('#showtext').textContent = 'không có sản phảm';
    }
    else{
        document,querySelector('#showtext').textContent = '';

    }
}
