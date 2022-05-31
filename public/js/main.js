function slideToggle(t,e,o){0===t.clientHeight?j(t,e,o,!0):j(t,e,o)}function slideUp(t,e,o){j(t,e,o)}function slideDown(t,e,o){j(t,e,o,!0)}function j(t,e,o,i){void 0===e&&(e=400),void 0===i&&(i=!1),t.style.overflow="hidden",i&&(t.style.display="block");var p,l=window.getComputedStyle(t),n=parseFloat(l.getPropertyValue("height")),a=parseFloat(l.getPropertyValue("padding-top")),s=parseFloat(l.getPropertyValue("padding-bottom")),r=parseFloat(l.getPropertyValue("margin-top")),d=parseFloat(l.getPropertyValue("margin-bottom")),g=n/e,y=a/e,m=s/e,u=r/e,h=d/e;window.requestAnimationFrame(function l(x){void 0===p&&(p=x);var f=x-p;i?(t.style.height=g*f+"px",t.style.paddingTop=y*f+"px",t.style.paddingBottom=m*f+"px",t.style.marginTop=u*f+"px",t.style.marginBottom=h*f+"px"):(t.style.height=n-g*f+"px",t.style.paddingTop=a-y*f+"px",t.style.paddingBottom=s-m*f+"px",t.style.marginTop=r-u*f+"px",t.style.marginBottom=d-h*f+"px"),f>=e?(t.style.height="",t.style.paddingTop="",t.style.paddingBottom="",t.style.marginTop="",t.style.marginBottom="",t.style.overflow="",i||(t.style.display="none"),"function"==typeof o&&o()):window.requestAnimationFrame(l)})}

let sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');
for(var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];
	sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function(e) {
        e.preventDefault();
        
        let submenu = sidebarItem.querySelector('.submenu');
        if(submenu.style.display == 'none') submenu.classList.add('active')
        else submenu.classList.remove('active')
        slideToggle(submenu, 300)
    })
}

let submenuItems = document.querySelectorAll('.submenu-item');

for(var i = 0;i < submenuItems.length;i++){
    let submenuItem = submenuItems[i];
    // console.log(submenuItems[i])
    // if(submenuItem.href == window.location.href){
    //     console.log(window.location.href)
    // }
    // console.log(submenuItems[i])
    submenuItems[i].querySelector('.submenu-item a').addEventListener('click',function(e){
        // e.preventDefault()
        // let submenuItem = e.target.parentNode
        // submenuItem.classList.add('active')
        // let submenu = submenuItem.parentNode
        // submenu.classList.add('active')
        // let sidebar = submenu.parentNode
        // sidebar.classList.add('active')
        let sidebarItem = document.querySelector('.sidebar-item')
        console.log(sidebarItem)


        // let submenuItem = submenuItem.querySelector('.submenu-item')
        // let submenu = submenuItem.querySelector('.submenu')
        // let sidebarItem = submenuItem.querySelector('.sidebar-item')

        // submenuItem.classList.add('active');
        // submenu.classList.add('active');
        // sidebarItem.classList.add('active');


    })
}



window.addEventListener('DOMContentLoaded', (event) => {
    var w = window.innerWidth;
    if(w < 1200) {
        document.getElementById('sidebar').classList.remove('active');
    }
});
window.addEventListener('resize', (event) => {
    var w = window.innerWidth;
    if(w < 1200) {
        document.getElementById('sidebar').classList.remove('active');
    }else{
        document.getElementById('sidebar').classList.add('active');
    }
});

document.querySelector('.burger-btn').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');
})
document.querySelector('.sidebar-hide').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');

})


// Perfect Scrollbar Init
if(typeof PerfectScrollbar == 'function') {
    const container = document.querySelector(".sidebar-wrapper");
    const ps = new PerfectScrollbar(container, {
        wheelPropagation: false
    });
}

document.querySelectorAll('.sidebar-item').forEach(sidebarItem => {
    sidebarItem.querySelectorAll('.sidebar-link').forEach(sidebarLink => {
        if(sidebarLink.href == window.location.href){
            sidebarItem.classList.add('active');
        } 
        
    })
});
document.querySelectorAll('.submenu-item').forEach(submenuItem=>{
    if(submenuItem.addEventListener('click',function(){
        // console.log(submenuItem);
        // e.preventDefault()
        console.log(window.location.href)
    }));
})


// var formDelete = document.getElementsByClassName('form-delete')

function swalDelete(event){
    event.preventDefault();
    form = event.currentTarget
    console.log(form)
    swal({
                title: "Apakah Anda Yakin Ingin Menghapus?",
                text: "Data Anda Tidak Dapat Dikembalikan",
                icon: "warning",
                buttons: ["Batal","Hapus"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    // swal("Sukses", "Akun Berhasil Dihapusp!", "success");
                    // window.location.href = "/data-user";

                }
            });

}

$(document).ready( function () {
    $('#myTable').DataTable();
} );

// document.getElementsByClassName('new-user-btn').addEventListener('click',()=>{
//     alert('uhuy')
// })

// window.PerfectScrollbar = require('perfect-scrollbar.min.js');



// Scroll into active sidebar
// document.querySelector('.sidebar-item.active').scrollIntoView(false)