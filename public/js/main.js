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
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });
    ps.update();

}

        
//     })
// })
// console.log(window.location.href)
function dataObatBaru(event){
    event.preventDefault();
    var divNama = document.createElement('div');
    divNama.className ='form-group col-md-6 col-12'
    divNama.innerHTML = '<label for="nama_obat" class="sr-only">Nama Obat</label> <input type="text" placeholder="Masukkan Nama Obat" name="nama_obat[]" class="form-control @error("nama_obat") is-invalid @enderror" required>'
    var divSatuan = document.createElement('div');
    divSatuan.className ='form-group col-md-6 col-12'
    divSatuan.innerHTML = '<label for="satuan" class="sr-only">Satuan</label> <select class="form-select @error("satuan") is-invalid @enderror" name="satuan[]" required><option value="Tablet">Tablet</option><option value="Botol">Botol</option><option value="Ampul">Ampul</option><option value="Vial">Vial</option></select>'
    document.getElementById('fieldobat').appendChild(divNama)
    document.getElementById('fieldobat').appendChild(divSatuan)

}

// function addRow(event){
//     // alert('o');
//     event.preventDefault();
//     rowKonten = document.createElement('tr');
//     rowKonten.innerHTML = '<td><select class="form-select dataobat @error("dataobat_id") is-invalid @enderror" name="dataobat_id[]" required id="dataobat_id" onclick=autofill()><option value="">Masukan Nama Obat</option>@foreach($dataobats as $dataobat)<option value="OBT00003" id="dataobat_id">antasida</option>@endforeach</select></td><td width="130px"><input type="text" readonly name="kode_obat_id[]" id="kode_obat" class="form-control @error("kode_obat_id") is-invalid @enderror" required value="{{ old("kode_obat_id") }}" onkeyup="autofill()"></td><td width="100px"><input type="number"  name="jumlah" class="form-control @error("jumlah") is-invalid @enderror" id="jumlah" readonly required value="{{ old("jumlah") }}" ></td><td width="100px"><input type="number" name="jumlah_keluar[]" class="form-control @error("jumlah_keluar") is-invalid @enderror" required value="{{ old("jumlah_keluar") }}" ></td><td><button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" id="deleteRow"></i></button></td>';
//     document.getElementById('obtklr_tb').children[1].appendChild(rowKonten)
// }
// function deleteRow(event){
//     // alert('p')
//     event.preventDefault();
//     // var td = event.target.parentNode; 
//     //   var tr = td.parentNode; // the row to be removed
//     // //   tr.parentNode.removeChild(tr);
//     // console.log(tr)

//     var divTable = document.getElementById('obtklr_tb');
//     // var divkonten = '<td>1</td>';
//     var currentIndex = divTable.rows.length;
//     divTable.removeChild(currentIndex);
//     // alert(currentIndex);
//     // document.getElementById('obtklr_tb').appendChild(divkonten)
// }

$(document).ready(function(){
    $("#obtklr_tb").on('click','#deleteRow',function(){
        $(this).closest('tr').remove();
     });
 });

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

var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;

document.getElementById("startdateId").value = today;

// window.PerfectScrollbar = require('perfect-scrollbar.min.js');



// Scroll into active sidebar
document.querySelector('.sidebar-item.active').scrollIntoView(true)

