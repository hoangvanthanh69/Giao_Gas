// var modal2 = document.getElementById("myModal2");
// var btn1 = document.getElementById("myBtn1");
// var myModalcart = document.getElementById("myModalcart");
// var myBtncart = document.getElementById("myBtncart");

/* thiết lập nút đóng modal */
// var span = document.getElementsByClassName("close")[0];

/* Sẽ hiển thị modal khi người dùng click vào */


/* Sẽ đóng modal khi nhấn dấu x */
// span.onclick = function() {
//     modal2.style.display = "none";
// }

/*Sẽ đóng modal khi nhấp ra ngoài màn hình*/
// window.onclick = function(event) {
//     if (event.target == modal2) {
//         modal2.style.display = "none";
//     }
// }

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





