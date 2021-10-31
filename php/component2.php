<?php
  echo '

    <div class="right-container">
      
      <div class="classes-container">
        <div class="topnav">
          <input type="text" id="search" onkeyup="search()" placeholder="Search..." >
        </div>
        <button id="back" onclick="back()">
          <i class="fas fa-chevron-left"></i> Back
        </button>

        <div class="class_type">
          <button class="class_search" onclick="showCategory(\'cosc\')">COSC</button>
          <button class="class_search" onclick="showCategory(\'math\')">MATH</button>
          <button class="class_search" onclick="showCategory(\'phys\')">PHYS</button>
          <button class="class_search" onclick="showCategory(\'muco\')">MUCO</button>
        </div>

        <div class="cosc category">
          <button onclick="prepAlgorithm(\'cosc\', 202, this)">202</button>
          <button onclick="prepAlgorithm(\'cosc\', 230, this)">230</button>
        </div>

        <div class="math category">
          <button onclick="prepAlgorithm(\'math\', 231, this)">231</button>
        </div>

        <div class="phys category">
          <button onclick="prepAlgorithm(\'phys\', 231, this)">231</button>
        </div>

        <div class="muco category">
          <button onclick="prepAlgorithm(\'muco\', 110, this)">110</button>
        </div>
      </div>

      <div class="nav-container">
        <div>
          <h2>Variation</h2>
          <h1><span id="currentCount">?</span> / <span id="totalCount">?</span></h1>
        </div>
        <button onclick="showPrevVariation()">
          <i class="fas fa-chevron-left"></i>
          Previous
        </button>
        <button onclick="showNextVariation()">
          Next
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>

    </div>

  ';
?>