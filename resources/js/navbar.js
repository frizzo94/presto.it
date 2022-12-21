let mainnavbar = document.querySelector(`#mainnavbar`);

window.addEventListener(`scroll`, ()=>{

    if(window.scrollY > 0){

        mainnavbar.style.background = `linear-gradient(135deg, rgb(13, 71, 122) , rgb(103, 158, 207))`;

        mainnavbar.style.height = `90px`;

        mainnavbar.style.padding = '40px 10px 40px 10px';

    } else{

        mainnavbar.style.background = `transparent`;

        mainnavbar.style.height = `130px`;

        mainnavbar.style.padding = '30px 10px 50px 10px';

    }

    
})