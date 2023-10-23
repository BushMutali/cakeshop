

// scroll button
function scrollToTop(){
    window.scrollTo({top: 0, behavior: 'smooth'})
}

window.onscroll = function (){
    if (document.body.scrollTop > 25 || document.documentElement.scrollTop){
        document.getElementById('nav-btn').style.display = 'block';
    } else{
        document.getElementById('nav-btn').style.display = 'none';
    }
};

document.getElementById('nav-btn').addEventListener('click', scrollToTop);

