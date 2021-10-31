var variations = [];

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

/**
 * Applies variations algorithm.
 * @param courses courses attempting to add.
 */
function applyAlgorithm(courses)
{
  var i, temp;

  

  // Initialize variations if first call to applyAlgorithm, i.e., set argument classes
  // to the various variations.
  if (variations.length == 0)
  {
    for (i = 0; i < courses.length; i++)
    {
      temp = [];
      temp.push(courses[i]);

      variations.push(temp);

      // Set new total variation count.
      document.getElementById("totalCount").innerHTML = variations.length;

      // Show first variation.
      if (variations.length > 0) showVariation(0);
    }

    return;
  }

  var retItem, varItem;
  var i, j, k, l, m;
  var push;
  var newVariations = [];
  var newLength;

  // Loop through each returned class.
  for (i = 0; i < courses.length; i++)
  {
    // Loop through each existing variation.
    for (j = 0; j < variations.length; j++)
    {
      push = true;

      // Loop through each class in current variation.
      for (k = 0; k < variations[j].length; k++)
      {
        // Loop through each day variation class meets.
        for (l = 0; l < variations[j][k].schedule.length; l++)
        {
          // Loop through each day returned class meets.
          for (m = 0; m < courses[i].schedule.length; m++)
          {
            retItem = courses[i].schedule[m];
            varItem = variations[j][k].schedule[l];
            // Verify no conflicting times.
            if (
              retItem.day == varItem.day
              && (
                (retItem.startTime >= varItem.startTime && retItem.startTime <= varItem.startTime + varItem.duration)
                || (retItem.startTime + retItem.duration >= varItem.startTime && retItem.startTime + retItem.duration <= varItem.startTime + varItem.duration)
                || (retItem.startTime <= varItem.startTime && retItem.startTime + retItem.duration >= varItem.startTime.duration)
              )
            )
            {
              // Conflicting time, do not push this retItem.
              push = false;
              break;
            }
          }
          if (!push) break;
        }
        if (!push) break;
      }

      if (push)
      {
        // No conflicts, append retItem to current variation and push to new variations array.
        newLength = newVariations.push(variations[j].slice());
        newVariations[newLength-1].push(courses[i]);
      }
      // Otherwise, do not push to new variations array.
    }
  }

  variations = newVariations;

  // Set new total variation count.
  document.getElementById("totalCount").innerHTML = variations.length;

  // Show first variation.
  if (variations.length > 0) showVariation(0);
}

/**
 * Shows specified variation data on grid.
 */
function showVariation(i)
{
  var j, k;
  var temp;
  var hr, min;
  var cards;
  var earliest;
  var scroll;

  earliest = -1;

  // Clear all previous grid class cards.
  cards = document.querySelectorAll("div.grid button");
  for (j = 0; j < cards.length; j++)
  {
    cards[j].remove();
  }

  // Loop through each class in variation.
  for (j = 0; j < variations[i].length; j++)
  {
    // Loop through each day of class.
    for (k = 0; k < variations[i][j].schedule.length; k++)
    {
      temp = variations[i][j].schedule[k];
      hr = parseInt(temp.startTime / 60);
      if (hr < 10) hr = "0" + hr;
      min = temp.startTime % 60;
      if (min < 10) min = "0" + min;

      if (earliest == -1 || temp.startTime < earliest) earliest = temp.startTime;

      putClass(
        variations[i][j].info.title,
        variations[i][j].info.color,
        [{
          d: temp.day, st: hr + ":" + min, l: temp.duration, t: temp.type
        }]
      );
    }
  }

  // Set new current variation count.
  document.getElementById("currentCount").innerHTML = i+1;

  // Update classes overview interface.
  updateOverview();

  // Automatically scroll to first class time.
  var grid = document.querySelector("div.grid");
  // Calculate height to time (in minutes) ratio from grid.
  //   Used to find scrollTop of earliest class card(s).
  ratio = grid.querySelector("div").offsetHeight / 60;
  scroll = (ratio * earliest) - 25;
  if (scroll < 0) scroll = 0;
  grid.scrollTop = scroll;
}

function showPrevVariation()
{
  var currentCount, newCount;

  currentCount = document.getElementById("currentCount").innerHTML;
  if (currentCount != "?")
  {
    newCount = parseInt(currentCount);
    showVariation(newCount-1 <= 0 ? variations.length-1 : newCount-2);
  }
}

function showNextVariation()
{
  var currentCount, newCount;

  currentCount = document.getElementById("currentCount").innerHTML;
  if (currentCount != "?")
  {
    newCount = parseInt(currentCount);
    showVariation(newCount >= variations.length ? 0 : newCount);
  }
}

/**
 * Converts digit to character representation of a day of the week.
 * @param digit integer representation of day of week to be converted to char.
 * @return character representation of day.
 */
function convertToChar(digit)
{
  switch (digit)
  {
    case 0:
    case 6:
      return "S";
    case 1:
      return "M";
    case 2:
      return "T";
    case 3:
      return "W";
    case 4:
      return "R";
    case 5:
      return "F";
  }
}

/**
 * Updates overview of classes information.
 */
function updateOverview()
{
  var overview;
  var i, j, currIdx;
  var parent, child, text, node;
  var days, time, hr, min, temp;

  overview = document.querySelector("div.overview");

  // Clear current class overview.
  overview.innerHTML = "";

  currIdx = parseInt(document.getElementById("currentCount").innerHTML)-1;

  // Loop through each class in current variation.
  for (i = 0; i < variations[currIdx].length; i++)
  {
    parent = document.createElement("div");

    // Create color code element.
    child = document.createElement("section");
    child.style.backgroundColor = variations[currIdx][i].info.color;
    parent.appendChild(child);

    // Create title/professor/type/crn section.
    child = document.createElement("section");

    text = document.createElement("h1");
    node = document.createTextNode(variations[currIdx][i].info.title);
    text.appendChild(node);
    child.appendChild(text);

    text = document.createElement("h2");
    node = document.createTextNode(variations[currIdx][i].info.professor);
    text.appendChild(node);
    child.appendChild(text);

    text = document.createElement("h2");
    node = document.createTextNode("CRN: " + variations[currIdx][i].crn);
    text.appendChild(node);
    child.appendChild(text);

    parent.appendChild(child);

    // Create meeting times section.
    child = document.createElement("section");

    // Look for Lecture.
    days = "";
    time = "";
    for (j = 0; j < variations[currIdx][i].schedule.length; j++)
    {
      if (variations[currIdx][i].schedule[j].type == "Lecture")
      {
        days += convertToChar(variations[currIdx][i].schedule[j].day);

        if (time == "")
        {
          // Start time.
          temp = variations[currIdx][i].schedule[j];
          hr = parseInt(temp.startTime / 60);
          min = temp.startTime % 60;
          if (min < 10) min = "0" + min;
          
          time = hr + ":" + min;

          // End time.
          hr = parseInt((temp.startTime + temp.duration) / 60);
          min = (temp.startTime + temp.duration) % 60;
          if (min < 10) min = "0" + min;

          time += " - " + hr + ":" + min;
        }
      }
    }
    // Append Lecture text if found lectures.
    if (days != "")
    {
      text = document.createElement("h2");
      node = document.createTextNode("Lecture: " + days + " " + time);
      text.appendChild(node);
      child.appendChild(text);

      parent.appendChild(child);
    }

    // Look for Lab.
    days = "";
    time = "";
    for (j = 0; j < variations[currIdx][i].schedule.length; j++)
    {
      if (variations[currIdx][i].schedule[j].type == "Lab")
      {
        days += convertToChar(variations[currIdx][i].schedule[j].day);

        if (time == "")
        {
          // Start time.
          temp = variations[currIdx][i].schedule[j];
          hr = parseInt(temp.startTime / 60);
          min = temp.startTime % 60;
          if (min < 10) min = "0" + min;
          
          time = hr + ":" + min;

          // End time.
          hr = parseInt((temp.startTime + temp.duration) / 60);
          min = (temp.startTime + temp.duration) % 60;
          if (min < 10) min = "0" + min;

          time += " - " + hr + ":" + min;
        }
      }
    }
    // Append Lab text if found lab(s).
    if (days != "")
    {
      text = document.createElement("h2");
      node = document.createTextNode("Lab: " + days + " " + time);
      text.appendChild(node);
      child.appendChild(text);
      
      parent.appendChild(child);
    }

    // Append updated class overview to overview container.
    overview.appendChild(parent);
  }
}

/**
 * Prepares arguments to algorithm to update variations and grid.
 */
function prepAlgorithm(category, number, btn)
{
  var i, classes, tip;

  // Hide tip in overview interface.
  tip = document.getElementsByClassName("tip")[0];
  if (tip) tip.style.display = "none";

  btn.style.display = "none";

  classes = [];
  for (i = 0; i < data.length; i++)
  {
    if ((category.toUpperCase() + " " + number) == data[i].info.title)
    {
      // Course needs to be added to algorithm arguments.
      classes.push(data[i]);
    }
  }

  // Apply algorithm with classes matching passed category and number (e.g., "MATH 231").
  applyAlgorithm(classes);
}