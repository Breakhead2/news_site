/*section toggle admin */

let buttons_toggle_admin = document.querySelectorAll('#toggle');

buttons_toggle_admin?.forEach( button => {
     button.addEventListener('click', () => {
        let userId = button.closest('div[data-id]')
            .getAttribute('data-id');
         (async () => {
             let request = await fetch(`/api/users?id=${userId}`);
             let response = await request.json();

             if(response.isAdmin){
                 button.innerText = 'Админ';
                 button.className= 'info__btn admin_btn';
             }else{
                 button.innerText = 'Пользователь';
                 button.className= 'info__btn user';
             }
         })()
    })
});

let buttons_remove_article = document.querySelectorAll('#remove_art');
console.log(buttons_remove_article)
buttons_remove_article?.forEach(button => {
    button.addEventListener('click', () => {
        if(confirm('Вы действительно хотите удалить новость?')){
            let artId = button.getAttribute('data-id');
            let article = button.closest('.article__item[data-id]');
            (async () => {
                const request = await fetch(`/api/news/delete?id=${artId}`);
                const response = await request.json();

                if(response.status === 'ok'){
                    article.remove();
                }
            })()
        }
    })
});

let btn_menu = document.querySelector('#btn_menu');
let box = document.querySelector('.box');
let btn_category = document.querySelector('.category__selector');
let categories = document.querySelector('.categories');
let arrow = document.querySelector('#arrow');

btn_menu?.addEventListener('click', () => {
    if(btn_menu.classList.contains('fa-bars')){
        btn_menu.className = 'fa-solid fa-xmark';
        box.classList.add('active');
        categories.classList.remove('active');
        arrow.className = 'fa-sharp fa-solid fa-arrow-down';
    } else {
        btn_menu.className = 'fa-sharp fa-solid fa-bars';
        box.classList.remove('active');
    }
})

btn_category?.addEventListener('click', () => {
    if(categories.classList.contains('active')){
        categories.classList.remove('active');
        arrow.className = 'fa-sharp fa-solid fa-arrow-down';
    }else{
        categories.classList.add('active');
        arrow.className = 'fa-sharp fa-solid fa-arrow-up';
    }
})

setInterval(async () => {
    await fetch('/admin/parser');
},3600000);
