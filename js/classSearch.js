function showCategory(category) {
  var x = document.getElementsByClassName("class_type");
  var y = document.getElementsByClassName(category);
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  for (i = 0; i < y.length; i++) {
    y[i].style.display = "block";
  }

  document.getElementById("back").style.display = "block";
}

function back() {
  var x = document.getElementsByClassName("class_type");
  var y = document.getElementsByClassName("category");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "block";
  }

  for (i = 0; i < y.length; i++) {
    y[i].style.display = "none";
  }

  document.getElementById("back").style.display = "none";
}

function search() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  ul = document.getElementsByClassName("class_type");

  li = ul[0].getElementsByTagName("button");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    //a = li[i].getElementsByTagName("a")[0];
    a = li[i];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
