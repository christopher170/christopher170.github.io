<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-ZNqy-KeatZ25ItAG"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
      <title>Payment</title>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <style>
      button{
        color: black;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: antiquewhite;
        width: 100%;
        height: 100%;
        font-size: 40px;
        border: 1px solid ; 
      } 
    </style>
  </head>
  
  <body>
    <button id="pay-button">Pay!</button>

    <form action="" id="submit_form" method="POST">
      @csrf
      <input type="hidden" name="json" id="json_callback">
    </form>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snap_token }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            send_response_to_form(result);

          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');

          }
        });
        // window.snap.pay('{{$snap_token }}');
        // // customer will be redirected after completing payment pop-up
      });
    function send_response_to_form (result){
      document.getElementById('json_callback').value = JSON.stringify(result);
      // alert(document.getElementById('json_callback').value) 
      $('#submit_form').submit();
    }
    </script>
  </body>
</html>