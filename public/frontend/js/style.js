

var element_columns = document.querySelectorAll('.element_columns');
var filter_button = document.querySelectorAll('#filter_button .btnbtn');


Array.from(filter_button).forEach(function(element){
    element.addEventListener('click', function(event){
        for(let i=0; i<filter_button.length; i++){
            filter_button[i].classList.remove('actives');
        }
        this.classList.add('actives');


        var name_filter = element.dataset.filter;

        Array.from(element_columns).forEach(function(ele){
            if(ele.dataset.item === name_filter || name_filter === 'all'){
                ele.style.display = 'flex';
            }
            else{
                ele.style.display = 'none';
            }
        })
    })
    

   
})





