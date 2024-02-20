function confirmation(ev){
    ev.preventDefault();

       
    //var urlToRedirect =  window.location.href="/admin/delete-"+ record +'/'+recordid;
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);

     // Copied from sweet alert website online
    const swalWithBootstrapButtons = Swal.mixin({
customClass: {
  confirmButton: "btn btn-success",
  cancelButton: "btn btn-danger",

},

buttonsStyling: false
});
swalWithBootstrapButtons.fire({
title: "You are about to delete an item", 
text: "You won't be able to revert this!",
icon: "warning",
showCancelButton: true,
confirmButtonText: "Yes, delete it!",
cancelButtonText: "No, cancel!",
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
  swalWithBootstrapButtons.fire({
    title: "Item Deleted!",
    text: "You deleted an item.",
    icon: "success"
  });
  
  window.location.href = urlToRedirect;

  window.location.href = urlToRedirect;
} else if (
  /* Read more about handling dismissals below */
  result.dismiss === Swal.DismissReason.cancel
) {
  swalWithBootstrapButtons.fire({
    title: "Cancelled",
    text: "No item was deleted",
    icon: "error"
  });
 
}
});
   
    }
  






//For Sweet alert
// $(document).on("click",".confirmDelete",function(){
//     var name = $(this).atrr('name');
//     if(confirm('Are you sure to delete this' + name + "?")){
//         return true;
//     }return false;
//     // alert('test');
// var record = $(this).atrr('record');
// var recordid = $(this).atrr('recordid');

// // Copied from sweet alert website online

// Swal.fire({
//     title: "Are you sure?",
//     text: "You won't be able to revert this!",
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     confirmButtonText: "Yes, delete it!"
//   }).then((result) => {
//     if (result.isConfirmed) {
//       Swal.fire(
//         "Deleted!",
//        "Your file has been deleted.",
//        "success"
//       );
//       window.location.href="/admin/delete-"+record +'/'+recordid;
//     }
    
//   });
 
// });

