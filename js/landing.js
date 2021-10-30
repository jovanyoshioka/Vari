/**
 * Emulates one scroll bar for two elements.
 * @param gridElement element being directly scrolled.
 */
function scrollTimes(gridElement)
{
  var timesElement;

  // Indirectly scroll times as much as grid was directly scrolled.
  timesElement = document.querySelector("div.times");
  timesElement.scrollTop = gridElement.scrollTop;
}

/**
 * Places class card on grid.
 * 
 * @param title course title (e.g., "COSC 202").
 * @param color class card color hexcode. Format: "#XXXXXX".
 * @param info defines day of week (0=>Sunday, ..., 6=>Saturday), course start time ("HH:MM" string), length (in minutes), and type (e.g., "Lecture", "Lab", etc.)
 *   for each class meeting. Format: [{d: 0-6, st: "HH:MM", l: X, t: "X"}, { . . . }].
 */
function putClass(title, color, info)
{
  var grid, ratio, width, i, card, text, node, val, time;

  grid = document.querySelector("div.grid");

  // Calculate height to time (in minutes) ratio from grid.
  //   Used to determine height and top position of class card(s) based on length and start time param(s) respectively.
  ratio = grid.querySelector("div").offsetHeight / 60;

  // Determine width of each class card based on width of each day header.
  width = document.querySelector("div.days div").offsetWidth;

  // Add a class card for each day with the corresponding info.
  for (i = 0; i < info.length; i++)
  {
    // New class card element.
    card = document.createElement("button");
 
    // Create and append course title text element.
    text = document.createElement("h1");
    node = document.createTextNode(title);
    text.appendChild(node);
    card.appendChild(text);

    // Create class type text element.
    text = document.createElement("h2");
    node = document.createTextNode(info[i].t);
    text.appendChild(node);
    card.appendChild(text);

    // Style/position class card (color, height, top, left).

    // Set standard background color of class card.
    card.style.backgroundColor = color;
    // Set hover background color of class card.
    //   Using onmouseover and onmouseout since cannot edit ":hover" pseudo-class directly.
    card.setAttribute("onmouseover", "this.style.opacity = 0.75");
    card.setAttribute("onmouseout",  "this.style.opacity = 1.0");

    // Calculate and set height of card using height to time ratio and passed class duration.
    val = ratio * info[i].l;
    card.style.height = val + "px";

    // Parse start time as minutes.
    time = 0;
    time += (parseInt(info[i].st[0] + info[i].st[1]) * 60); // add hours as minutes
    time += parseInt(info[i].st[3] + info[i].st[4]);        // add minutes

    // Calculate and set top position of card using height to time ratio and parsed start time.
    val = ratio * time;
    card.style.top = val + "px";

    // Calculate and set left position of card using previously found card width and day of week digit.
    val = width * info[i].d;
    card.style.left = val + "px";

    // Put class card onto grid.
    grid.appendChild(card);
  }
}

// Testing schedule grid functionality.
putClass(
  "COSC 202",
  "#D60000",
  [
    {d: 2, st: "09:50", l: 75, t: "Lecture"},
    {d: 4, st: "09:50", l: 75, t: "Lecture"},
    {d: 3, st: "08:00", l: 120, t: "Lab"}
  ]
);
putClass(
  "PHYS 231",
  "#ff8200",
  [
    {d: 1, st: "11:45", l: 50, t: "Lecture"},
    {d: 3, st: "11:45", l: 50, t: "Lecture"},
    {d: 3, st: "13:10", l: 120, t: "Lab"}
  ]
);
putClass(
  "EF 203",
  "#00AE1A",
  [
    {d: 2, st: "16:30", l: 75, t: "Lecture"},
    {d: 4, st: "16:30", l: 75, t: "Lecture"}
  ]
);
putClass(
  "ECE 313",
  "#2B3EAA",
  [
    {d: 1, st: "15:30", l: 50, t: "Lecture"},
    {d: 3, st: "15:30", l: 50, t: "Lecture"},
    {d: 5, st: "15:30", l: 50, t: "Lecture"}
  ]
);
putClass(
  "MATH 231",
  "#D20092",
  [
    {d: 2, st: "11:30", l: 75, t: "Lecture"},
    {d: 4, st: "11:30", l: 75, t: "Lecture"}
  ]
);