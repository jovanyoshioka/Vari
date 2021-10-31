<?php

  echo '
    <style>
      div.schedule-container {
        width: 1100px;
        margin-right: var(--axisMargin);
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
        height: var(--gridHeight);
        margin-right: var(--axisMargin);
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
        height: var(--gridHeight);
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
      div.schedule-container div.grid button:hover {
        cursor: auto;
      }
      /* Class Title */
      div.schedule-container div.grid button h1 {
        font-size: 1.85em;
      }
      /* Class Type (e.g., Lecture, Lab, etc.) */
      div.schedule-container div.grid button h2 {
        font-size: 1.5em;
      }

      /* Overview of Classes */
      div.schedule-container div.overview {
        width: calc(100% - (var(--axisSize) + var(--axisMargin)));
        height: var(--overviewHeight);
        margin: var(--axisMargin) 0 var(--axisMargin) calc(var(--axisSize) + var(--axisMargin));
        background-color: #ffffff;
        text-align: left;
        overflow: auto;
        border-radius: 0 0 10px 10px;
      }
      div.schedule-container div.overview div section {
        min-height: 100px;
        padding: 10px;
        display: inline-block;
        float: left;
        clear: none;
        border-bottom: 1px solid #999999;
      }
      div.schedule-container div.overview div section:nth-of-type(2) { width: calc((100% - 60px) / 3); }
      div.schedule-container div.overview div section:nth-of-type(3) { width: calc((100% - 60px) / 3 * 2); }
      /*div.schedule-container div.overview div section:nth-of-type(4) { width: 75px; display: flex; justify-content: center; align-items: center; }*/
      div.schedule-container div.overview div section h1,
      div.schedule-container div.overview div section h2 {
        color: #000000;
      }
      div.schedule-container div.overview div section h1 {
        font-size: 2em;
      }
      /* Remove Button */
      /*div.schedule-container div.overview div section:nth-of-type(4) button {
        font-size: 2.5em;
        background-color: transparent !important;
        color: #000000;
      }
      div.schedule-container div.overview div section:nth-of-type(4) button:hover {
        color: #444444;
      }*/
      
    </style>
  ';

?>