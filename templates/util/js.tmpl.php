  <script type="text/javascript">
    function toggle_all() {
      let boxes = document.getElementsByName("id[]");
      for (let i = 0; i < boxes.length; i++) {
        boxes[i].checked = document.getElementById("all").checked;
      }
    }

    function mark_all() {
      document.getElementById("all").checked = true;
      toggle_all();
    }

    function box_checked() {
      let box_checked = false;
      let boxes = document.getElementsByName("id[]");
      for (let i = 0; i < boxes.length; i++) {
        if (boxes[i].checked === true) {
          box_checked = true;
          break;
        }
      }
      return box_checked;
    }

    function verify() {
      if (box_checked()) {
        let response = confirm("Are you sure you want delete these records?");
        if (response) {
          document.forms["purge"].submit();
        }
      }
      else {
        alert("No records selected.");
      }
    }

    function toggleCount() {
      if(document.getElementById("CustomCount").style.display === "none") {
        document.getElementById("CustomCount").style.display = "block";
      }
      else {
        document.getElementById("CustomCount").style.display = "none";
      }
    }

    function verifyCount() {
      let newCount = document.getElementById("new_count").value;
      if (parseInt(newCount) >= 0) {
        window.location = "index.php?editor=util&action=6&count=" + newCount;
      }
      else {
        alert("That is not a valid number!");
      }
    }

  </script>
