let arr = document.querySelectorAll(".remove_order");
arr.forEach(function (e) {
     e.addEventListener("click", function (ee) {
          let a = this.id;
          let tr = document.querySelectorAll("tr");
          tr.forEach(async function (eee) {
               if (eee.id == a) {
                    SwalDelete(a, eee);
               }
          })
     })

});
function SwalDelete(orderId, e) {
     swal({

               title: "Are you sure?",
               text: "Once deleted, you will not be able to recover this order!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
               closeOnClickOutside: false
          })
          .then((willDelete) => {
               if (willDelete) {
                    $.ajax({
                         url: 'delete-order.php',
                         type: 'GET',
                         data: {
                              Order_ID: orderId
                         },
                         success: function (data) {

                              if (data != orderId) {
                                   swal("Poof! Your order has been deleted!", {
                                        icon: "success",
                                   });
                                   e.remove();
                              } else {
                                   swal("Oops",
                                        "Something went wrong!", {
                                             icon: "error",
                                        });
                              }
                         }
                    });
               } else {
                    swal.close()
               }
          });

}