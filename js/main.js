function add_line(id) {
  document.getElementById(`item_${id}`).classList.toggle("line");
  document
    .getElementById(`cb_button_${id}`)
    .classList.toggle("cb_button_color");
}

function check_checkboxes(checked_array) {
  for (var i = 0; i < checked_array.length; i++) {
    var id = checked_array[i];

    document.getElementById(`item_${id}`).classList.add("line");
    document.getElementById(`cb_button_${id}`).classList.add("cb_button_color");
  }
}

check_checkboxes(checked_array);

var cbIds = [];
cbIds = [...checked_array];

function checkbox_check(id) {
  if (
    document
      .getElementById(`cb_button_${id}`)
      .classList.contains("cb_button_color")
  ) {
    var index = cbIds.indexOf(id);
    if (index > -1) {
      cbIds.splice(index, 1);
    }
  } else {
    cbIds.push(`${id}`);
  }

  cbIds = cbIds.sort();
  var xhttp = new XMLHttpRequest();

  xhttp.open("POST", "checkboxes.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`cbIds=${cbIds}`);
}
