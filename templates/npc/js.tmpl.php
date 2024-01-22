<script type="text/javascript">
    function sanityCheck() {
        let tethered = document.forms[1].j.checked;
        let leashed = document.forms[1].J.checked;

        if (tethered && leashed) {
            alert("Warning: You made this NPC both tethered AND leashed!");
        }
    }
</script>