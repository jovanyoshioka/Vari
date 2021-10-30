<?php

  echo '
    <style>
    /*style the class search */
      div.classes-container {
        width: 29vh;
        height: calc(var(--gridHeight) + var(--axisSize) + var(--axisMargin));
        background-color: white;
        display: inline-block;
        border-style: groove;
        vertical-align: top;
      }


      /* Add a black background color to the top navigation bar */
      .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
        width: 100%;
      }


      /* Style the search box inside the  bar */
      .topnav input[type=text] {
        width: 94%;
        float: left;
        padding: 6px 0px;
        border: 6px solid bisque;
        font-size: 17px;
      }

  /*style the class boxes*/
      .class_type button {
        size: 9px;
        padding: 20px 0;
        width: 100%;
        font-size: 25px;
      }

      /*style the back boxes*/
      #back {
        size: 9px;
        padding: 10px 0;
        width: 50%;
        font-size: 10px;
        float: left;
        border-color: #f44336;
        border: 2px solid grey;
        
      }
      
      .math_level {
        display: none;
      }
      .math_level button{
        size: 9px;
        padding: 20px 0;
        width: 100%;
        font-size: 25px;
      }


    </style>    
  ';

?>