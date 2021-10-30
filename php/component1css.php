<?php

  echo '
    <style>
      :root {
        --axisSize: 55px;
        --axisMargin: 6.5px;
        --gridUnitHeight: 70px;
      }

      div.schedule-container {
        width: 1100px;
        height: calc(783.5px + var(--axisSize) + var(--axisMargin));
        margin-right: 20px;
        display: inline-block;
    }

      /* Days of Week */
      div.schedule-container div.days {
        width: calc(100% - (var(--axisSize) + var(--axisMargin)));
        height: var(--axisSize);
        margin: 0 0 var(--axisMargin) calc(var(--axisSize) + var(--axisMargin));
        position: relative;
        border-radius: 10px 10px 0 0;
        background-color: #ffffff;
      }
      /* Individual Day Axis Headers */
      div.schedule-container div.days div {
        width: calc(100% / 7);
        height: 100%;
        float: left;
        clear: none;
        line-height: var(--axisSize);
        font-size: 1.25em;
        font-weight: 600;
        font-family: var(--font);
      }

      /* Times */
      div.schedule-container div.times {
        width: var(--axisSize);
        height: 725px;
        float: left;
        border-radius: 10px 0 0 10px;
        display: inline-block;
        background-color: #ffffff;
        overflow: hidden;
      }
      /* Individual Time Axis Headers */
      div.schedule-container div.times div {
        width: 100%;
        height: var(--gridUnitHeight);
        padding-top: 5px;
        border-bottom: 1px solid #999999;
        font-size: 1.15em;
        font-weight: 600;
        font-family: var(--font);
      }
        
      /* Grid/Classes */
      div.schedule-container div.grid {
        width: calc(100% - (var(--axisSize) + var(--axisMargin)));
        height: 725px;
        margin-bottom: 7.5px;
        float: right;
        position: relative;
        background-color: #ffffff;
        overflow: auto;
      }
      /* Grid Line */
      div.schedule-container div.grid div {
        width: 100%;
        /* Adding 5px for "div.times div" padding-top. */
        height: calc(var(--gridUnitHeight) + 5px);
        border-bottom: 1px solid #999999;
      }
      /* Class Card */
      div.schedule-container div.grid button {
        /* height, top, left, background-color in JS */
        width: calc(100% / 7);
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: var(--font);
        color: #ffffff;
        transition: background-color 0.25s, opacity 0.25s;
      }
      div.schedule-container div.grid button h1,
      div.schedule-container div.grid button h2 {
        margin: 0;
        padding: 0;
      }
      /* Class Title */
      div.schedule-container div.grid button h1 {
        font-size: 1.85em;
      }
      /* Class Type (e.g., Lecture, Lab, etc.) */
      div.schedule-container div.grid button h2 {
        font-size: 1.5em;
      }
        
      /* Previous/Next Variation Buttons and Variation Numbers */
      div.schedule-container footer {
        width: 100%;
        height: 50px;
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
        margin-left: calc(var(--axisSize) + var(--axisMargin));
        float: left;
        border-radius: 0 0 0 10px;
      }
      /* Next Variation Button */
      div.schedule-container footer button:nth-of-type(2) {
        float: right;
        border-radius: 0 0 10px 0;
      }
    </style>
  ';

?>