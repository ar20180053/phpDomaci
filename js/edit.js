$(document).ready(function () {
  function get_edit_id() {
    let url = new URLSearchParams(window.location.search);
    let id = url.get("id");
    id = parseInt(id);
    return id;
  }
  function get_rows() {
    let id = get_edit_id();
    $.get("methods/get.php", { id: id }, function (data) {
      data = JSON.parse(data);
      $("#naziv").val(data.naziv);
      $("#trajanje").val(data.trajanje);
      $("#zanr").val(data.zanr);
      console.log(data);
    });
  }
  if (get_edit_id()) {
    get_rows();
  }
  $("#editForm").submit(function (e) {
    e.preventDefault();
    let id = get_edit_id();
    $.ajax({
      type: "POST",
      url: "methods/update.php",
      data: {
        id: id,
        naziv: $("#naziv").val(),
        zanr: $("#zanr").val(),
        trajanje: $("#trajanje").val(),
      },
    }).done(function (data) {
      $("#naziv").val("");
      $("#zanr").val("");
      $("#trajanje").val("");
      $("#table").load("methods/load.php");
    });
  });
});
