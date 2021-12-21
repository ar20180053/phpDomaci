$(document).ready(function () {
  $("#table").load("methods/load.php");
  $("#insertForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "methods/post.php",
      data: $(this).serialize(),
    }).done(function (data) {
      $("#table").load("methods/load.php");
      $("#naziv").val("");
      $("#zanr").val("");
      $("#trajanje").val("");
    });
  });
});
