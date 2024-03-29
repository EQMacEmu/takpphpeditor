<script type="text/javascript">
  function toggleComponentType() {
    let x = document.forms[1].type.selectedIndex;
    if (x === 0) {
      document.forms[1].iscontainer.value=1;

      document.forms[1].successcount.disabled=true;
      document.forms[1].successcount.value=0;

      document.forms[1].failcount.disabled=true;
      document.forms[1].failcount.value=0;

      document.forms[1].componentcount.disabled=true;
      document.forms[1].componentcount.value=0;

      if (document.getElementById("ContainerTable").style.display === "none") {
        toggleContainer();
      }
    }
    else if (x === 1) {
      document.forms[1].iscontainer.value=0;

      document.forms[1].successcount.disabled=true;
      document.forms[1].successcount.value=0;

      document.forms[1].failcount.disabled=false;
      document.forms[1].failcount.value=0;
      
      document.forms[1].componentcount.disabled=false;
      document.forms[1].componentcount.value=1;

      if (document.getElementById("ContainerTable").style.display === "block") {
        toggleContainer();
      }
    }
    else {
      document.forms[1].iscontainer.value=0;

      document.forms[1].failcount.disabled=true;
      document.forms[1].failcount.value=0;

      document.forms[1].componentcount.disabled=true;
      document.forms[1].componentcount.value=0;

      document.forms[1].successcount.disabled=false;
      document.forms[1].successcount.value=1;

      if (document.getElementById("ContainerTable").style.display === "block") {
        toggleContainer();
      }
    }
  }

  function enable() {
    document.forms[1].failcount.disabled=false;
    document.forms[1].componentcount.disabled=false;
    document.forms[1].successcount.disabled=false;
  }

  function showSearch() {
    document.getElementById("searchframe").style.display = "block";
    document.getElementById("button").style.display = "block";
  }

  function hideSearch() {
    document.getElementById("searchframe").style.display = "none";
    document.getElementById("button").style.display = "none";
  }

  function toggleContainer() {
    if(document.getElementById("ContainerCollapsed").style.display === "inline") {
      document.getElementById("ContainerCollapsed").style.display = "none";
      document.getElementById("ContainerTable").style.display = "block";
      document.getElementById("ContainerExpanded").style.display = "inline";
    }
    else {
      document.getElementById("ContainerCollapsed").style.display = "inline";
      document.getElementById("ContainerTable").style.display = "none";
      document.getElementById("ContainerExpanded").style.display = "none";
    }
  }

</script>