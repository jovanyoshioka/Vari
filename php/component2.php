<?php

  echo '

    <div class="classes-container">
    
      <div class="topnav">
      
        <input type="text" id="search" onkeyup="search()"   placeholder="Search..." >
      </div>
      <button id="back" onclick="back()">Back</button>
  
      <div class="class_type" >
        <button class="class_search" onclick="math()">Math</button>
        <button class="class_search" onclick="math()">English</button>
      </div> 


      <div class="math_level">
     <button onclick="100_Math()">100</button>
      <button onclick="200_Math()">200</button>
       <button onclick="300_Math()">300</button>
        <button onclick="400_Math()">400</button>
         <button onclick="500_Math()">500</button>
       

     </div>



    </div>

    
  ';

?>