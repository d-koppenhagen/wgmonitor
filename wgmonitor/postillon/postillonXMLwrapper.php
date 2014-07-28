

<p id="PostillonTitle"></p>
<p id="PostillonText"></p>
 
<script>
$(document).ready(function()
{
  $.ajax({
    type: "GET",
    url: "proxy.php",
    dataType: "xml",
    success: parseXml
  });
});

function parseXml(xml)
{
  //find every Tutorial and print the author
  $(xml).find("title").each(function()
  {
    $("#output").append($(this).attr("author") + "<br />");
  });

  // Output:
  // The Reddest
  // The Hairiest
  // The Tallest
  // The Fattest
}

</script>