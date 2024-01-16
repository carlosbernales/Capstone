
const baseUrl = window.location.protocol + '//' + window.location.host + '/'; // Dynamically determine base URL


function add_tocart(productId, Cost, userId) {
  $.ajax({
    url: baseUrl + 'addtocart',
    type: "POST",
    data: { productId: productId, Cost: Cost, userId: userId },
    beforeSend: function () {},
    complete: function () {},
    success: function (response) {
      console.log('response', response);
      const Jsondata = JSON.parse(response);
      if (Jsondata.status === 'success') {
        $("#totalItemPrice").text(Jsondata.totalItemPrice);
        $("#subtotal").text(Jsondata.subtotal);
        $("#addcount_" + productId).val(Jsondata.cart_qty);
        $("#cartcount").text(Jsondata.count);

        Swal.fire({
          title: 'Added to Cart',
          icon: 'success',
          showConfirmButton: false, 
          timer: 1000 
        });

        setTimeout(function() {
          location.reload();
        }, 1000);
      } else {
        
        Swal.fire({
          title: 'Error!',
          text: 'Failed to add product to cart.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }
    },
  });
}



function minus(productId, userId) {

  $.ajax({
    url: baseUrl + 'decrement',
    type: "POST",
    data: { productId: productId, userId: userId },
    beforeSend: function () { },
    complete: function () { },
    success: function (response) {
      // alert(response);
      const Jsondata = JSON.parse(response);

      $("#totalItemPrice").text(Jsondata.totalItemPrice);
      $("#subtotal").text(Jsondata.subtotal);

      if (Jsondata.status == 'success') {
        $("#addcount").val(Jsondata.cart_qty);
        $("#addcount_" + productId).val(Jsondata.cart_qty);
        window.location = baseUrl + 'cart/';
      } else {
        $("#productRow_" + productId).html('');
        $("#middleborder_" + productId).html('');
        $("#cartcount").text(Jsondata.count);
      }
    },
  });
}
function removeItem(productId, cartId) {
  $.ajax({
    url: baseUrl + 'removeItem',
    type: "POST",
    data: { cartId: cartId },
    beforeSend: function () { },
    complete: function () {},
    success: function (response) {
      const Jsondata = JSON.parse(response);
      if (Jsondata.status == 'success') {
        $("#remove" + productId).remove();
        location.reload();
      } else {

      }
    },
  });
}

function add_shipinfo() {
  const firstname = $("#firstname").val();
  const lastname = $("#lastname").val();
  const contact = $("#contact").val();
  const selected_city = $("#selected_city").val();
  const selected_barangay = $("#selected_barangay").val();
  const barangay_id = $("#barangay_id").val();
  const shipping_fee = $("#shipping_fee").val();
  const city_id = $("#city_id").val();
  const other_infoaddres = $("#other_infoaddres").val();
  const name_address = `<span class="text-capitalize fw-normal fs-5">${firstname} ${lastname}</span> | <span class="fw-light"> ${contact} <br><span class="fw-light">${selected_city} ${selected_barangay} City - ${other_infoaddres}</span><hr>`;

  if (firstname == "") {
    alert('Please enter your Firstname');
    return false;
  } else if (lastname == "") {
    alert('Please enter your Lastname');
    return false;
  } else if (contact == "") {
    alert('Please enter your Contact number');
    return false;
  } else if (selected_city == "") {
    alert('Please enter your City');
    return false;
  } else if (selected_barangay == "") {
    alert('Please enter your Barangay');
    return false;
  } else if (barangay_id == "") {
    alert('Please enter your Barangay');
    return false;
  } else if (other_infoaddres == "") {
    alert('Please enter other address details');
    return false;
  } else {
    $.ajax({
      url: baseUrl + 'addshipping_info',
      type: "POST",
      data: {
        firstname: firstname,
        lastname: lastname,
        contact: contact,
        selected_city: selected_city,
        selected_barangay: selected_barangay,
        barangay_id: barangay_id,
        city_id: city_id,
        shipping_fee: shipping_fee,
        other_infoaddres: other_infoaddres,
      },
      beforeSend: function () { },
      complete: function () { },
      success: function (response) {
        const Jsondata = JSON.parse(response);
        if (Jsondata.status == "success") {
          $("#shipping_info").append(
            '<label> <input type="radio" name="ship_info" value="' + Jsondata.lastinsertID + '"> ' + name_address + ' </label><br>'
          );
          location.reload(); // Reload the page
        }
      },
    });
  }
}

function proceedtopay(productId, cartId) {
  if ($("input:radio[name='ship_info']").is(":checked")) {
    const shipping_fee = $("input[name='shipping_fees']").val();
    const firstname = $("input[name='fname']").val();
    const lastname = $("input[name='lname']").val();
    const contact = $("input[name='cont']").val();
    const selected_city = $("input[name='city']").val();
    const selected_barangay = $("input[name='barangay']").val();
    const other_infoaddres = $("input[name='otherinfoadd']").val();
    const deliveryinfo = $("input[name='ship_info']:checked").val();
    const paymentmethod = $("input[name='payment']:checked").val();
    const proof_payment = $("input[name='proof_payment']").val();
    
    if (paymentmethod === 'Online' || paymentmethod === 'Pick Up (Paid)') {
      if (!proof_payment) {
        alert('Please enter the proof of payment.');
        return;
      }
    }
    
    $.ajax({
      url: baseUrl + "proceed_to_order",
      type: "POST",
      data: { 
        productId: productId,
        cartId: cartId,
        deliveryinfo: deliveryinfo,
        paymentmethod: paymentmethod,
        proof_payment: proof_payment,
        shipping_fee: shipping_fee,
        firstname: firstname,
        lastname: lastname,
        contact: contact,
        selected_city: selected_city,
        selected_barangay: selected_barangay,
        other_infoaddres: other_infoaddres
      },
      success: function (response) {
        const Jsondata = JSON.parse(response);
        if (Jsondata.status == "success") {
          $("#productRow_" + productId).remove();
          $("#middleborder_" + productId).remove();
          window.location = baseUrl + 'order_success_' + Jsondata.orderdata.order_id;
        }
      },
    });
  } else {
    alert('Check your delivery information');
  }
}




// $(document).ready(function(){
//   const baseUrl = 'http://localhost:8080/';
//     $rating_value = 0
// })

// $(document).on('mouseenter', '.submit_star', function(){
// rating = $(this).data('rating')
// resetStar()
// for(var i = 1; i <= rating; i++){
//     $('#submit_star_' + i).addClass('text-warning')
// }
// })

// function resetStar(){
// for(var i = 0; i <= 5; i++){
//     $('#submit_star_' + i).addClass('star_light')
//     $('#submit_star_' + i).removeClass('text-warning')
// }
// }

// $(document).on('click', '.submit_star', function(){
// rating_value = $(this).data('rating')
// resetStar()
// for(var i = 1; i <= rating_value; i++){
//     $('#submit_star_' + i).addClass('text-warning')
// }
// })

// $('#submit_review').click(function(){
// name = $('#txtname').val()
// reviews = $('#txtreviews').val()
// if(name == '' || reviews == ''){
//     alert('Please fill both fields')
//     return false;
// }else{
// $.ajax({
//         url: baseUrl + 'write_reviews',
//         type: "POST",
//         data: {
//             rating_value:rating_value,
//             txtname:txtname,
//             txtmessage:txtmessage
//         },
//         success: function(data){
//          console.log(data)
//         }
//     });
// }
// });


// function add_reviews(productId)
// {
//   $.ajax({
//     url: baseUrl + "write_reviews",
//     type: "POST",
//     data: {
//       productId: productId,
//       userId: userId,
//     },
//     success: function(response){
//       const Jsondata = JSON.parse(response);
//     }
//   })
// }



