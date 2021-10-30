<?php

  echo '
    <style>
      div.schedule-container {
        width: 1200px;
        height: 840px;
        margin-right: 20px;
        display: inline-block;
      }

      /* Days of Week */
      div.schedule-container div.days {
        width: calc(100% - 75px);
        height: 50px;
        margin: 0 0 7.5px 75px;
        border-radius: 15px 15px 0 0;
        background-color: #ffffff;
      }
        
      /* Times and Grid/Classes */
      div.schedule-container div.grid {
        width: 100%;
        height: 725px;
        background-color: #ffffff;
      }
        
      /* Previous/Next Variation Buttons and Variation Numbers */
      div.schedule-container footer {
        width: 100%;
        height: 50px;
        margin-top: 7.5px;
      }
      div.schedule-container footer button {
        width: 125px;
        height: 100%;
        border: none;
        font-size: 1.5em;
        font-family: var(--font);
      }
      div.schedule-container footer button:hover {
        cursor: pointer;
      }
      /* Previous Variation Button */
      div.schedule-container footer button:nth-of-type(1) {
        float: left;
        border-radius: 0 0 0 15px;
      }
      /* Next Variation Button */
      div.schedule-container footer button:nth-of-type(2) {
        float: right;
        border-radius: 0 0 15px 0;
      }
    </style>
  ';

?>