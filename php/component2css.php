<?php

  echo '
    <style>
      /* Contains class search and Previous/Next Buttons */
      div.right-container {
        width: 300px;
        height: calc(var(--gridHeight) + var(--axisSize) + 2*var(--axisMargin) + var(--overviewHeight) + 3.5px);
        display: inline-block;
        vertical-align: top;
      }

      /*style the class search */
      div.classes-container {
        height: calc(var(--gridHeight) + var(--axisSize) + var(--axisMargin));
        background-color: #ffffff;
        border-radius: 10px 10px 0 0;
      }

      /* Add a black background color to the top navigation bar */
      .topnav {
        overflow: hidden;
        width: 100%;
        border-radius: 10px 10px 0 0;
      }

      /* Style the search box inside the  bar */
      .topnav input[type=text] {
        width: 100%;
        float: left;
        padding: 12px 6px;
        font-size: 1.5em;
        border: none;
        border-bottom: 3px solid #000000;
        border-radius: 10px 10px 0 0;
      }

      /*style the class boxes*/
      .class_type button {
        width: 100%;
        padding: 20px 0;
        font-size: 25px;
        border-bottom: 1px solid #000000;
      }

      /*style the back boxes*/
      #back {
        width: 100%;
        padding: 10px 0;
        font-size: 1.5em;
        border-bottom: 1px solid #000000;
        display: none;
      }
      
      .category {
        display: none;
      }
      .category button{
        padding: 20px 0;
        width: 100%;
        font-size: 25px;
        border-bottom: 1px solid #000000;
      }

      /* Variation Count and Prev/Next Buttons */
      div.right-container div.nav-container {
        width: 100%;
        height: var(--overviewHeight);
        margin-top: calc(var(--axisMargin) + 3.5px);
        position: relative;
      }
      div.right-container div.nav-container div {
        width: 100%;
        height: calc(var(--overviewHeight) - 65px - var(--axisMargin) - 3.5px);
        background-color: #ffffff;

      }
      div.right-container div.nav-container div h1 {
        font-size: 4em;
        color: #000000;
      }
      div.right-container div.nav-container div h2 {
        font-size: 3em;
        padding-top: 40px;
        color: #000000;
      }
      div.right-container div.nav-container button {
        width: 145px;
        height: 65px;
        border: none;
        font-size: 1.5em;
        font-family: var(--font);
        position: absolute;
        bottom: 0;
      }
      div.right-container div.nav-container button:hover {
        cursor: pointer;
      }
      /* Previous Variation Button */
      div.right-container div.nav-container button:nth-of-type(1) {
        left: 0;
        border-radius: 0 0 0 10px;
      }
      /* Next Variation Button */
      div.right-container div.nav-container button:nth-of-type(2) {
        right: 0;
        border-radius: 0 0 10px 0;
      }

    </style>    
  ';

?>