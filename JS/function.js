// MODIFY USER ON MODAL
function modify_user(mod_users) {
  array_mod = mod_users.split(",");
  $("#mod_id_user").val(array_mod[0]);
  $("#mod_name").val(array_mod[1]);
  $("#mod_email").val(array_mod[2]);
  $("#mod_pnumber").val(array_mod[3]);
  $("#mod_role").val(array_mod[4]);
}

// DELETE USER ON MODAL
function delete_user(del_users) {
  array_del = del_users.split(",");
  $("#del_id_user").val(array_del[0]);
  $("#del_name").val(array_del[1]);
  $("#del_email").val(array_del[2]);
  $("#del_pnumber").val(array_del[3]);
  $("#del_role").val(array_del[4]);
}

$("#modify").click(function () {
  var modify = $("#user_data").serialize();
  $.ajax({
    url: "../administrator/ajax.php",
    type: "POST",
    data: modify,
    cache: false,
    success: function (variable) {
      $("#adm").load("../administrator/users.php #adm");
      $("#modifyuser").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#add").click(function () {
  var add = $("#add_user").serialize();
  $.ajax({
    url: "../administrator/ajax.php",
    type: "POST",
    data: add,
    success: function (variable) {
      $("#adm").load("../administrator/users.php #adm");
      $("#adduser").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#delete").click(function () {
  var del = $("#delete_user").serialize();
  $.ajax({
    url: "../administrator/ajax.php",
    type: "POST",
    data: del,
    success: function (variable) {
      $("#adm").load("../administrator/users.php #adm");
      $("#deleteuser").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});