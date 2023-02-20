<script src="ht.js"></script>
<div class="row">
  <div class="col" style="width: 100%">
    <div style="width:auto;max-width:50rem;display: grid;
    justify-content: center; margin: 0 auto;" id="reader"></div>
  </div><audio id="myAudio1">
    <source src="success.mp3" type="audio/ogg">
  </audio>
  <audio id="myAudio2">
    <source src="failes.mp3" type="audio/ogg">
  </audio>
  <script>
    var x = document.getElementById("myAudio1");
    var x2 = document.getElementById("myAudio2");

    // function showHint(str) {
    //   if (str.length == 0) {
    //     document.getElementById("txtHint").innerHTML = "";
    //     return;
    //   } else {
    //     var xmlhttp = new XMLHttpRequest();
    //     xmlhttp.onreadystatechange = function() {
    //       if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("txtHint").innerHTML = this.responseText;
    //       }
    //     };
    //     xmlhttp.open("GET", "gethint.php?q=" + str, true);
    //     xmlhttp.send();
    //   }
    // }
    function showHintWithAnaquel(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        var anaquel = document.getElementById("anaquel").value;
        xmlhttp.open("GET", "gethint.php?q=" + str + "&anaquel=" + anaquel, true);
        xmlhttp.send();
      }
    }
  </script> 
  <div class="col" style="text-align:center;">
    <h4>SCAN RESULT</h4>
    <div>Employee name</div>
    <form action="gethint.php" method="get">
      <input type="text" name="start" class="input" id="result" onkeyup="showHintWithAnaquel(this.value)" placeholder="result here" readonly="">
      <select id="anaquel">
        <!-- option tag starts -->
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <!-- option tag ends -->
      </select>
    </form>
    <p>Status: <span id="txtHint"></span></p>
  </div>
</div>
<script type="text/javascript">
  function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    showHintWithAnaquel(qrCodeMessage);
    playAudio();

  }

  function onScanError(errorMessage) {
    //handle scan error
  }
  var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
      fps: 10,
      qrbox: 250
    });
  html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>